<?php

namespace App\Http\Controllers\Admin;

use App\Mail\GuestRegistration;
use App\OrderDetail;
use App\TempOrder;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Payment;
use App\Guest;
use App\User;
use App\Role;
use App\Order;
use Cart;
use Illuminate\Support\Facades\Session;

class PaymentProcess extends Controller {
	use SendsPasswordResetEmails;


	public function sslValidation( Request $request ) {
		$sslData = $request->all();
		if ( isset( $sslData['status'] ) && ( $sslData['status'] == "VALID" ) && isset( $sslData['val_id'] ) ) {
			$val_id       = urlencode( $sslData['val_id'] );
			$store_id     = urlencode( 'dyntatbdlive@ssl' );
			$store_passwd = urlencode( 'ThYR0#SSL^CaRE2018' );

			$requested_url = ( "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json" );

			$handle = curl_init();
			curl_setopt( $handle, CURLOPT_URL, $requested_url );
			curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );

			$result = curl_exec( $handle );

			$code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );

			if ( ( $code == 200 ) && ! ( curl_errno( $handle ) ) ) {
				curl_close( $handle );
				$result = json_decode( $result );
				if ( $result->status == "VALID" ) {
					if ( Auth::check() ) {
						$user     = Auth::user();
						$userType = 'Member';
					} else {
						$user     = $this->createUser();
						$userType = 'Member';
					}

					$discountPrice = 0;
					$homeService   = Session::get( 'homeService', function () {
						return 0;
					} );
					$discountData  = Session::get( 'discount', function () {
						return null;
					} );
					if ( ! is_null( $discountData ) ) {
						$discountPrice = $discountData['discountPrice'];
					}
					$total = ceil( Cart::getSubTotal() + $homeService - $discountPrice );

					$shipping_address = Session::get( 'shipping_address', function () {
						return null;
					} );
					if ( $result->amount != $total ) {
						return view( 'front.failed' )->with( 'message', 'Failed to make your order.' );
					}

					$order = Order::create( [
						'user_id'          => $user->id,
						'status'           => 'Pending',
						'delivery_charge'  => $homeService,
						'discount_price'   => $discountPrice,
						'shipping_address' => $result->value_a,
						'ref_info'         => 'Dyntat Web',
						'invoice_no'       => $this->getNextOrderNumber(),
						'total'            => $total
					] );
					if ( $order ) {
						if ( ! Cart::isEmpty() ) {
							foreach ( Cart::getContent() as $test ) {
								if ( $test->attributes['product_type'] == 'Test' ) {
									OrderDetail::create( [
										'user_id'    => $user->id,
										'order_id'   => $order->id,
										'test_id'    => $test->id,
										'test_price' => $test->price
									] );
								} else {
									OrderDetail::create( [
										'user_id'        => $user->id,
										'order_id'       => $order->id,
										'helth_sc_id'    => (int) $test->id - 4550,
										'helth_sc_price' => $test->price
									] );
								}

							}
						}
						$session_id      = Session::getId();
						$find_temp_order = TempOrder::where( 'session_id', $session_id )->where( 'status', 'active' )->first();
						if ( $find_temp_order ) {
							$find_temp_order->delete();
						}
						$this->createPayment( $result, $user->id, $order->id, "SSL" );
						$this->sendMailWithDetails( $user, $order );
//						$msg = "Your Tests request (Order ID: " . $order->id . ") has been successfully placed. Our Customer care will contact you soon. For any query, please call us  at 09666737373, 01944443850.
//                        Best Regards,
//                        Dyntat Bangladesh Ltd.";
						$msg ="Your Order (ID: ". $order->invoice_no .") has been successfully placed. Dyntat Bangladesh Limited";
						$this->sendSMS( $user->mobile, $msg );
						$this->clearWishList();
						$this->clearConditions();
						$this->clear();

						return redirect()->route( 'thanks' )->with( 'message', 'You are successfully Send Order.' );
					}
				}
			} else {
				return view( 'front.failed' )->with( 'message', 'Failed to connect with SSLCOMMERZ' );
			}
		}
	}

	public function getNextOrderNumber() {
		// Get the last created order
		$lastOrder = Order::orderBy( 'created_at', 'desc' )->first();

		if ( ! $lastOrder )
			// We get here if there is no order at all
			// If there is no number set it to 0, which will be 1 at the end.

		{
			$number = 0;
		} else {
			$number = $lastOrder->id;
		}

		// If we have ORD000001 in the database then we only want the number
		// So the substr returns this 000001

		// Add the string in front and higher up the number.
		// the %05d part makes sure that there are always 6 numbers in the string.
		// so it adds the missing zero's when needed.

		return 'THY' . date( 'Ymd' ) . ( intval( $number ) + 1 );
	}

	public function sslFaild( Request $request ) {
		return view( 'front.failed' )->with( 'message', 'Order failed. Please try again or contact with us.' );

	}

	public function sslCancel( Request $request ) {
		return view( 'front.failed' )->with( 'message', 'Order Cancel Successful.' );

	}

	public function addShippingAddress( $address ) {
		Session::put( 'shipping_address', $address );
	}

	public function clear() {
		if ( Session::has( 'shipping_address' ) ) {
			Session::forget( 'shipping_address' );
		}
	}

	public function preOdrers( Request $request ) {
		$shipping_address = "";
		$data             = $request->all();
		if ( ! is_null( $data['s_name'] ) && ! is_null( $data['s_mobile'] ) && ! is_null( $data['s_address'] ) ) {
			$shipping_add     = array(
				'name'    => $data['s_name'],
				'mobile'  => $data['s_mobile'],
				'address' => $data['s_address'],
			);
			$shipping_address = json_encode( $shipping_add );
		}
		if ( Auth::check() ) {
			$user     = Auth::user();
			$userType = 'Member';
		} else {
			$user     = $this->createUser();
			$userType = 'Member';
		}


		$discountPrice = 0;
		$bank          = "";
		$homeService   = Session::get( 'homeService', function () {
			return 0;
		} );
		$discountData  = Session::get( 'discount', function () {
			return null;
		} );

		if ( ! is_null( $discountData ) ) {
			$discountPrice = $discountData['discountPrice'];
			$bank          = $discountData['name'];
		}

		if ( $bank == 'bank' ) {
			return redirect()->route( 'thanks' )->with( 'message', 'Your Order Failed.' );
		}

		$total = ceil( Cart::getSubTotal() + $homeService - $discountPrice );
		$order = Order::create( [
			'user_id'          => $user->id,
			'status'           => 'Pending',
			'delivery_charge'  => $homeService,
			'discount_price'   => $discountPrice,
			'shipping_address' => $shipping_address,

			'ref_info'   => 'Dyntat Web',
			'invoice_no' => $this->getNextOrderNumber(),
			'total'      => $total
		] );
		if ( $order ) {
			if ( ! Cart::isEmpty() ) {
				foreach ( Cart::getContent() as $test ) {
					if ( $test->attributes['product_type'] == 'Test' ) {
						OrderDetail::create( [
							'user_id'    => $user->id,
							'order_id'   => $order->id,
							'test_id'    => $test->id,
							'test_price' => $test->price
						] );
					} else {
						OrderDetail::create( [
							'user_id'        => $user->id,
							'order_id'       => $order->id,
							'helth_sc_id'    => (int) $test->id - 4550,
							'helth_sc_price' => $test->price
						] );
					}

				}
			}
			$session_id      = Session::getId();
			$find_temp_order = TempOrder::where( 'session_id', $session_id )->where( 'status', 'active' )->first();
			if ( $find_temp_order ) {
				$find_temp_order->delete();
			}
			$this->sendMailWithDetails( $user, $order );
//			$msg = "Your Tests request (Order ID: " . $order->invoice_no . ") has been successfully placed. Our Customer care will contact you soon. For any query, please call us  at 09666737373, 01944443850.
//                        Best Regards,
//                        Dyntat Bangladesh Ltd.";
			$msg ="Your Order (ID: ". $order->invoice_no .") has been successfully placed. Dyntat Bangladesh Limited";
			$this->sendSMS( $user->mobile, $msg );
			$this->clearWishList();
			$this->clearConditions();
			$this->clear();

			return redirect()->route( 'thanks' )->with( 'message', 'You are successfully Send Order.' );
		}
	}

	public function editOdrerCod( Request $request ) {
		if ( Auth::check() ) {
			$user     = Auth::user();
			$userType = 'Member';
		} else {
			$user     = $this->createUser();
			$userType = 'Member';
		}
		Cart::clear();
		$test_ids = $request->get( 'id' );
		$order_id = $request->get( 'old_order' );
		$sum      = 0;
		foreach ( $test_ids as $id ) {
			$test = Test::find( $id );
			if ( $test ) {
				$data = array();
				//$data['attributes'] = array();
				$images             = json_decode( $test->picture );
				$data['id']         = $test->id;
				$data['name']       = $test->title;
				$data['price']      = $test->sale_price != "" ? $test->sale_price : $test->price;
				$data['quantity']   = 1;
				$data['attributes'] = array(
					'short_name'   => $test->short_name,
					'product_type' => 'Test',
					'imgPath'      => adminUrl( $images->thumb )
				);
				$sum                += $data['price'];
				Cart::add( $data );
			}
		}

		$payment        = Payment::create( [
			'tran_id'             => date( 'Ymd' ) . rand( 1000, 10000 ),
			'val_id'              => 0,
			'bank_tran_id'        => 0,
			'card_type'           => "COD",
			'card_issuer_country' => '',
			'currency_amount'     => 0,
			'tran_date'           => date( 'Y-m-d' )
		] );
		$Products       = Cart::getContent()->toJson();
		$order          = Order::where( 'id', $order_id )->first();
		$payment_id_old = json_decode( $order->payment_id );
		array_push( $payment_id_old, $payment->id );
		$order->products   = $Products;
		$order->total      = $sum + $order->delivery_charge;
		$order->payment_id = json_encode( $payment_id_old );
		$order->save();
		Cart::clear();
		if ( $order ) {
			Mail::to( $user->email )->send( new OrderShipped( $order ) );
			Cart::clear();

			return redirect()->route( 'thanks' )->with( 'message', 'You are successfully Send Order.' );
		}
	}

	public function editOdrerSsl( Request $request ) {
		$sslData  = $request->all();
		$test_ids = json_decode( $sslData['value_b'] );
		$order_id = $sslData['value_a'];

		if ( isset( $sslData['status'] ) && ( $sslData['status'] == "VALID" ) && isset( $sslData['val_id'] ) ) {
			$tran_id      = urlencode( $sslData['tran_id'] );
			$val_id       = urlencode( $sslData['val_id'] );
			$store_id     = urlencode( 'dyntatbdlive@ssl' );
			$store_passwd = urlencode( 'ThYR0#SSL^CaRE2018' );

			$requested_url = ( "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json" );

			$handle = curl_init();
			curl_setopt( $handle, CURLOPT_URL, $requested_url );
			curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );

			$result = curl_exec( $handle );

			$code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );

			if ( ( $code == 200 ) && ! ( curl_errno( $handle ) ) ) {
				curl_close( $handle );
				$result = json_decode( $result );
				if ( $result->status == "VALID" ) {
					$Payment = $this->createPayment( $result );
					if ( Auth::check() ) {
						$user     = Auth::user();
						$userType = 'Member';
					} else {
						$user     = $this->createUser();
						$userType = 'Member';
					}
					Cart::clear();
					//////////////////////////////////

					$sum = 0;
					foreach ( $test_ids as $id ) {
						$test = Test::find( $id );
						if ( $test ) {
							$data = array();
							//$data['attributes'] = array();
							$images             = json_decode( $test->picture );
							$data['id']         = $test->id;
							$data['name']       = $test->title;
							$data['price']      = $test->sale_price != "" ? $test->sale_price : $test->price;
							$data['quantity']   = 1;
							$data['attributes'] = array(
								'short_name'   => $test->short_name,
								'product_type' => 'Test',
								'imgPath'      => adminUrl( $images->thumb )
							);
							$sum                += $data['price'];
							Cart::add( $data );
						}
					}


					/////////////////////////////////

					$Products = Cart::getContent()->toJson();

					$order          = Order::where( 'id', $order_id )->first();
					$payment_id_old = json_decode( $order->payment_id );
					array_push( $payment_id_old, $Payment->id );
					$order->products   = $Products;
					$order->total      = $sum + $order->delivery_charge;
					$order->payment_id = json_encode( $payment_id_old );
					$order->save();
					Cart::clear();
					if ( $order ) {
						Mail::to( [ $user->email, 'no-reply@androidpin.com' ] )->send( new OrderShipped( $order ) );
						//Mail::to($user->email)->send(new OrderShipped($order));
						Cart::clear();

						return redirect()->route( 'thanks' )->with( 'message', 'You are successfully Send Order.' );
					}
				}

			} else {
				echo "Failed to connect with SSLCOMMERZ";
			}
		}
	}

	private function createPayment( $result, $user_id, $order_id, $payment_type ) {
		$Payment = Payment::create( [
			'user_id'             => $user_id,
			'order_id'            => $order_id,
			'payment_type'        => $payment_type,
			'tran_id'             => $result->tran_id,
			'val_id'              => $result->val_id,
			'bank_tran_id'        => $result->bank_tran_id,
			'card_type'           => $result->card_type,
			'card_issuer_country' => $result->card_issuer_country,
			'currency_amount'     => $result->currency_amount,
			'tran_date'           => $result->tran_date
		] );
		if ( $Payment ) {
			return $Payment;
		}

		return false;
	}

	public function clearWishList() {
		if ( Auth::check() && ! Cart::isEmpty() ) {
			$id  = Auth::user()->id;
			$old = DB::table( 'wishlist' )->where( 'user_id', $id )->first();
			if ( $old ) {
				DB::table( 'wishlist' )
				  ->where( 'user_id', $old->user_id )
				  ->delete();
			}
		}
	}

	public function clearConditions() {
		Cart::clear();
		$this->clearCondition();
	}

	/**
	 * @param $user
	 * @param $order
	 */
	public function sendMailWithDetails( $user, $order ) {
		//Mail::to( [$user->email,"md.parvez28@gmail.com"] )->send( new OrderShipped( $order ) );
		Mail::to( [ $user->email, "md.parvez28@gmail.com" ] )->send( new OrderShipped( $order ) );
	}

	private function createGuest() {
		$userData = session( 'CheckUserInfo' );
		$user     = Guest::create( [
			'name'    => $userData['parsonName'],
			'email'   => $userData['ParsonEmail'],
			'mobile'  => $userData['ParsonNumber'],
			'address' => $userData['ParsonAddress']
		] );
		if ( $user ) {
			return $user;
		}

		return false;
	}

	private function createUser() {
		$userData  = session( 'CheckUserInfo' );
		$role_user = Role::where( 'name', 'User' )->first();
		$pass      = "THY" . rand( 100, 999 ) . rand( 1000, 9999 );
		$user      = User::create( [
			'name'     => $userData['parsonName'],
			'email'    => $userData['ParsonEmail'],
			'password' => bcrypt( $pass ),
			'address'  => $userData['ParsonAddress'],
			'mobile'   => $userData['ParsonNumber'],
			'status'   => '1'
		] );
		if ( $user ) {
			$user->roles()->attach( $role_user );
			$user->password = $pass;
			Mail::to( $user->email )->send( new GuestRegistration( $user ) );

			//$response = $this->broker()->sendResetLink(['email' => $user->email]);
			return $user;
		}

		return false;
	}

	public function editOdrerAdmin( Request $request ) {
		Cart::clear();
		$test_ids = $request->get( 'id' );
		$order_id = $request->get( 'order_id' );
		$sum      = 0;
		foreach ( $test_ids as $id ) {
			$test = Test::find( $id );
			if ( $test ) {
				$data = array();
				//$data['attributes'] = array();
				$images             = json_decode( $test->picture );
				$data['id']         = $test->id;
				$data['name']       = $test->title;
				$data['price']      = $test->sale_price != "" ? $test->sale_price : $test->price;
				$data['quantity']   = 1;
				$data['attributes'] = array(
					'short_name'   => $test->short_name,
					'product_type' => 'Test',
					'imgPath'      => adminUrl( $images->thumb )
				);
				$sum                += $data['price'];
				Cart::add( $data );
			}
		}

		$payment        = Payment::create( [
			'tran_id'             => date( 'Ymd' ) . rand( 1000, 10000 ),
			'val_id'              => 0,
			'bank_tran_id'        => 0,
			'card_type'           => "COD by Admin",
			'card_issuer_country' => '',
			'currency_amount'     => 0,
			'tran_date'           => date( 'Y-m-d' )
		] );
		$Products       = Cart::getContent()->toJson();
		$order          = Order::where( 'id', $order_id )->first();
		$payment_id_old = json_decode( $order->payment_id );
		array_push( $payment_id_old, $payment->id );
		$order->products   = $Products;
		$order->total      = $sum + $order->delivery_charge;
		$order->payment_id = json_encode( $payment_id_old );
		$order->save();
		Cart::clear();
		if ( $order ) {
			Mail::to( $order->user->email )->send( new OrderShipped( $order ) );
			Cart::clear();

			return redirect()->route( 'order.processing.up', array( $order_id ) );
			// return redirect()->route('thanks')->with('message', 'You are successfully Send Order.');
		}
	}

	public function clearCondition() {
		Session::forget( 'discount' );
		Session::forget( 'homeService' );
	}

	public function getTotal() {
		$discountPrice = 0;
		$homeService   = Session::get( 'homeService', function () {
			return 0;
		} );
		$discountData  = Session::get( 'discount', function () {
			return null;
		} );
		if ( ! is_null( $discountData ) ) {
			$discountPrice = $discountData['discountPrice'];
		}

		return ceil( Cart::getSubTotal() + $homeService - $discountPrice );
	}

	public function processToCheckout( Request $request ) {
		$shipping_address = "";
		$data             = $request->all();
		if ( ! is_null( $data['s_name'] ) && ! is_null( $data['s_mobile'] ) && ! is_null( $data['s_address'] ) ) {
			$shipping_add     = array(
				'name'    => $data['s_name'],
				'mobile'  => $data['s_mobile'],
				'address' => $data['s_address'],
			);
			$shipping_address = json_encode( $shipping_add );
			$this->addShippingAddress( $shipping_address );
		}

		$discountPrice = 0;
		$homeService   = Session::get( 'homeService', function () {
			return 0;
		} );
		$discountData  = Session::get( 'discount', function () {
			return null;
		} );
		if ( ! is_null( $discountData ) ) {
			$discountPrice = $discountData['discountPrice'];
		}
		$total                     = ceil( Cart::getSubTotal() + $homeService - $discountPrice );
		$user                      = Auth::user();
		$post_data                 = array();
		$post_data['store_id']     = "dyntatbdlive@ssl";
		$post_data['store_passwd'] = "ThYR0#SSL^CaRE2018";
		$post_data['currency']     = "BDT";
		$post_data['tran_id']      = Cart::tranId();
		$post_data['success_url']  = route( 'pay.val.front' );
		$post_data['fail_url']     = route( 'pay.faild.front' );
		$post_data['cancel_url']   = route( 'pay.cancel.front' );

		$post_data['value_a']      = $shipping_address;
		$post_data['value_b']      = $discountPrice;
		$post_data['value_c']      = $homeService;
		$post_data['total_amount'] = $total;


		if ( $discountPrice > 0 && ! is_null( $discountData ) && ! is_null( $discountData['card_name'] ) ) {
			$post_data['multi_card_name'] = $discountData['card_name'];
		}

		$post_data['cus_name']  = $user['parsonName'];
		$post_data['cus_email'] = $user['ParsonEmail'];
		$post_data['cus_add1']  = $user['ParsonAddress'];
		$post_data['cus_phone'] = $user['ParsonNumber'];


		$direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";

		$handle = curl_init();
		curl_setopt( $handle, CURLOPT_URL, $direct_api_url );
		curl_setopt( $handle, CURLOPT_TIMEOUT, 30 );
		curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 30 );
		curl_setopt( $handle, CURLOPT_POST, 1 );
		curl_setopt( $handle, CURLOPT_POSTFIELDS, $post_data );
		curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );

		$content = curl_exec( $handle );

		$code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );

		if ( $code == 200 && ! ( curl_errno( $handle ) ) ) {
			curl_close( $handle );
			$sslcommerzResponse = $content;

		} else {
			curl_close( $handle );
			echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
			exit;
		}

		$sslcz = json_decode( $sslcommerzResponse, true );

		if ( isset( $sslcz['GatewayPageURL'] ) && $sslcz['GatewayPageURL'] != "" ) {
			echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
			exit;
		} else {
			echo "JSON Data parsing error!" . var_dump( $sslcommerzResponse );
		}
	}

	private function sendSMS( $mbl, $msg ) {
		$username = 'dyntat';
		$password = 'sr1tmjEU';
		$header   = "Basic " . base64_encode( $username . ":" . $password );
		$curl     = curl_init();
		$number   = $this->preNumber( $mbl );
		curl_setopt_array( $curl, array(
			CURLOPT_URL            => "http://api.infobip.com/sms/1/text/single",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => "{ \"from\":\"8804445650684\", \"to\":[ \"$number\", \"+8801997719966\" ], \"text\":\"$msg\" }",
			CURLOPT_HTTPHEADER     => array(
				"accept: application/json",
				"authorization: $header",
				"content-type: application/json"
			),
		) );

		$response = curl_exec( $curl );
		$err      = curl_error( $curl );

		curl_close( $curl );

		if ( $err ) {
			return $err;
		} else {
			return "OK";
		}
	}

	private function preNumber( $number ) {
		if ( strpos( $number, '+88' ) === 0 ) {
			return $number;

		} elseif ( strpos( $number, '88' ) === 0 ) {
			return "+" . $number;
		} else {
			return "+88" . $number;
		}
	}
}