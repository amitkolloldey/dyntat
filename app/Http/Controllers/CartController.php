<?php

namespace App\Http\Controllers;


use App\HelthScreenDetails;
use App\Order;
use App\Payment;
use App\TempOrder;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Test;
use App\HealthScreen;
use Cart;
use Illuminate\Support\Facades\Auth;
use Log;

class CartController extends Controller {

	public function checkout( Request $request ) {
		$this->clear();
		if ( ! Cart::isEmpty() ) {
			//todo:: insert database

			if ( ! Auth::check() ) {
				$validator = Validator::make( $request->all(), [
					'parsonName'    => 'required|max:190',
					'ParsonEmail'   => 'required|email|max:190',
					'ParsonNumber'  => 'required|min:5|numeric',
					'ParsonAddress' => 'max:200'
				] );
				if ( $validator->fails() ) {
					return redirect()
						->back()
						->withErrors( $validator )
						->withInput();
				}
			}
			$userInfo = array();
			if ( Auth::check() ) {
				$userInfo['parsonName']    = Auth::user()->name;
				$userInfo['ParsonEmail']   = Auth::user()->email;
				$userInfo['ParsonNumber']  = Auth::user()->mobile;
				$userInfo['ParsonAddress'] = Auth::user()->address;
			} else {
				$checkdata = $request->all();
				$user      = \App\User::where( 'email', $checkdata['ParsonEmail'] )->orWhere( 'mobile', $checkdata['ParsonNumber'] )->get()->count();
				if ( $user > 0 ) {
					return redirect()->route( 'login' );
				} else {
					$userInfo['parsonName']    = $checkdata['parsonName'];
					$userInfo['ParsonEmail']   = $checkdata['ParsonEmail'];
					$userInfo['ParsonNumber']  = $checkdata['ParsonNumber'];
					$userInfo['ParsonAddress'] = $checkdata['ParsonAddress'];
					//if ( !( $request->session()->has('CheckUserInfo') ) ) {
					$request->session()->put( 'CheckUserInfo', $userInfo );
					//}
				}
			}
			$discount_list = DB::table( 'bank_discount' )->where( 'status', true )->get();
			//todo:: insert temp data

			$session_id = Session::getId();
			$user_info  = $userInfo['parsonName'] . "<br>" . $userInfo['ParsonEmail'] . "<br>" .
			              $userInfo['ParsonNumber'] . "<br>" . $userInfo['ParsonAddress'];
			$tests      = "";
			foreach ( Cart::getContent() as $test ) {
				$tests .= $test->name . ", ";
			}
			$find_temp_order = TempOrder::where( 'session_id', $session_id )->where( 'status', 'active' )->first();
			if ( $find_temp_order ) {
				$find_temp_order->user_info     = $user_info;
				$find_temp_order->order_details = $tests;
				$find_temp_order->updated_at    = date( 'Y-m-d' );
				$find_temp_order->save();

			} else {
				TempOrder::create( [
					'session_id'    => $session_id,
					'status'        => 'active',
					'user_info'     => $user_info,
					'order_details' => $tests
				] );
			}
			$deliverycharge = DB::table( 'deliverycharge' )->where( 'deliverycharge', '>=', '0' )->first();

			return view( 'front.checkout' )
				->with( 'bank_discount', $discount_list )
				->with( 'deliverycharge', $deliverycharge )
				->with( 'userInfo', $userInfo );
		} else {
			$data = "Your Cart is Empty.";

			return redirect()->back()->with( 'cmsg', $data );
		}
	}

	public function clear() {
		if ( Session::has( 'shipping_address' ) ) {
			Session::forget( 'shipping_address' );
		}
	}

