<?php

namespace App\Http\Controllers;


use App\HelthScreenDetails;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Validator;
use Cart;
use App\Test;
use App\Offer;
use App\Career;
use App\Media;
use App\HealthScreen;
use App\ServiceArea;
use App\RequestCall;
use App\CustomerCorpo;
use App\Healthcare;
use App\Publication;
use App\Mail\ContactMessage;


class FrontPageController extends Controller {
	public function thanks() {
		if ( session( 'message' ) ) {
			return view( 'front.thanks' );
		}

		return redirect()->route( 'home' );
	}

	public function Offers() {
		$Offers = Offer::paginate( 10 );

		return view( 'front.offers' )
			->with( 'Offers', $Offers );
	}

	public function OfferSingle( $link ) {
		$Offer = Offer::where( "link", $link )->limit( 1 )->get();

		return view( 'front.offer' )
			->with( 'Offer', $Offer );
	}

	public function publications() {
		$publications = Publication::orderBy('id', 'desc')->paginate( 10 );

		return view( 'front.publications' )
			->with( 'publications', $publications );
	}

	public function publicationSingle( $link ) {
		$publications = Publication::where( [ 'link' => $link ] )->get();

		return view( 'front.publication-single' )
			->with( 'publications', $publications );
	}
	public function publicationSin( $link ) {
		$publications = Publication::where( [ 'link' => $link ] )->get();

		return view( 'front.publication-sin' )
			->with( 'publications', $publications );
	}

	public function Healthcare() {
		return view( 'front.healthcare' );
	}

	public function career() {
		$Careers = Career::all();

		return view( 'front.career' )
			->with( 'Careers', $Careers );
	}

	public function media() {
		$Medias = Media::paginate( 6 );

		return view( 'front.media' )
			->with( 'Medias', $Medias );
	}

	public function careerSingle( $id ) {
		if ( $id ) {
			$Career = Career::find( $id );
			if ( $Career ) {
				return view( 'front.career-single' )
					->with( 'Career', $Career );
			} else {
				return view( 'front.404' );
			}
		}
	}

	public function healthcarePartner() {
		return view( 'front.healthcarePartner' );
	}

