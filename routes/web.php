<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);
Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::post('checkoutTo', [
    'as' => 'checkout.to.ssl',
    'uses' => 'Admin\PaymentProcess@processToCheckout'
]);

Route::get('/home', [
    'as' => 'front.home',
    'uses' => 'HomeController@index'
]);
Route::get('blog', [
    'as' => 'home.blog',
    'uses' => 'HomeController@blog'
]);
Route::get('back', [
    'as' => 'home.back',
    'uses' => 'HomeController@back'
]);

/*
 * **********************************************
 *      Route Start For Front-end Relatiead
 * ********************************************
 */

Route::get('thanks', [
    'as' => 'thanks',
    'uses' => 'FrontPageController@thanks'
]);

Route::post('search', [
    'as' => 'search.front',
    'uses' => 'FrontPageController@gatSearchTests'
]);

Route::get('search', [
    'as' => 'search.front',
    'uses' => 'FrontPageController@gatSearchTestsget'
]);

Route::get('offers', [
    'as' => 'offers.front',
    'uses' => 'FrontPageController@Offers'
]);

Route::get('offer/{link}', [
    'as' => 'offer.front',
    'uses' => 'FrontPageController@OfferSingle'
]);

Route::get('offers', [
    'as' => 'offers.front',
    'uses' => 'FrontPageController@Offers'
]);

Route::get('booktest', [
    'as' => 'booktest.front',
    'uses' => 'Admin\BookTestController@bookTest'
]);

Route::post('booktest', [
    'as' => 'booktest.front',
    'uses' => 'Admin\BookTestController@createBookTest'
]);

Route::get('test', [
    'as' => 'test.all.front',
    'uses' => 'FrontPageController@gatAllTests'
]);


Route::get('test/{link}', [
    'as' => 'test.single.front',
    'uses' => 'FrontPageController@gatTestById'
]);

Route::get('health', [
    'as' => 'health.all.front',
    'uses' => 'FrontPageController@gatAllHealths'
]);
Route::get('health/{link}', [
    'as' => 'health.single.front',
    'uses' => 'FrontPageController@gatHealthById'
]);

Route::get('others', [
    'as' => 'others.all.front',
    'uses' => 'FrontPageController@gatAllOtherHealths'
]);

Route::get('others/{link}', [
    'as' => 'others.single.front',
    'uses' => 'FrontPageController@gatOtherById'
]);


Route::get('media', [
    'as' => 'media.front',
    'uses' => 'FrontPageController@media'
]);

Route::get('contact', [
    'as' => 'contact.front',
    'uses' => 'FrontPageController@contact'
]);

Route::post('sendmessage', [
    'as' => 'sendmessage.front',
    'uses' => 'FrontPageController@sendmessage'
]);

Route::get('terms', [
    'as' => 'terms.front',
    'uses' => 'FrontPageController@terms'
]);

Route::get('privacy_policy', [
    'as' => 'privacyPolicy.front',
    'uses' => 'FrontPageController@privacyPolicy'
]);

Route::get('Sitemap', [
    'as' => 'sitemap.front',
    'uses' => 'FrontPageController@sitemap'
]);


Route::get('publications', [
    'as' => 'publications.front',
    'uses' => 'FrontPageController@publications'
]);

Route::get('publication/{link}', [
    'as' => 'publication.front',
    'uses' => 'FrontPageController@publicationSingle'
]);

Route::get('publication-sin/{link}', [
	'as' => 'publication-sin.front',
	'uses' => 'FrontPageController@publicationSin'
]);

Route::get('about', [
    'as' => 'about.front',
    'uses' => 'FrontPageController@about'
]);

Route::get('management', [
    'as' => 'management.front',
    'uses' => 'FrontPageController@management'
]);

Route::get('footprint', [
    'as' => 'footprint.front',
    'uses' => 'FrontPageController@footprints'
]);

Route::get('opportunitie', [
    'as' => 'opportunitie.front',
    'uses' => 'FrontPageController@opportunities'
]);

Route::get('instruments', [
    'as' => 'instruments.front',
    'uses' => 'FrontPageController@instruments'
]);

Route::get('technologies', [
    'as' => 'technologies.front',
    'uses' => 'FrontPageController@technologies'
]);

