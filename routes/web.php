<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/catagory/backend/page','CatagoryController@catagorypage');
Route::post('/new/catagory','CatagoryController@addNewCatagory');
Route::get('delete/category/{id}','CatagoryController@DeleteCategory');
Route::get ('edit/category/{id}','CatagoryController@editCategory');
Route::post('update/catagory','CatagoryController@updateCategory');

Route::get('subcatagory/backend/page','SubCategoryController@subCategoryPage');
Route::post('new/sub/catagory','SubCategoryController@addsubCategory');
Route::get('delete/subcategory/{id}','SubCategoryController@DeletesubCategory');
Route::get('edit/subcategory/{id}','SubCategoryController@editsubCategory');
Route::post('update/subcatagory','SubCategoryController@updatesubCategory');


Route::get('childcatagory/backend/page','childController@childCategoryPage');
Route::get('find/subcategory/by/category/{id}','childController@subcategoryBycatergory');
Route::post('new/child/catagory','childController@addchildCategory');
Route::get('delete/childcategory/{id}','childController@deleteChildCategory');


//product

Route::get('add/product/form','ProductController@AddProductpage');
Route::post('Add/new/product','ProductController@AddnewProduct');
Route::get('find/subcategory/by/category/{id}','ProductController@subcategoryBycatergory');
Route::get('view/all/product','ProductController@viewallproduct');
Route::get('delete/product/{id}','ProductController@deleteproduct');
Route::get('edit/product/{id}','ProductController@editProduct');
Route::post('update/product','ProductController@updateProduct');
Route::get('add/all/product','ProductController@AddAllProduct');
Route::get('Add/All/Product','ProductController@AddNewAllProduct');
Route::post('Add/All/new/product','ProductController@AddAllnewProduct');
Route::get('edit/all/product/{id}','ProductController@editAllProduct');
Route::post('Update/All/new/product','ProductController@updateAllProduct');
Route::get('delete/all/product/{id}','ProductController@deleteAllproduct');


//Homepagesetting

Route::get('homepage/backend/page','HomeSetting@AddSliderpage');
Route::get('Add/slider','HomeSetting@AddSlider');
Route::post('new/add/slider','HomeSetting@AddNewSlider');
Route::get('delete/slider/{id}','HomeSetting@deleteSlider');
Route::get('edit/slider/{id}','HomeSetting@editSlider');
Route::post('update/slider/','HomeSetting@updateSlider');

Route::get('homepage/backend/poster','HomeSetting@Addposterpage');
Route::get('Add/poster','HomeSetting@AddPoster');
Route::post('new/add/poster','HomeSetting@AddNewPoster');
Route::get('delete/poster/{id}','HomeSetting@deletePoster');
Route::get('edit/poster/{id}','HomeSetting@editPoster');
Route::post('update/poster/','HomeSetting@updatePoster');

//Frontend Controller 
Route::get('/','FrontendController@index');
Route::get('product/details/{id}','FrontendController@productDetails');
Route::get('product/blog','FrontendController@productBlog');
Route::get('blog/home','FrontendController@BlogIndex');
Route::get('about/index','FrontendController@AboutIndex');
Route::get('404/index','FrontendController@errorIndex');
Route::get('compare/page','FrontendController@CompareIndex');
Route::get('faq/index','FrontendController@FaqIndex');
Route::get('myaccount/index','FrontendController@myAccountIndex');
Route::get('cart/index','FrontendController@cartIndex');

Route::get('index/login','FrontendController@LoginIndex');
Route::get('shop/page','FrontendController@shopPage');
Route::get('contact/page','FrontendController@ContactPage');
Route::post('contact/page','FrontendController@ContactForm');
Route::get('subcategory/by/category/{id}','FrontendController@subcategorybycategory');
Route::get('SubCat','FrontendController@subCat');


//CartController

Route::post('add/to/cart','CartController@AddtoCart');
Route::get('card/delete/{id}','CartController@DeleteCart');
Route::post('add/to/cart/details','CartController@AddtoCartDetails');


//Shipping
Route::get('add/shipping','ShippingController@viewShipping');
Route::get('Add/new/shipping','ShippingController@addShipping');
Route::post('add/shipping/data','ShippingController@AddtoShipping');
Route::post('place/the/Shipping','ShippingController@calcShipping');



//checkout

Route::get('checkout/index','CheckoutController@CheckoutIndex');
Route::get('find/district/by/divison/{id}','CheckoutController@districtBydivison');
Route::get('find/upazila/by/district/{id}','CheckoutController@upazilaBydistrict');
Route::post('place/the/order','CheckoutController@placeTheorder');

Route::fallback(function(){
    return view('errors.404');
});

//Stripe Payment
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

//OrderManagement
Route::get('view/sells/product', 'orderManagement@viewSells');
Route::get('approve/product/{id}','orderManagement@approveOrder');
Route::get('approve/all/order','orderManagement@viewapproveOrder');
Route::get('decline/order/{id}','orderManagement@declineOrder');
Route::get('decline/all/order','orderManagement@viewdeclineOrder');
Route::get('details/order/{id}','orderManagement@viewDetailsOrder');
Route::get('print/order/{id}','orderManagement@PrintOrder');




