	public function healthcareCreate( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'mobile'         => 'required|max:190',
			'firstname'      => 'required|max:190',
			'lastname'       => 'required|max:190',
			'registerAs'     => 'required|max:190',
			'qualification'  => 'required|max:190',
			'specialization' => 'required|max:190',
			'email'          => 'required|max:190',
			'phone'          => 'required|max:190',
			'homeAddress'    => 'required|max:190',
			'chamberAddress' => 'required|max:190'
		] );
		if ( $validator->fails() ) {
			return redirect()
				->route( 'Healthcare' )
				->withErrors( $validator )
				->withInput();
		} else {
			$data             = $request->all();
			$CustomerCorpoAdd = Healthcare::create( [
				'mobile'         => $data['mobile'],
				'firstname'      => $data['firstname'],
				'lastname'       => $data['lastname'],
				'registerAs'     => $data['registerAs'],
				'qualification'  => $data['qualification'],
				'specialization' => $data['specialization'],
				'email'          => $data['email'],
				'phone'          => $data['phone'],
				'homeAddress'    => $data['homeAddress'],
				'chamberAddress' => $data['chamberAddress']
			] );
			if ( $CustomerCorpoAdd ) {
				return redirect()
					->route( 'Healthcare' )
					->with( 'smessage', 'Registation successfully' );
			}
		}
	}

	public function customerCorpo() {
		return view( 'front.customerCorpo' );
	}

	public function customerCorpoCreate( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'personName'   => 'required|max:190',
			'companyName'  => 'required|max:190',
			'personMobile' => 'required|max:190',
			'email'        => 'required|max:190',
			'userType'     => 'required|max:190',
			'remarks'      => 'required|max:190',
		] );
		if ( $validator->fails() ) {
			return redirect()
				->route( 'Customer' )
				->withErrors( $validator )
				->withInput();
		} else {
			$data             = $request->all();
			$CustomerCorpoAdd = CustomerCorpo::create( [
				'personName'   => $data['personName'],
				'companyName'  => $data['companyName'],
				'personMobile' => $data['personMobile'],
				'email'        => $data['email'],
				'userType'     => $data['userType'],
				'remarks'      => $data['remarks']
			] );
			if ( $CustomerCorpoAdd ) {
				return redirect()
					->route( 'Customer' )
					->with( 'smessage', 'Your Message Send successfully' );
			}
		}
	}

	public function requestCall( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'testId' => 'required|max:190',
			'number' => 'required|max:190',
		] );
		if ( ! $validator->fails() ) {
			$data       = $request->all();
			$requestAdd = RequestCall::create( [
				'test_id' => $data['testId'],
				'number'  => $data['number'],
			] );
			if ( $requestAdd ) {
				return response()->json( [
					'success' => true,
					'message' => 'successfull'
				] );
			}
		}
	}

	public function gatAllTests() {
		//$tests = Test::paginate(6);
		$tests = Test::all();
		if ( $tests ) {

			if ( Auth::check() && Cart::isEmpty() ) {
				$id  = Auth::user()->id;
				$old = DB::table( 'wishlist' )->where( 'user_id', $id )->get();
				if ( $old ) {
					foreach ( $old as $old_test ) {
						if ( ! is_null( $old_test->test_id ) ) {
							$test = Test::find( $old_test->test_id );
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
							}
						} elseif ( ! is_null( $old_test->health_sc_id ) ) {
							$health      = HealthScreen::find( $old_test->health_sc_id );
							$helth_tests = HelthScreenDetails::where( 'helth_sc_id', $old_test->health_sc_id )->get();
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
										  ->where( [
											  [ 'user_id', '=', $user_id ],
											  [ 'test_id', '=', $test->test_id ]
										  ] )
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
							}
						} else {

						}
					}
				}
			}
			$healths   = HealthScreen::all();
			$cart_list = Cart::getContent();
			$ids       = array();
			foreach ( $cart_list as $cart ) {
				if ( $cart->attributes->product_type == 'Health' ) {
					$id         = (int) $cart->id - 4550;
					$helth_test = HelthScreenDetails::where( 'helth_sc_id', $id )->get();
					foreach ( $helth_test as $test_id ) {
						array_push( $ids, $test_id->test_id );
					}
				}
			}

			return view( 'front.services', compact( 'tests' ) )
				->with( 'healths', $healths )
				->with( 'selected_id', $ids );
		} else {
			return view( 'front.404' );
		}
	}

	public function gatSearchTests( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'search' => 'required|max:300'
		] );
		if ( ! $validator->fails() ) {
			$data  = $request->all();
			$tests = Test::where( 'title', 'LIKE', '%' . $data['search'] . '%' )
			             ->orWhere( 'content', 'LIKE', '%' . $data['search'] . '%' )
			             ->paginate( 10 );
			if ( $tests ) {
				return view( 'front.search', compact( 'tests' ) );
			} else {
				return view( 'front.404' );
			}
		}
	}

	public function gatSearchTestsget() {
		return view( 'front.404' );
	}

	public function contact() {
		return view( 'front.contact' );
	}

	public function sendmessage( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'name'    => 'required|max:190',
			'email'   => 'required|max:190',
			'number'  => 'required|max:190',
			'subject' => 'required|max:190',
			'message' => 'required'
		] );
		if ( $validator->fails() ) {
			return redirect()
				->route( 'contact.front' )
				->withErrors( $validator )
				->withInput();
		} else {
			//
			$fromData = $request->all();
			$send     = Mail::to( \Config::get( 'mail.from.address' ) )
			                ->send( new ContactMessage( $fromData ) );

			return redirect()->route( 'thanks' )->with( 'message', 'You are successfully Send Message.' );
		}
	}

	public function terms() {
		return view( 'front.terms' );
	}

	public function privacyPolicy() {
		return view( 'front.privacyPolicy' );
	}

	public function sitemap() {
		return view( 'front.sitemap' );
	}

	public function about() {
		return view( 'front.about' );
	}

	public function laboratory() {
		return view( 'front.laboratory' );
	}

	public function Management() {
		return view( 'front.management' );
	}

	public function footprints() {
		return view( 'front.footprint' );
	}

	public function instruments() {
		return view( 'front.instruments' );
	}

	public function technologies() {
		return view( 'front.technologies' );
	}

	public function accreditation() {
		return view( 'front.accreditation' );
	}

	public function opportunities() {
		return view( 'front.opportunities' );
	}

	public function serviceProvider() {
		$servicesAreas = ServiceArea::all();

		return view( 'front.ServiceProvider' )
			->with( 'servicesAreas', $servicesAreas );
	}

	public function disorders() {
		return view( 'front.disorders' );
	}

	public function reportTrack() {
		return view( 'front.reportTrack' );
	}

	public function reportTrackSearch( Request $request ) {
		$data      = $request->all();
		$validator = Validator::make( $request->all(), [
			'barcode' => 'required|max:190'
		] );

		if ( $validator->fails() ) {
			return redirect()
				->route( 'reportTrack.front' )
				->withErrors( $validator )
				->withInput();
		} else {
			$barcode = Order::where( 'barcode', $data['barcode'] )->limit( 1 )->get();

			if ( $barcode->count() > 0 ) {
				foreach ( $barcode as $bar ) {
					$validator->errors()->add( 'barcode', 'Your report status is: ' . $bar->status );

					return redirect()
						->route( 'reportTrack.front' )
						->withErrors( $validator )
						->withInput();
				}
			} else {
				$validator->errors()->add( 'barcode', 'You have no order' );

				return redirect()
					->route( 'reportTrack.front' )
					->withErrors( $validator )
					->withInput();
			}
		}

	}

	public function bothlocation() {
		return view( 'front.bothlocation' );
	}

	public function gatTestById( $link ) {
		//$tests = Test::where(['id' => $id])->get();
		$tests = Test::where( [ 'link' => $link ] )->get();
		if ( $tests ) {
			return view( 'front.services-single', compact( 'tests' ) );
		} else {
			return view( 'front.404' );
		}
	}

	public function gatAllHealths() {
		$HealthScreens = HealthScreen::where( 'type', "health" )
		                             ->get();

//            ->paginate(9);
		return view( 'front.healths', compact( 'HealthScreens' ) );
	}

	public function gatAllOtherHealths() {
		$HealthScreens = HealthScreen::where( 'type', "others" )
		                             ->get();

//		                             ->paginate( 9 );

		return view( 'front.others', compact( 'HealthScreens' ) );
	}

	public function gatHealthById( $link ) {
		$HealthScreens = HealthScreen::where( [ 'link' => $link ] )->limit( 1 )->get();

		return view( 'front.healths-single', compact( 'HealthScreens' ) );
	}

	public function gatOtherById( $link ) {
		$HealthScreens = HealthScreen::where( [ 'link' => $link ] )->limit( 1 )->get();

		return view( 'front.others-single', compact( 'HealthScreens' ) );
	}

	public function gatCatByPost( Request $request ) {
		$data = $request->all();
		if ( isset( $data['catIds'] ) ) {
			if ( is_array( $data['catIds'] ) && ( count( $data['catIds'] ) > 0 ) ) {
				$tasts = DB::table( 'test_cats' )
				           ->whereIn( 'cat_id', $data['catIds'] )
				           ->join( 'tests', function ( $join ) {
					           $join->on( 'test_cats.test_id', '=', 'tests.id' );
				           } )
				           ->distinct()
				           ->select( [ 'test_id', 'title', 'short_name', 'price', 'sale_price', 'picture' ] )
				           ->orderBy( 'test_id', 'asc' )
					//->paginate(6);
					       ->get();
				//->paginate(10);
				$OutPutHtml = $this->ganaratCatTestsHtml( $tasts );
				//$OutPagePutHtml = $this->paginationHtml($tasts);
				//print_r($tasts);
				return response()->json( [
					'success'    => true,
					'datastatus' => true,
					'data'       => $OutPutHtml,
					'paginat'    => false
				] );
			}
		} else {
//            $tasts = Test::paginate(6);
			$tasts = Test::all();
			//$nexturlp = $tasts->nextPageUrl();
			$OutPutHtml = $this->ganaratTestsHtml( $tasts );

			//$OutPagePutHtml = $this->paginationHtml($tasts);
			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'data'       => $OutPutHtml,
				'paginat'    => true
			] );
		}
	}

	private function ganaratCatTestsHtml( $tasts ) {
		if ( $tasts ) {
			$cart_list = Cart::getContent();
			$ids       = array();
			foreach ( $cart_list as $cart ) {
				if ( $cart->attributes->product_type == 'Health' ) {
					$id         = (int) $cart->id - 4550;
					$helth_test = HelthScreenDetails::where( 'helth_sc_id', $id )->get();
					foreach ( $helth_test as $test_id ) {
						array_push( $ids, $test_id->test_id );
					}
				}
			}
			$OutPutHtml = "";
			foreach ( $tasts as $test ) {
				$OutPutHtml .= "<div id='$test->test_id'>";
				$OutPutHtml .= "<div class='single-service'>";
				$OutPutHtml .= "<div class='fature-image'>";
				if ( $testImg = json_decode( $test->picture ) ) {
					$OutPutHtml .= "<img src='" . adminUrl( $testImg->thumb ) . "' alt='" . $test->short_name . "' />";
				}
				$OutPutHtml .= "<div class='hover' data-title='". $test->title."' data-cart-add='" . route( 'add.to.cart', array( $test->test_id ) ) . "' data-cart-remove='" . route( 'remove.to.cart', array( $test->test_id ) ) . "'>";
				if ( ! in_array( (int) $test->test_id, $ids ) ) {
					if ( Cart::get( $test->test_id ) === null ) {
						$OutPutHtml .= "<a href='" . route( 'add.to.cart', array( $test->test_id ) ) . "' class='add-cart'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart'></a>";
					} else {
						$OutPutHtml .= "<a href='" . route( 'remove.to.cart', array( $test->test_id ) ) . "' class='remove-cart'><span class='remove-from-cart-text'>Remove from Cart</span><span class='glyphicon glyphicon-check'></span></a>";
					}
				} else {
					$OutPutHtml .= "<a class='package-test'><span class='remove-from-cart-text'>Package test</span><span class='glyphicon glyphicon-check'></span></a>";
				}

				$OutPutHtml .= "</div>";
				$OutPutHtml .= "<div class='service-price'>";
				if ( $test->sale_price != "" ) {
					$OutPutHtml .= "<span class='old'>&#x9f3; " . tk( $test->sale_price ) . "</span>";
				}
				$OutPutHtml .= "<span class='new'>&#x9f3; " . tk( $test->price ) . "</span>";
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "<h5><a href='" . route( 'test.single.front', array( $test->test_id ) ) . "'>" . $test->short_name . "</a></h5>";
				$OutPutHtml .= "<p><a href='" . route( 'test.single.front', array( $test->test_id ) ) . "'>" . $test->title . "</a></p>";
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "</div>";

			}

			return $OutPutHtml;
		}
	}

	private function ganaratTestsHtml( $tasts ) {
		if ( $tasts ) {
			$cart_list = Cart::getContent();
			$ids       = array();
			foreach ( $cart_list as $cart ) {
				if ( $cart->attributes->product_type == 'Health' ) {
					$id         = (int) $cart->id - 4550;
					$helth_test = HelthScreenDetails::where( 'helth_sc_id', $id )->get();
					foreach ( $helth_test as $test_id ) {
						array_push( $ids, $test_id->test_id );
					}
				}
			}
			$OutPutHtml = "";
			foreach ( $tasts as $test ) {
				$OutPutHtml .= "<div class='single-service'>";
				$OutPutHtml .= "<div class='fature-image'>";
				if ( $testImg = json_decode( $test->picture ) ) {
					$OutPutHtml .= "<img src='" . adminUrl( $testImg->thumb ) . "' alt='" . $test->short_name . "' />";
				}
				$OutPutHtml .= "<div class='hover' data-title='". $test->title."' data-cart-add='" . route( 'add.to.cart', array( $test->id ) ) . "' data-cart-remove='" . route( 'remove.to.cart', array( $test->id ) ) . "'>";
				if ( ! in_array( (int) $test->id, $ids ) ) {
					if ( Cart::get( $test->id ) === null ) {
						$OutPutHtml .= "<a href='" . route( 'add.to.cart', array( $test->id ) ) . "' class='add-cart'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart' style='font-size: 17px;color:white;'></a>";
					} else {
						$OutPutHtml .= "<a href='" . route( 'remove.to.cart', array( $test->id ) ) . "' class='remove-cart'><span class='remove-from-cart-text'>Remove from Cart</span><span class='glyphicon glyphicon-check' style='font-size: 17px;color:white;'></span></a>";
					}
				} else {
					$OutPutHtml .= "<a class='package-test'><span class='remove-from-cart-text'>Package test</span><span class='glyphicon glyphicon-check'></span></a>";
				}
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "<div class='service-price'>";
				if ( $test->sale_price != "" ) {
					$OutPutHtml .= "<span class='old'>&#x9f3; " . tk( $test->sale_price ) . "</span>";
				}
				$OutPutHtml .= "<span class='new'>&#x9f3; " . tk( $test->price ) . "</span>";
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "</div>";
				$OutPutHtml .= "<h5><a href='" . route( 'test.single.front', array( $test->id ) ) . "'>" . $test->short_name . "</a></h5>";
				$OutPutHtml .= "<p><a href='" . route( 'test.single.front', array( $test->id ) ) . "'>" . $test->title . "</a></p>";
				$OutPutHtml .= "</div>";
			}

			return $OutPutHtml;
		}
	}

	private function paginationHtml( $rasult ) {
		$outPutHttml = "";

		return $outPutHttml . $rasult->links();
	}

	public function gatCatByPost2( Request $request ) {
		$data = $request->all();
		if ( isset( $data['id'] ) && $data['id'] >= 0 ) {
			$tasts = DB::table( 'test_cats' )
			           ->whereIn( 'cat_id', array( $data['id'] ) )
			           ->join( 'tests', function ( $join ) {
				           $join->on( 'test_cats.test_id', '=', 'tests.id' );
			           } )
			           ->distinct()
			           ->orderBy( 'test_id', 'asc' )
			           ->get();
//            $cart_list = Cart::getContent();
//            $ids = array();
//            foreach ($cart_list as $cart) {
//                if ($cart->attributes->product_type == 'Health') {
//                    $id = (int)$cart->id - 4550;
//                    $helth_test = HelthScreenDetails::where('helth_sc_id', $id)->get();
//                    foreach ($helth_test as $test_id) {
//                        array_push($ids, $test_id->test_id);
//                    }
//                }
//            }
//            foreach ($tasts as $test) {
//                if (Cart::get($test->id) === null && !in_array((int)$test->id, $ids)) {
//                    $data = array();
//                    $images = json_decode($test->picture);
//                    $data['id'] = $test->id;
//                    $data['name'] = $test->title;
//                    $data['price'] = $test->sale_price != "" ? $test->sale_price : $test->price;
//                    $data['quantity'] = 1;
//                    $data['attributes'] = array(
//                        'short_name' => $test->short_name,
//                        'product_type' => 'Test',
//                        'imgPath' => adminUrl($images->thumb)
//                    );
//
//                    Cart::add($data);
//                }
//            }

//            if (Auth::check() && !Cart::isEmpty()) {
//                $user_id = Auth::user()->id;
//                if (!Cart::isEmpty() && $cartCollection = Cart::getContent()) {
//                    foreach ($cartCollection as $cart) {
//                        $cart_id = $cart->id;
//                        $old = DB::table('wishlist')->where([['user_id', '=', $user_id], ['test_id', '=', $cart_id]])->first();
//                        if (!$old) {
//                            DB::table('wishlist')->insert([
//                                'user_id' => $user_id,
//                                'test_id' => $cart_id,
//                                'created_at' => date('Y-m-d'),
//                                'updated_at' => date('Y-m-d')
//                            ]);
//                        }
//                    }
//                }
//            }

			$OutPutHtml = $this->ganaratCatTestsHtml2( $tasts );
			$cartTest   = $this->getCartTestsHtml2();

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'cart'       => $cartTest,
				'data'       => $OutPutHtml
			] );

		} else {
			$tasts      = Test::all();
			$OutPutHtml = $this->ganaratCatTestsHtml2( $tasts );

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'data'       => $OutPutHtml
			] );
		}
	}

	public function gatCatByPost3( Request $request ) {
		$data = $request->all();
		if ( isset( $data['id'] ) && $data['id'] >= 0 ) {
			$tasts = DB::table( 'test_cats' )
			           ->whereIn( 'cat_id', array( $data['id'] ) )
			           ->join( 'tests', function ( $join ) {
				           $join->on( 'test_cats.test_id', '=', 'tests.id' );
			           } )
			           ->distinct()
			           ->orderBy( 'test_id', 'asc' )
			           ->get();

			$OutPutHtml = $this->ganaratCatTestsHtml2( $tasts );
			$cartTest   = $this->getCartTestsHtml2();

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'cart'       => $cartTest,
				'data'       => $OutPutHtml
			] );

		} else {
			$tasts      = Test::all();
			$OutPutHtml = $this->ganaratCatTestsHtml2( $tasts );

			return response()->json( [
				'success'    => true,
				'datastatus' => true,
				'data'       => $OutPutHtml
			] );
		}
	}

	private function ganaratCatTestsHtml2( $tasts ) {
		if ( $tasts ) {
			$cart_list = Cart::getContent();
			$ids       = array();
			foreach ( $cart_list as $cart ) {
				if ( $cart->attributes->product_type == 'Health' ) {
					$id         = (int) $cart->id - 4550;
					$helth_test = HelthScreenDetails::where( 'helth_sc_id', $id )->get();
					foreach ( $helth_test as $test_id ) {
						array_push( $ids, $test_id->test_id );
					}
				}
			}

			$OutPutHtml = "";
			foreach ( $tasts as $i => $test ) {
				$OutPutHtml .= "<tr id='" . $test->id . 'test_body' . "' class='testmenu-table-row'><td class='test_sl'>" . ( $test->sl_no ) . "</td><td class='test_name'>" . $test->title . "</td><td class='test_payment'>".tk($test->price)."</td><td class='test_adcart'>";
				$OutPutHtml .= "<div class='hover2' data-title='". $test->title."' data-cart-add='" . route( 'add.to.cart2', array( $test->id ) ) . "' data-cart-remove='" . route( 'remove.to.cart2', array( $test->id ) ) . "' style='text-align: center;'>";

				if ( ! in_array( (int) $test->id, $ids ) ) {
					if ( Cart::get( $test->id ) == null ) {
						$OutPutHtml .= "<a href='" . route( 'add.to.cart2', array( $test->id ) ) . "' class='add-cart2'><span class='glyphicon glyphicon-shopping-cart'></span></a>";
					} else {
						$OutPutHtml .= "<a href='" . route( 'remove.to.cart2', array( $test->id ) ) . "' class='remove-cart2'><span class='glyphicon glyphicon-check'></span></a>";
					}
				} else {
					$OutPutHtml .= "<a class='remove-cart2'><span class='glyphicon glyphicon-check'></span></a>";
				}
				$OutPutHtml .= "</div></td></tr>";
			}
		}

		return $OutPutHtml;
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
				$outHtml .= "<ul class='cart_price'>";
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

				$outHtml .= "<strong class='cart-total'>Total - &#x9f3; " . $temp2 . "</strong>";
				$outHtml .= "</li>";
			}

			return $outHtml;
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
}