Route::get('accreditation', [
    'as' => 'accreditation.front',
    'uses' => 'FrontPageController@accreditation'
]);

Route::get('laboratory', [
    'as' => 'laboratory.front',
    'uses' => 'FrontPageController@laboratory'
]);


/*
 * ************************************
 *  Service and drodown start
 * ************************************
 */

Route::get('disorders', [
    'as' => 'disorders.front',
    'uses' => 'FrontPageController@disorders'
]);
Route::get('report_Track', [
    'as' => 'reportTrack.front',
    'uses' => 'FrontPageController@reportTrack'
]);
Route::post('reportTrack', [
    'as' => 'reportTrackSearch.front',
    'uses' => 'FrontPageController@reportTrackSearch'
]);
Route::get('bothlocation', [
    'as' => 'bothlocation.front',
    'uses' => 'FrontPageController@bothlocation'
]);

Route::get('service_provider', [
    'as' => 'ServiceProvider.front',
    'uses' => 'FrontPageController@serviceProvider'
]);

Route::get('career', [
    'as' => 'career',
    'uses' => 'FrontPageController@career'
]);

Route::get('job/{id}', [
    'as' => 'single.job',
    'uses' => 'FrontPageController@careerSingle'
]);

Route::get('customer', [
    'as' => 'Customer',
    'uses' => 'FrontPageController@customerCorpo'
]);

Route::get('corporate', [
    'as' => 'Corporate',
    'uses' => 'FrontPageController@customerCorpo'
]);

Route::Post('customerCorpoCreate', [
    'as' => 'customerCorpoCreate',
    'uses' => 'FrontPageController@customerCorpoCreate'
]);

Route::get('healthcare_partner', [
    'as' => 'HealthcarePartner',
    'uses' => 'FrontPageController@healthcarePartner'
]);

Route::get('healthcare', [
    'as' => 'Healthcare',
    'uses' => 'FrontPageController@Healthcare'
]);

Route::Post('healthcareCreate', [
    'as' => 'healthcareCreate',
    'uses' => 'FrontPageController@healthcareCreate'
]);

Route::Post('checkout', [
    'as' => 'Checkout',
    'uses' => 'CartController@checkout'
]);
Route::Get('checkout', [
    'as' => 'Checkout',
    'uses' => 'CartController@checkout'
]);
Route::Post('recheckout', [
    'as' => 'recheckout',
    'uses' => 'CartController@recheckout'
]);
Route::Get('recheckout', [
    'as' => 'recheckout',
    'uses' => 'CartController@recheckout'
]);


Route::group(array('prefix' => 'ajax'), function () {

    Route::post('requestCall', [
        'as' => 'requestCall',
        'uses' => 'FrontPageController@requestCall'
    ]);

    Route::post('catbypost', [
        'as' => 'cat.tests',
        'uses' => 'FrontPageController@gatCatByPost'
    ]);
    Route::post('catbypost2', [
        'as' => 'cat.tests2',
        'uses' => 'FrontPageController@gatCatByPost2'
    ]);
    Route::post('catbypost3', [
        'as' => 'cat.tests3',
        'uses' => 'FrontPageController@gatCatByPost3'
    ]);
    Route::get('addToCart/{id}', [
        'as' => 'add.to.cart',
        'uses' => 'CartController@addTestToCart'
    ]);
    Route::get('addToCart2/{id}', [
        'as' => 'add.to.cart2',
        'uses' => 'CartController@addTestToCart2'
    ]);

    Route::get('addToCart4/{id}', [
        'as' => 'add.to.cart4',
        'uses' => 'CartController@addTestToCart4'
    ]);
    Route::post('addCoupon', [
        'as' => 'add.to.coupon',
        'uses' => 'CartController@addCoupon'
    ]);

    Route::get('addToCartHomeService', [
        'as' => 'add.to.cart.home.service',
        'uses' => 'CartController@addConditionHomeService'
    ]);


    Route::get('removeToCart/{id}', [
        'as' => 'remove.to.cart',
        'uses' => 'CartController@removeTestToCart'
    ]);
    Route::get('removeToCartHomeService', [
        'as' => 'remove.to.cart.home.service',
        'uses' => 'CartController@removeConditionHomeService'
    ]);
    Route::get('removeToCart2/{id}', [
        'as' => 'remove.to.cart2',
        'uses' => 'CartController@removeTestToCart2'
    ]);
    Route::get('removeToCart4/{id}', [
        'as' => 'remove.to.cart4',
        'uses' => 'CartController@removeTestToCart4'
    ]);

    Route::get('addHealthToCart/{id}', [
        'as' => 'add.healthto.cart',
        'uses' => 'CartController@addHealthToCart'
    ]);

    Route::get('clearCart', [
        'as' => 'clear.cart',
        'uses' => 'CartController@clearAllCart'
    ]);
    Route::get('clearCart2', [
        'as' => 'clear.cart2',
        'uses' => 'CartController@clearAllCart2'
    ]);
});