	// add test to cart and also to database
	public function addTestToCart( $id ) {
		if ( Cart::get( $id ) ) {
			return response()->json( [
				'success'    => true,
				'datastatus' => false,
				'data'       => false
			] );
		}
		$test = Test::find( $id );
		if ( $test ) {
			$data               = array();
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

			Cart::add( $data );

			if ( Auth::check() && ! Cart::isEmpty() ) {
				$user_id = Auth::user()->id;
				if ( ! Cart::isEmpty() && $cartCollection = Cart::getContent() ) {
					foreach ( $cartCollection as $cart ) {
						$cart_id   = $cart->id;
						$cart_type = null;
						if ( $cart->attributes->has( 'product_type' ) ) {
							$cart_type = $cart->attributes->product_type;
						}
						if ( ! is_null( $cart_type ) && $cart_type == "Test" ) {
							$old = DB::table( 'wishlist' )->where( [
								[ 'user_id', '=', $user_id ],
								[ 'test_id', '=', $cart_id ]
							] )->first();
							if ( ! $old ) {
								DB::table( 'wishlist' )->insert( [
									'user_id'    => $user_id,
									'test_id'    => $cart_id,
									'created_at' => date( 'Y-m-d' ),
									'updated_at' => date( 'Y-m-d' )
								] );
							}
						}
					}
				}
			}

			$cartData = $this->getCartTestsHtml();
			if ( $cartData !== false ) {
				return response()->json( [
					'success'    => true,
					'datastatus' => true,
					'data'       => $cartData
				] );
			} else {
				return response()->json( [
					'success'    => true,
					'datastatus' => false,
				] );
			}
		}
	}

// remove test from cart and also from database
	public function removeTestToCart( $id ) {
		if ( $id ) {
			$item = Cart::get( $id );
			if ( $item !== null ) {
				Cart::remove( $id );
				if ( Auth::check() ) {
					$user_id = Auth::user()->id;
					if ( $item->attributes->product_type == 'Test' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'test_id', '=', $id ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'test_id', '=', $id ] ] )
							  ->delete();
						}
					}
					if ( $item->attributes->product_type == 'Health' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'health_sc_id', '=', (int) $id - 4550 ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'health_sc_id', '=', (int) $id - 4550 ] ] )
							  ->delete();
						}
					}
				}
				if ( $item->attributes->product_type == 'Health' ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
						'data'       => "reload"
					] );
				}
				$cartData = $this->getCartTestsHtml();
				if ( $cartData !== false ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => true,
						'data'       => $cartData
					] );
				} else {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
					] );
				}

			}
		}
	}

	public function addHealthToCart( $id ) {
		if ( Cart::get( 4550 + $id ) ) {
			return response()->json( [
				'success'    => true,
				'datastatus' => false,
			] );
		}
		$health      = HealthScreen::find( $id );
		$helth_tests = HelthScreenDetails::where( 'helth_sc_id', $id )->get();
		foreach ( $helth_tests as $test ) {
			Cart::remove( $test->test_id );
			if ( Auth::check() ) {
				$user_id = Auth::user()->id;
				$old     = DB::table( 'wishlist' )->where( [
					[ 'user_id', '=', $user_id ],
					[ 'test_id', '=', $test->test_id ]
				] )->first();
				if ( $old ) {
					DB::table( 'wishlist' )
					  ->where( [ [ 'user_id', '=', $user_id ], [ 'test_id', '=', $test->test_id ] ] )
					  ->delete();
				}
			}
		}
		if ( $health ) {
			$data               = array();
			$data['id']         = ( 4550 + $health->id );
			$data['name']       = $health->title;
			$data['price']      = $health->old_price != "" ? $health->old_price : $health->price;
			$data['quantity']   = 1;
			$data['attributes'] = array(
				'product_type' => 'Health',
				'imgPath'      => adminUrl( $health->thumb )
			);
			Cart::add( $data );

			if ( Auth::check() && ! Cart::isEmpty() ) {
				$user_id = Auth::user()->id;
				if ( ! Cart::isEmpty() && $cartCollection = Cart::getContent() ) {
					foreach ( $cartCollection as $cart ) {
						$cart_id   = $cart->id;
						$cart_type = null;
						if ( $cart->attributes->has( 'product_type' ) ) {
							$cart_type = $cart->attributes->product_type;
						}
						if ( ! is_null( $cart_type ) && $cart_type == "Health" ) {
							$old = DB::table( 'wishlist' )->where( [
								[ 'user_id', '=', $user_id ],
								[ 'health_sc_id', '=', $cart_id ]
							] )->first();
							if ( ! $old ) {
								DB::table( 'wishlist' )->insert( [
									'user_id'      => $user_id,
									'health_sc_id' => (int) $cart_id - 4550,
									'created_at'   => date( 'Y-m-d' ),
									'updated_at'   => date( 'Y-m-d' )
								] );
							}
						}
					}
				}
			}


			$cartData = $this->getCartTestsHtml();
			if ( $cartData !== false ) {
				return response()->json( [
					'success'    => true,
					'datastatus' => true,
					'data'       => $cartData
				] );
			} else {
				return response()->json( [
					'success'    => true,
					'datastatus' => false,
				] );
			}
		}
	}


	public function getCartTests( $type = null ) {
		if ( ! Cart::isEmpty() ) {
			$cartCollection = Cart::getContent();
			if ( $type == 'toArray' ) {

			} elseif ( $type == 'toJson' ) {
				return $cartCollection->toJson();
			} elseif ( $type == 'count' ) {
				return $cartCollection->count();
			} else {
				return $cartCollection;
			}
		} else {
			return false;
		}
	}

	public function getCartTestsHtml() {
		$cartData = $this->getCartTests();
		if ( $cartData !== false ) {
			$sum     = 0;
			$outHtml = "";
			foreach ( $cartData as $item ) {
				$sum     += $item->price;
				$outHtml .= "<li>";
				$outHtml .= "<div class='item-desc'>";
				$outHtml .= "<strong>" . $item->name . "</strong>";

				$outHtml .= "</div>";
				$outHtml .= "<ul  class='cart_price'>";
				$outHtml .= "<li class='remove-from-cart'>";
				$outHtml .= "<div class='remove' data-cart-add='" . route( 'add.to.cart', array( $item->id ) ) . "' data-cart-remove='" . route( 'remove.to.cart', array( $item->id ) ) . "' data-cart-id='" . $item->id . "' >";
				$outHtml .= "<a href='" . route( 'remove.to.cart', array( $item->id ) ) . "' class='remove-link'>";
				$outHtml .= "<span class='glyphicon glyphicon-trash'>";
				$outHtml .= "</span>";
				$outHtml .= "</a>";
				$outHtml .= "</div>";
				$outHtml .= "</li>";
				$outHtml .= "<li>";
				$amount  = $item->price;
				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}
				$outHtml .= "<span class='item-price'>" . $temp2 . "</span>";
				$outHtml .= "</li>";
				$outHtml .= "</ul>";
				$outHtml .= "</li>";
			}
			if ( ! Cart::isEmpty() ) {
				$outHtml .= "<li class='subtotal'>";
				$outHtml .= "<a href='" . route( 'clear.cart2' ) . "'class='clear-cart'>Clear Cart</a>";
				$amount  = $sum;

				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}

				$outHtml .= "<strong class='cart-total'>Total - " . $temp2 . " Tk" . "</strong>";
				$outHtml .= "</li>";
			}

			return $outHtml;
		}
	}