/*
 * **********************************************
 *      Route End For Front-end Relatiead
 * ********************************************
 */


/*
 * **********************************************
 *      Route Start For Payment Relatiead
 * ********************************************
 */
Route::group(array('prefix' => 'payment'), function () {
    Route::post('sslvalidation', [
        'as' => 'pay.val.front',
        'uses' => 'Admin\PaymentProcess@sslValidation'
    ]);
    Route::post('sslfaild', [
        'as' => 'pay.faild.front',
        'uses' => 'Admin\PaymentProcess@sslFaild'
    ]);
    Route::post('sslcancel', [
        'as' => 'pay.cancel.front',
        'uses' => 'Admin\PaymentProcess@sslCancel'
    ]);

    Route::post('condetionvalidation', [
        'as' => 'preOdrers.val.front',
        'uses' => 'Admin\PaymentProcess@preOdrers'
    ]);

    Route::post('editCondetionvalidation', [
        'as' => 'editOdrerscod.val.front',
        'uses' => 'Admin\PaymentProcess@editOdrerCod'
    ]);
    Route::post('adminEditCondetionvalidation', [
        'as' => 'editOdrerAdmin.val.front',
        'uses' => 'Admin\PaymentProcess@editOdrerAdmin'
    ]);
    Route::post('editSslvalidation', [
        'as' => 'editOdrersssl.val.front',
        'uses' => 'Admin\PaymentProcess@editOdrerSsl'
    ]);

});
/*
 * **********************************************
 *      Route End For Payment Relatiead
 * ********************************************
 */


/*
 * **********************************************
 *      Route Start For Android API Relatiead
 * ********************************************
 */

Route::get('DataApi', [
    'as' => 'android.request',
    'uses' => 'Admin\AndroidController@processRequest'
]);

Route::post('DataApi', [
    'as' => 'android.request',
    'uses' => 'Admin\AndroidController@processRequest'
]);


/*
 * **********************************************
 *      Route User Profile Relatiead
 * ********************************************
 */
Route::group(array('prefix' => 'user'), function () {

    Route::get('orders', [
        'as' => 'user.orders',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\OrderController@gatByUserAll'
    ]);


    Route::get('orderReport/{id}', [
        'as' => 'user.order.report',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\OrderController@gatByUserOrderDetiels'
    ]);
    Route::get('orderEdit/{id}', [
        'as' => 'user.order.edit',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\OrderController@gatByUserOrderEdit'
    ]);

    Route::get('profile', [
        'as' => 'user.profile',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\UserController@userProfile'
    ]);

    Route::get('editprofile', [
        'as' => 'edit.profile',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\UserController@editProfile'
    ]);

    Route::post('updateprofile', [
        'as' => 'update.profile',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\UserController@updateProfile'
    ]);

    Route::get('changepassword', [
        'as' => 'change.password',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\UserController@changePassword'
    ]);

    Route::post('updatepassword', [
        'as' => 'update.password',
        'middleware' => 'roles',
        'roles' => ['User', 'Admin'],
        'uses' => 'Admin\UserController@updatePassword'
    ]);
});

/*
 * **********************************************
 *      Route Admin Relatiead
 * ********************************************
 */
Route::get('ThyroAdmin', [
    'as' => 'thyroAdmin',
    'uses' => 'Auth\AdminLoginController@adminLogin'
]);
Route::group(array('prefix' => 'admin'), function () {

    Route::get('/', [
        'as' => 'adminHome',
        'middleware' => 'roles',
        'roles' => ['Admin'],
        'uses' => 'Admin\UserController@adminHome'
    ]);


    Route::group(array('prefix' => 'ajax'), function () {

        Route::post('uploadUT', [
            'as' => 'upload.user.thumb',
            'uses' => 'UploadController@uploadUserThumb'
        ]);

        Route::post('uploadTT', [
            'as' => 'upload.test.thumb',
            'uses' => 'UploadController@uploadTestThumb'
        ]);

        Route::post('uploadPT', [
            'as' => 'upload.partner.thumb',
            'uses' => 'UploadController@uploadPartnerThumb'
        ]);

        Route::post('uploadCST', [
            'as' => 'upload.clientsay.thumb',
            'uses' => 'UploadController@uploadClientSayThumb'
        ]);

        Route::post('uploadHST', [
            'as' => 'upload.health.thumb',
            'uses' => 'UploadController@uploadhealthThumb'
        ]);

        Route::post('uploadBPI', [
            'as' => 'upload.bookpage.img',
            'uses' => 'UploadController@uploadBookImage'
        ]);

        Route::post('uploadBT', [
            'as' => 'upload.book.thumb',
            'uses' => 'UploadController@uploadBookThumb'
        ]);


        Route::post('uploadReport', [
            'as' => 'upload.test.report',
            'uses' => 'UploadController@uploadTestReport'
        ]);


        Route::post('getOderDetiels', [
            'as' => 'get.Oder.Detiels',
            'uses' => 'Admin\ReportController@getOderDetiels'
        ]);

        Route::post('uploadSLT', [
            'as' => 'upload.slider.thumb',
            'uses' => 'UploadController@uploadSliderThumb'
        ]);

        Route::post('uploadOFT', [
            'as' => 'upload.offer.thumb',
            'uses' => 'UploadController@uploadOfferThumb'
        ]);

    });

    Route::group(array('prefix' => 'Orders'), function () {
        Route::get('booktestall', [
            'as' => 'booktest.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\BookTestController@bookTestall'
        ]);

        Route::get('tempOrders', [
            'as' => 'temp.orders',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@tempOrders'
        ]);

        Route::get('tempOrderCancel/{id}', [
            'as' => 'temp.order.cancel',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@tempOrderCancel'
        ]);

        Route::get('requestcall', [
            'as' => 'requestcall.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\BookTestController@requestCall'
        ]);

        Route::get('booktestsingle/{id}', [
            'as' => 'booktest.single',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\BookTestController@bookTestSingle'
        ]);
    });


    Route::group(array('prefix' => 'Orders'), function () {
        Route::get('Orders', [
            'as' => 'orders',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatAll'
        ]);

        Route::get('Order/{id}', [
            'as' => 'order',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatSingleOrder'
        ]);

        Route::get('OrderPendings', [
            'as' => 'order.panding',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatPendingAll'
        ]);

        Route::get('OrderPendingUp/{id}', [
            'as' => 'order.panding.up',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@OrderPendingUp'
        ]);

        Route::post('OrderPendingUpdate', [
            'as' => 'order.panding.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@OrderPendingUpdate'
        ]);
        Route::post('updateStatus', [
            'as' => 'order.updateStatus',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@updateStatus'
        ]);

        Route::get('OrderPendingCencel/{id}', [
            'as' => 'order.panding.cencel',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@OrderPendingCencel'
        ]);

        Route::get('OrderProcessing', [
            'as' => 'order.processing',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatProcessingAll'
        ]);

        Route::get('OrderProcessUp/{id}', [
            'as' => 'order.processing.up',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@orderProcessingUp'
        ]);
        Route::get('OrderProcessEdit/{id}', [
            'as' => 'order.processing.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@OrderProcessEdit'
        ]);

        Route::get('OrderSucess', [
            'as' => 'order.sucess',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatSucessAll'
        ]);

        Route::get('OrderCancel', [
            'as' => 'order.cancel',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OrderController@gatCancelAll'
        ]);
    });

    Route::group(array('prefix' => 'report'), function () {
        Route::get('reportAll', [
            'as' => 'report.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ReportController@gatAll'
        ]);
        Route::get('report/{id}', [
            'as' => 'report.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ReportController@edit'
        ]);

        Route::get('reportAdd', [
            'as' => 'report.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ReportController@add'
        ]);

        Route::post('reportCreate', [
            'as' => 'report.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ReportController@create'
        ]);


        Route::post('reportUpdate', [
            'as' => 'report.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ReportController@update'
        ]);
    });

    Route::group(array('prefix' => 'others'), function () {

        Route::get('deliverycharge', [
            'as' => 'deliveryCharge',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'DeliveryCharge@deliveryCharge'
        ]);

        Route::post('updatedeliverycharge', [
            'as' => 'updateDeliveryCharge',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'DeliveryCharge@updateDeliveryCharge'
        ]);

        Route::get('coupon', [
            'as' => 'coupon.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'CouponController@index'
        ]);
        Route::post('addCoupon', [
            'as' => 'coupon.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'CouponController@addCoupon'
        ]);

        Route::get('removeCoupon/{id}', [
            'as' => 'coupon.remove',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'CouponController@removeCoupon'
        ]);
        Route::get('bank', [
            'as' => 'bank.discount.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'BankdiscountController@index'
        ]);
        Route::get('activeStatus/{id}', [
            'as' => 'bank.discount.active',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'BankdiscountController@activeStatus'
        ]);
        Route::get('deactiveStatus/{id}', [
            'as' => 'bank.discount.deactive',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'BankdiscountController@deactiveStatus'
        ]);
        Route::post('updateDiscount', [
            'as' => 'bank.discount.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'BankdiscountController@update'
        ]);
    });

    Route::group(array('prefix' => 'RegistrationInfo'), function () {

        Route::get('Customer', [
            'as' => 'customer',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CustomerCorpoController@customer'
        ]);

        Route::get('Corporate', [
            'as' => 'corporate',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CustomerCorpoController@corporate'
        ]);

        Route::get('doctor', [
            'as' => 'doctor',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthCareController@doctor'
        ]);

        Route::get('healthcare', [
            'as' => 'healthcare',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthCareController@healthcare'
        ]);
    });


    /*
    * **********************************************
    *      Route For Career Model
    * ********************************************
    */
    Route::group(array('prefix' => 'publication'), function () {
        Route::get('publicationAll', [
            'as' => 'publication.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@gatAll'
        ]);

        Route::get('publicationAdd', [
            'as' => 'publication.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@add'
        ]);

        Route::post('publicationCreate', [
            'as' => 'publication.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@create'
        ]);

        Route::get('publicationEdit/{id}', [
            'as' => 'publication.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@edit'
        ]);

        Route::post('publicationUpdate', [
            'as' => 'publication.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@update'
        ]);

        Route::get('publicationDelete/{id}', [
            'as' => 'publication.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PublicationController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Career Model
    * ********************************************
    */
    Route::group(array('prefix' => 'career'), function () {
        Route::get('careerAll', [
            'as' => 'career.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@gatAll'
        ]);

        Route::get('careerAdd', [
            'as' => 'career.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@add'
        ]);

        Route::post('careerCreate', [
            'as' => 'career.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@create'
        ]);

        Route::get('careerEdit/{id}', [
            'as' => 'career.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@edit'
        ]);

        Route::post('careerUpdate', [
            'as' => 'career.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@update'
        ]);

        Route::get('careerDelete/{id}', [
            'as' => 'career.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CareerController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Client Says Model
    * ********************************************
    */
    Route::group(array('prefix' => 'clientsays'), function () {
        Route::get('clientsayAll', [
            'as' => 'clientsay.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@gatAll'
        ]);

        Route::get('clientsayAdd', [
            'as' => 'clientsay.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@add'
        ]);

        Route::post('clientsayCreate', [
            'as' => 'clientsay.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@create'
        ]);

        Route::get('clientsayEdit/{id}', [
            'as' => 'clientsay.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@edit'
        ]);

        Route::post('clientsayUpdate', [
            'as' => 'clientsay.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@update'
        ]);

        Route::get('clientsayDelete/{id}', [
            'as' => 'clientsay.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ClientSaysController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Slider Model
    * ********************************************
    */
    Route::group(array('prefix' => 'offer'), function () {
        Route::get('offerAll', [
            'as' => 'offer.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@gatAll'
        ]);

        Route::get('offerAdd', [
            'as' => 'offer.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@add'
        ]);

        Route::post('offerCreate', [
            'as' => 'offer.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@create'
        ]);

        Route::get('offerEdit/{id}', [
            'as' => 'offer.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@edit'
        ]);

        Route::post('offerUpdate', [
            'as' => 'offer.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@update'
        ]);

        Route::get('offerDelete/{id}', [
            'as' => 'offer.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\OfferController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Slider Model
    * ********************************************
    */
    Route::group(array('prefix' => 'slider'), function () {
        Route::get('sliderAll', [
            'as' => 'slider.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@gatAll'
        ]);

        Route::get('sliderAdd', [
            'as' => 'slider.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@add'
        ]);

        Route::post('sliderCreate', [
            'as' => 'slider.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@create'
        ]);

        Route::get('sliderEdit/{id}', [
            'as' => 'slider.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@edit'
        ]);

        Route::post('sliderUpdate', [
            'as' => 'slider.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@update'
        ]);

        Route::get('sliderDelete/{id}', [
            'as' => 'slider.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\SliderController@delete'
        ]);
    });

    /*
    * **********************************************
    *      Route For Media Model
    * ********************************************
    */
    Route::group(array('prefix' => 'media'), function () {
        Route::get('mediaAll', [
            'as' => 'media.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@gatAll'
        ]);

        Route::get('mediaAdd', [
            'as' => 'media.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@add'
        ]);

        Route::post('mediaCreate', [
            'as' => 'media.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@create'
        ]);

        Route::get('mediaEdit/{id}', [
            'as' => 'media.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@edit'
        ]);

        Route::post('mediaUpdate', [
            'as' => 'media.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@update'
        ]);

        Route::get('mediaDelete/{id}', [
            'as' => 'media.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\MediaController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Partner Model
    * ********************************************
    */
    Route::group(array('prefix' => 'partner'), function () {
        Route::get('partnerAll', [
            'as' => 'partner.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@gatAll'
        ]);

        Route::get('partnerAdd', [
            'as' => 'partner.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@add'
        ]);

        Route::post('partnerCreate', [
            'as' => 'partner.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@create'
        ]);

        Route::get('partnerEdit/{id}', [
            'as' => 'partner.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@edit'
        ]);

        Route::post('partnerUpdate', [
            'as' => 'partner.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@update'
        ]);

        Route::get('partnerDelete/{id}', [
            'as' => 'partner.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\PartnerController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Partner Model
    * ********************************************
    */
    Route::group(array('prefix' => 'health'), function () {
        Route::get('healthAll', [
            'as' => 'health.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@gatAll'
        ]);

        Route::get('healthAdd', [
            'as' => 'health.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@add'
        ]);

        Route::post('healthCreate', [
            'as' => 'health.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@create'
        ]);

        Route::get('healthEdit/{id}', [
            'as' => 'health.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@edit'
        ]);

        Route::post('healthUpdate', [
            'as' => 'health.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@update'
        ]);

        Route::get('healthDelete/{id}', [
            'as' => 'health.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\HealthScreenController@delete'
        ]);
    });


    /*
    * **********************************************
    *      Route For Service Model
    * ********************************************
    */
    Route::group(array('prefix' => 'service'), function () {
        /*
        * **********************************************
        *      Route For Service Area Model
        * ********************************************
        */
        Route::get('ServAreaAll', [
            'as' => 'serviceArea.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceAreaController@gatAll'
        ]);

        Route::post('ServAreaCreate', [
            'as' => 'serviceArea.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceAreaController@create'
        ]);

        Route::get('ServAreaEdit/{id}', [
            'as' => 'serviceArea.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceAreaController@edit'
        ]);

        Route::post('ServAreaUpdate', [
            'as' => 'serviceArea.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceAreaController@update'
        ]);

        Route::get('ServAreaDelete/{id}', [
            'as' => 'serviceArea.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceAreaController@delete'
        ]);

        /*
        * **********************************************
        *      Route For Service Client Model
        * ********************************************
        */
        Route::get('ServClientAll', [
            'as' => 'serviceClient.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceClientController@gatAll'
        ]);

        Route::post('ServClientCreate', [
            'as' => 'serviceClient.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceClientController@create'
        ]);

        Route::get('ServClientEdit/{id}', [
            'as' => 'serviceClient.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceClientController@edit'
        ]);

        Route::post('ServClientUpdate', [
            'as' => 'serviceClient.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceClientController@update'
        ]);

        Route::get('ServClientDelete/{id}', [
            'as' => 'serviceClient.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\ServiceClientController@delete'
        ]);
    });

    /*
    * **********************************************
    *      Route For Test Model
    * ********************************************
    */
    Route::group(array('prefix' => 'test'), function () {

        Route::get('testAll', [
            'as' => 'test.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@gatAll'
        ]);

        Route::get('testAdd', [
            'as' => 'test.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@add'
        ]);

        Route::post('testCreate', [
            'as' => 'test.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@create'
        ]);

        Route::get('testEdit/{id}', [
            'as' => 'test.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@edit'
        ]);

        Route::post('testUpdate', [
            'as' => 'test.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@update'
        ]);

        Route::get('testDelete/{id}', [
            'as' => 'test.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\TestController@delete'
        ]);

        /*
        * **********************************************
        *      Route For Category Model
        * ********************************************
        */

        Route::get('cats', [
            'as' => 'cats.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CategoryController@gatAll'
        ]);

        Route::post('catsCreate', [
            'as' => 'cats.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CategoryController@create'
        ]);

        Route::get('catsEdit/{id}', [
            'as' => 'cats.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CategoryController@edit'
        ]);

        Route::post('catsUpdate', [
            'as' => 'cats.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CategoryController@update'
        ]);

        Route::get('catsDelete/{id}', [
            'as' => 'cats.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\CategoryController@delete'
        ]);

    });


    /*
     * **********************************************
     *      Route For User Model
     * ********************************************
     */
    Route::group(array('prefix' => 'user'), function () {
        Route::get('userAll', [
            'as' => 'user.all',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@gatAll'
        ]);

        Route::get('userAdd', [
            'as' => 'user.add',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@add'
        ]);

        Route::post('userCreate', [
            'as' => 'user.create',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@create'
        ]);

        Route::get('userEdit/{id}', [
            'as' => 'user.edit',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@edit'
        ]);

        Route::post('userUpdate', [
            'as' => 'user.update',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@update'
        ]);

        Route::get('userDelete/{id}', [
            'as' => 'user.delete',
            'middleware' => 'roles',
            'roles' => ['Admin'],
            'uses' => 'Admin\UserController@delete'
        ]);
    });

    Route::get('settings', [
        'as' => 'settings',
        'middleware' => 'roles',
        'roles' => ['Admin'],
        'uses' => 'Admin\SettingController@show'
    ]);

    Route::post('settings', [
        'as' => 'settings',
        'middleware' => 'roles',
        'roles' => ['Admin'],
        'uses' => 'Admin\SettingController@update'
    ]);
});
Auth::routes();


Route::get('testmenu', [
    'as' => 'testmenu',
    'uses' => 'TestMenu@index'
]);

Route::get('/adminFacebook', [
    'as' => 'adminFacebook',
    'uses' => 'Admin\UserController@redirectToProvider'
]);

Route::get('/adminFacebookCallBack', [
    'as' => 'adminFacebookCallBack',
    'uses' => 'Admin\UserController@handleProviderCallback'
]);

/*
 * **********************************************
 *      Route End For Android API Relatiead
 * ********************************************
 */
Route::group(array('prefix' => 'api'), function () {
    Route::get('tests/{key}', [
        'as' => 'api.tests',
        'uses' => 'Admin\AndroidController@getTests'
    ]);

    Route::get('packages/{key}', [
        'as' => 'api.packages',
        'uses' => 'Admin\AndroidController@getPackages'
    ]);

    Route::post('order', [
        'as' => 'api.order',
        'uses' => 'Admin\AndroidController@createOrder'
    ]);


});