//convert to taka format
//	public function taka( $amount ) {
//		//todo taka start
//		$tmp      = explode( '.', $amount ); // for float or double values
//		$strMoney = '';
//		$divide   = 1000;
//		$amount   = $tmp[0];
//		$strMoney .= str_pad( $amount % $divide, 3, '0', STR_PAD_LEFT );
//		$amount   = (int) ( $amount / $divide );
//		while ( $amount > 0 ) {
//			$divide   = 100;
//			$strMoney = str_pad( $amount % $divide, 2, '0', STR_PAD_LEFT ) . ',' . $strMoney;
//			$amount   = (int) ( $amount / $divide );
//		}
//
//		if ( substr( $strMoney, 0, 1 ) == '0' ) {
//			$strMoney = substr( $strMoney, 1 );
//		}
//
//		if ( isset( $tmp[1] ) ) // if float and double add the decimal digits here.
//		{
//			$temp2 = $strMoney . '.' . $tmp[1];
//		} else {
//			$temp2 = $strMoney;
//
//		}
//
//		return $temp2;
//	}

// clear all test from cart and also from database
	public function clearAllCart() {
		if ( Auth::check() && ! Cart::isEmpty() ) {
			$id = Auth::user()->id;
			DB::table( 'wishlist' )->where( 'user_id', $id )->delete();
		}
		Cart::clear();
		$this->clearCondition();
		$this->clear();

		return redirect()->route( 'test.all.front' );
	}

	public function clearAllCart2() {
		if ( Auth::check() && ! Cart::isEmpty() ) {
			$id  = Auth::user()->id;
			$old = DB::table( 'wishlist' )->where( 'user_id', $id )->first();
			if ( $old ) {
				DB::table( 'wishlist' )
				  ->where( 'user_id', $old->user_id )
				  ->delete();
			}
		}
		Cart::clearCartConditions();
		Cart::clear();
		$this->clear();


		return redirect()->route( 'testmenu' );
	}

	public function recheckout( Request $request ) {
		if ( Auth::check() && ! Cart::isEmpty() ) {
			$userInfo                  = array();
			$userInfo['parsonName']    = Auth::user()->name;
			$userInfo['ParsonEmail']   = Auth::user()->email;
			$userInfo['ParsonNumber']  = Auth::user()->mobile;
			$userInfo['ParsonAddress'] = Auth::user()->address;

			$order_id      = $request->get( 'order_id' );
			$old_order     = Order::where( 'id', $order_id )->first();
			$payable_price = ( $old_order->total - $old_order->delivery_charge + $old_order->discount_price );
			if ( $payable_price <= Cart::getSubTotal() ) {
				$old_payment   = Payment::where( [
					'user_id'  => Auth::user()->id,
					'order_id' => $order_id,
				] )->sum( 'currency_amount' );
				$discount_list = DB::table( 'bank_discount' )->where( 'status', true )->get();
				if ( $old_order->delivery_charge > 0 ) {
					$this->addConditionHomeService();
				}

				return view( 'front.recheckout' )
					->with( 'old_order', $old_order )
					->with( 'bank_discount', $discount_list )
					->with( 'userInfo', $userInfo )
					->with( 'paid', $old_payment );

			} else {

			}
		}
	}

	public function addTestToCart2( $id ) {
		$test = Test::find( $id );
		if ( $test ) {
			$data = array();
			$data['id']         = $test->id;
			$data['name']       = $test->title;
			$data['price']      = $test->price;
			$data['quantity']   = 1;
			$data['attributes'] = array(
				'product_type' => 'Test'
			);

			Cart::add( $data );
			if ( Auth::check() && ! Cart::isEmpty() ) {
				$user_id = Auth::user()->id;
				if ( ! Cart::isEmpty() && $cartCollection = Cart::getContent() ) {
					foreach ( $cartCollection as $cart ) {
						$cart_id   = $cart->id;
						$cart_type = null;
						if ( $cart->attributes->has( 'product_type' ) ) {
							$cart_type = $cart->attributes->product_type;
						}
						if ( ! is_null( $cart_type ) && $cart_type == "Test" ) {
							$old = DB::table( 'wishlist' )->where( [
								[ 'user_id', '=', $user_id ],
								[ 'test_id', '=', $cart_id ]
							] )->first();
							if ( ! $old ) {
								DB::table( 'wishlist' )->insert( [
									'user_id'    => $user_id,
									'test_id'    => $cart_id,
									'created_at' => date( 'Y-m-d' ),
									'updated_at' => date( 'Y-m-d' )
								] );
							}
						}
					}
				}
			}

			$cartData = $this->getCartTestsHtml2();
			if ( $cartData !== false ) {
				return response()->json( [
					'success'    => true,
					'datastatus' => true,
					'data'       => $cartData
				] );
			} else {
				return response()->json( [
					'success'    => true,
					'datastatus' => false,
				] );
			}
		} else {
			return response()->json( [
				'success'    => true,
				'datastatus' => false,
			] );
		}
	}

	public function addTestToCart4( $id ) {
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

			Cart::add( $data );

			if ( Auth::check() && ! Cart::isEmpty() ) {
				$user_id = Auth::user()->id;
				if ( ! Cart::isEmpty() && $cartCollection = Cart::getContent() ) {
					foreach ( $cartCollection as $cart ) {
						$cart_id   = $cart->id;
						$cart_type = null;
						if ( $cart->attributes->has( 'product_type' ) ) {
							$cart_type = $cart->attributes->product_type;
						}
						if ( ! is_null( $cart_type ) && $cart_type == "Test" ) {
							$old = DB::table( 'wishlist' )->where( [
								[ 'user_id', '=', $user_id ],
								[ 'test_id', '=', $cart_id ]
							] )->first();
							if ( ! $old ) {
								DB::table( 'wishlist' )->insert( [
									'user_id'    => $user_id,
									'test_id'    => $cart_id,
									'created_at' => date( 'Y-m-d' ),
									'updated_at' => date( 'Y-m-d' )
								] );
							}
						}
					}
				}
			}

			$cartData = $this->getCartTestsHtml4();
			if ( $cartData !== false ) {
				return response()->json( [
					'success'    => true,
					'datastatus' => true,
					'data'       => $cartData
				] );
			} else {
				return response()->json( [
					'success'    => true,
					'datastatus' => false,
				] );
			}
		}
	}

	public function removeTestToCart2( $id ) {
		if ( $id ) {
			$item = Cart::get( $id );
			if ( $item !== null ) {
				Cart::remove( $id );
				if ( Auth::check() ) {
					$user_id = Auth::user()->id;
					if ( $item->attributes->product_type == 'Test' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'test_id', '=', $id ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'test_id', '=', $id ] ] )
							  ->delete();
						}
					}
					if ( $item->attributes->product_type == 'Health' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'health_sc_id', '=', (int) $id - 4550 ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'health_sc_id', '=', (int) $id - 4550 ] ] )
							  ->delete();
						}
					}
				}
				if ( $item->attributes->product_type == 'Health' ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
						'data'       => "reload"
					] );
				}
				$cartData = $this->getCartTestsHtml2();
				if ( $cartData !== false ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => true,
						'data'       => $cartData
					] );
				} else {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
					] );
				}
			}
		}
	}

	public function removeTestToCart4( $id ) {
		if ( $id ) {
			$item = Cart::get( $id );
			if ( $item !== null ) {
				Cart::remove( $id );
				if ( Auth::check() ) {
					$user_id = Auth::user()->id;
					if ( $item->attributes->product_type == 'Test' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'test_id', '=', $id ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'test_id', '=', $id ] ] )
							  ->delete();
						}
					}
					if ( $item->attributes->product_type == 'Health' ) {
						$old = DB::table( 'wishlist' )->where( [
							[ 'user_id', '=', $user_id ],
							[ 'health_sc_id', '=', (int) $id - 4550 ]
						] )->first();
						if ( $old ) {
							DB::table( 'wishlist' )
							  ->where( [ [ 'user_id', '=', $user_id ], [ 'health_sc_id', '=', (int) $id - 4550 ] ] )
							  ->delete();
						}
					}
				}
				if ( $item->attributes->product_type == 'Health' ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
						'data'       => "reload"
					] );
				}
				$cartData = $this->getCartTestsHtml4();
				if ( $cartData !== false ) {
					return response()->json( [
						'success'    => true,
						'datastatus' => true,
						'data'       => $cartData
					] );
				} else {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
					] );
				}
			}
		}
	}

	public function getCartTestsHtml2() {
		$cartData = $this->getCartTests();
		if ( $cartData !== false ) {
			$sum     = 0;
			$outHtml = "";
			foreach ( $cartData as $item ) {
				$sum     += $item->price;
				$outHtml .= "<li>";
				$outHtml .= "<div class='item-desc'>";
				$outHtml .= "<strong>" . $item->name . "</strong>";

				$outHtml .= "</div>";
				$outHtml .= "<ul  class='cart_price'>";
				$outHtml .= "<li class='remove-from-cart'>";
				$outHtml .= "<div class='remove2' data-title-2='". $item->name."' data-cart-add='" . route( 'add.to.cart2', array( $item->id ) ) . "' data-cart-remove='" . route( 'remove.to.cart2', array( $item->id ) ) . "' data-cart-id='" . $item->id . "' >";
				$outHtml .= "<a href='" . route( 'remove.to.cart2', array( $item->id ) ) . "' class='remove-link-2'>";
				$outHtml .= "<span class='glyphicon glyphicon-trash'>";
				$outHtml .= "</span>";
				$outHtml .= "</a>";
				$outHtml .= "</div>";
				$outHtml .= "</li>";
				$outHtml .= "<li>";
				$amount  = $item->price;
				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}
				$outHtml .= "<span class='item-price'>" . $temp2 . "</span>";
				$outHtml .= "</li>";
				$outHtml .= "</ul>";
				$outHtml .= "</li>";
			}
			if ( ! Cart::isEmpty() ) {
				$outHtml .= "<li class='subtotal'>";
				$outHtml .= "<a href='" . route( 'clear.cart2' ) . "'class='clear-cart'>Clear Cart</a>";
				$amount  = $sum;

				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}

				$outHtml .= "<strong class='cart-total'>Total - " . $temp2 . " Tk" . "</strong>";
				$outHtml .= "</li>";
			}

			return $outHtml;
		}
	}

	public function getCartTestsHtml4() {
		$cartData = $this->getCartTests();
		if ( $cartData !== false ) {
			$sum     = 0;
			$outHtml = "";
			foreach ( $cartData as $item ) {
				$sum     += $item->price;
				$outHtml .= "<li>";
				$outHtml .= "<div class='item-desc'>";
				$outHtml .= "<strong>" . $item->name . "</strong>";
				$outHtml .= "</div>";
				$outHtml .= "<ul  class='cart_price'>";
				$outHtml .= "<li class='remove-from-cart'>";
				$outHtml .= "<div class='remove4' data-cart-add4='" . route( 'add.to.cart4', array( $item->id ) ) . "' data-cart-remove4='" . route( 'remove.to.cart4', array( $item->id ) ) . "' data-cart-id4='" . $item->id . "' >";
				$outHtml .= "<a href='" . route( 'remove.to.cart4', array( $item->id ) ) . "' class='remove-link4'>";
				$outHtml .= "<span class='glyphicon glyphicon-remove'>";
				$outHtml .= "</span>";
				$outHtml .= "</a>";
				$outHtml .= "</div>";
				$outHtml .= "</li>";
				$outHtml .= "<li>";
				$amount  = $item->price;
				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}
				$outHtml .= "<span class='item-price'>" . $temp2 . "</span>";
				$outHtml .= "</li>";
				$outHtml .= "</ul>";
				$outHtml .= "</li>";
			}
			if ( ! Cart::isEmpty() ) {
				$outHtml .= "<li class='subtotal'>";
				$outHtml .= "<a href='" . route( 'clear.cart' ) . "'class='clear-cart'>Clear Cart</a>";
				$amount  = $sum;

				if ( $amount >= 1000 ) {
					$temp2 = tk( $amount );
				} else {
					$temp2 = $amount;
				}

				$outHtml .= "<strong class='cart-total'>Total - " . $temp2 . " Tk" . "</strong>";
				$outHtml .= "</li>";
			}

			return $outHtml;
		}
	}

	public function addConditionHomeService() {
		$deliverycharge = DB::table( 'deliverycharge' )->where( 'deliverycharge', '>=', '0' )->first();
		if ( $deliverycharge ) {
			if ( is_null( Session::has( 'homeService' ) ) ) {
				Session::put( 'homeService', $deliverycharge->deliverycharge );
			} else {
				Session::forget( 'homeService' );
				Session::put( 'homeService', $deliverycharge->deliverycharge );
			}
			$htmldata = $this->getTotalHtml();
			$getTotal = $this->getTotal();

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'total'      => $getTotal,
				'data'       => $htmldata
			] );
		} else {
			return response()->json( [
				'success'    => false,
				'datastatus' => false,
				'data'       => "Failed"
			] );
		}

	}

	public function removeConditionHomeService() {
		if ( ! is_null( Session::has( 'homeService' ) ) && Session::get( 'homeService', function () {
				return 0;
			} ) > 0 ) {
			Session::forget( 'homeService' );
		}
		$getTotal = $this->getTotal();
		$htmldata = $this->getTotalHtml();

		return response()->json( [
			'success'    => true,
			'datastatus' => true,
			'total'      => $getTotal,
			'data'       => $htmldata
		] );
	}

	public function getTotalHtml() {
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

		$payableAmount = ceil( Cart::getSubTotal() + $homeService - $discountPrice );
		$data          = "";
		if ( $discountPrice > 0 ) {
			$data .= "<tr>";
			$data .= "<td colspan='3' class='alignleft'>Discount Amount</td>";
			$data .= "<td>" . tk( $discountPrice ) . " Tk" . "</td>";
			$data .= "</tr>";

			$data .= "<tr>";
			$data .= "<td colspan='3' class='alignleft'>Sub Total</td>";
			$data .= "<td>" . tk( Cart::getSubTotal() - $discountPrice ) . " Tk" . "</td>";
			$data .= "</tr>";
		}


		if ( ! is_null( Session::has( 'homeService' ) ) && $homeService > 0 ) {
			$data .= "<tr>";
			$data .= "<td colspan='3' class='alignleft' >Home Collection & Report Delivery Fee</td>";
			$data .= "<td>" . ( tk( $homeService ) ) . " Tk" . "</td>";
			$data .= "</tr>";
		}
		$data .= "<tr>";
		$data .= "<td colspan='3' class='alignleft'>Payable Amount</td>";
		$data .= "<td>" . tk( $payableAmount ) . " Tk" . "</td>";
		$data .= "</tr>";

		return $data;
	}

	public function addCoupon( Request $request ) {
		$data   = $request->all();
		$coupon = $data['coupon'];

		if ( isset( $coupon ) ) {
			$today      = date( 'Y-m-d' );
			$validation = DB::table( 'coupon' )->where( 'code', $data['coupon'] )
			                ->where( 'from_date', '<=', $today )
			                ->where( 'to_date', '>=', $today )
			                ->first();

			if ( $validation ) {
				if ( ! Cart::isEmpty() ) {
					return $this->addDiscountOnItem( $validation->discount, - 1, 'coupon' );
				} else {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
						'data'       => "Your cart is empty."
					] );
				}
			} else {
				return response()->json( [
					'success'    => true,
					'datastatus' => false,
					'data'       => "Coupon not Found or date expired."
				] );
			}
		} else {
			$id    = $data['id'];
			$value = $data['value'];
			if ( $value == "coupon" || $value == "other" ) {
				return $this->addDiscountOnItem( 0, - 5, 'coupon' );
			} else {
				$validation = DB::table( 'bank_discount' )->find( $id );
				if ( $validation ) {
					return $this->addDiscountOnItem( $validation->discount, $id, 'bank', $validation->field_name );
				} else {
					return response()->json( [
						'success'    => true,
						'datastatus' => false,
						'data'       => "Discount expired."
					] );
				}
			}
		}
	}

	public function clearCondition() {
		Session::forget( 'discount' );
		Session::forget( 'homeService' );
	}

	public function addDiscountOnItem( $discount, $id, $coupon, $card_name = null ) {
		try {
			$subTotal      = Cart::getSubTotal();
			$discountPrice = $subTotal * ( $discount / 100 );
			$afterDiscount = $subTotal - $discountPrice;
			$data          = array(
				'name'          => $coupon,
				'id'            => $id,
				'discount'      => $discount,
				'card_name'     => $card_name,
				'discountPrice' => $discountPrice,
				'afterDiscount' => $afterDiscount
			);
			if ( is_null( Session::has( 'discount' ) ) ) {
				Session::put( 'discount', $data );
			} elseif ( $id == - 5 ) {
				Session::forget( 'discount' );
			} else {
				Session::forget( 'discount' );
				Session::put( 'discount', $data );
			}
			$htmldata = $this->getTotalHtml();
			$getTotal = $this->getTotal();

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'total'      => $getTotal,
				'data'       => $htmldata
			] );
		} catch ( Exception $e ) {
			return response()->json( [
				'success'    => true,
				'datastatus' => false,
				'data'       => $htmldata
			] );
		}
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
}
