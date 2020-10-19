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



//***************Front End Part************************


Route::get('/',[
    'uses'      =>'OganiShopController@index',
    'as'        =>'/',
]);


Route::get('shop-grid',[
    'uses'      =>'OganiShopController@shopGrid',
    'as'        =>'shop-grid'
]);


Route::get('category-product/{id}',[
    'uses'      =>'OganiShopController@categoryProduct',
    'as'        =>'/category-product'
]);


Route::get('product-details/{id}',[
    'uses'      =>'OganiShopController@productDetails',
    'as'        =>'/product-details'
]);

//****************Cart*****************

Route::post('/cart/add',[
    'uses'      =>'CartController@addToCart',
    'as'        =>'/add-to-cart'

]);

Route::get('/cart/show',[
    'uses'      =>'CartController@showCart',
    'as'        =>'/show-cart'

]);

Route::get('/cart/delete/{id}',[
    'uses'      =>'CartController@deleteCart',
    'as'        =>'delete-cart-item'

]);

Route::post('/cart/update',[
    'uses'      =>'CartController@updateCart',
    'as'        =>'update-cart'

]);

//***********End Of Cart****************

//****************Checkout and login**********

Route::get('/checkout',[
    'uses'      =>'CheckoutController@index',
    'as'        =>'checkout'
]);

Route::post('/customer/registration',[
    'uses'      =>'CheckoutController@customerSignUp',
    'as'        =>'customer-sign-up'
]);

Route::post('/customer/login',[
    'uses'      =>'CheckoutController@customerLogin',
    'as'        =>'customer-log-in'
]);

Route::get('/checkout/shipping',[
    'uses'      =>'CheckoutController@shippingForm',
    'as'        =>'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses'      =>'CheckoutController@saveShippingInfo',
    'as'        =>'new-shipping'
]);

Route::get('/checkout/payment',[
    'uses'      =>'CheckoutController@paymentForm',
    'as'        =>'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses'      =>'CheckoutController@newOrder',
    'as'        =>'new-order'
]);

Route::get('/complete/order',[
    'uses'      =>'CheckoutController@completeOrder',
    'as'        =>'complete-order'
]);

Route::get('/ajax-email-check/{id}',[
    'uses'      =>'CheckoutController@ajaxEmailCheck',
    'as'        =>'ajax-email-check'
]);

//********end of checkout and login***********


//************log out and login*********



Route::post('/customer/logout',[
    'uses'      =>'CheckoutController@customerLogout',
    'as'        =>'customer-logout'
]);

Route::get('/newcustomer/login',[
    'uses'      =>'CheckoutController@newCustomerLogin',
    'as'        =>'new-customer-login'
]);

Route::post('/visitor/login',[
    'uses'      =>'CheckoutController@visitorLogin',
    'as'        =>'new-visitor-log-in'
]);

//********end of log out and login*********



Route::group(['middleware' => ['Admin']], function () {

    //*********************admin part**********************

//--------------Category Part--------------------

    Route::get('add-category',[

        'uses'      =>'CategoryController@addCategory',
        'as'        =>'/add-category'

    ]);


    Route::post('save-category',[

        'uses'      =>'CategoryController@saveCategory',
        'as'        =>'/save-category'

    ]);


    Route::get('manage-category',[

        'uses'      =>'CategoryController@manageCategory',
        'as'        =>'/manage-category'

    ]);


    Route::get('delete-category/{id}',[

        'uses'      =>'CategoryController@deleteCategory',
        'as'        =>'/category-delete'

    ]);


    Route::get('unpublish-category/{id}',[

        'uses'      =>'CategoryController@unpublishCategory',
        'as'        =>'/unpublish-category'

    ]);


    Route::get('publish-category/{id}',[

        'uses'      =>'CategoryController@publishCategory',
        'as'        =>'/publish-category'

    ]);


    Route::get('edit-category/{id}',[

        'uses'      =>'CategoryController@editCategory',
        'as'        =>'/edit-category'

    ]);


    Route::post('update-category',[

        'uses'      =>'CategoryController@updateCategory',
        'as'        =>'/update-category'

    ]);
//-----------------end of category part-----------------


//-------------------Brand part---------------------


    Route::get('add-brand',[

        'uses'      =>'BrandController@addBrand',
        'as'        =>'/add-brand',

    ]);

    Route::post('save-brand',[

        'uses'      =>'BrandController@saveBrand',
        'as'        =>'/save-brand',

    ]);

    Route::get('delete-brand/{id}',[

        'uses'      =>'BrandController@deleteBrand',
        'as'        =>'/delete-brand',

    ]);

    Route::get('edit-brand/{id}',[

        'uses'      =>'BrandController@editBrand',
        'as'        =>'/edit-brand',

    ]);

    Route::get('unpublish-brand/{id}',[

        'uses'      =>'BrandController@unpublishBrand',
        'as'        =>'/unpublish-brand',

    ]);

    Route::get('publish-brand/{id}',[

        'uses'      =>'BrandController@publishBrand',
        'as'        =>'/publish-brand',

    ]);

    Route::get('manage-brand',[

        'uses'      =>'BrandController@manageBrand',
        'as'        =>'/manage-brand',

    ]);

    Route::post('update-brand',[

        'uses'      =>'BrandController@updateBrand',
        'as'        =>'/update-brand',

    ]);


//------------------end of brand part---------------

//------------------Product Part--------------------


    Route::get('add-product',[

        'uses'      =>'ProductController@addProduct',
        'as'        =>'/add-product',

    ]);

    Route::post('save-product',[

        'uses'      =>'ProductController@saveProduct',
        'as'        =>'/save-product',

    ]);

    Route::get('manage-product',[

        'uses'      =>'ProductController@manageProduct',
        'as'        =>'/manage-product',

    ]);

    Route::get('delete-product/{id}',[

        'uses'      =>'ProductController@deleteProduct',
        'as'        =>'/delete-product',

    ]);

    Route::get('edit-product/{id}',[

        'uses'      =>'ProductController@editProduct',
        'as'        =>'/edit-product',

    ]);

    Route::get('unpublish-product/{id}',[

        'uses'      =>'ProductController@unpublishProduct',
        'as'        =>'/unpublish-product',

    ]);

    Route::get('publish-product/{id}',[

        'uses'      =>'ProductController@publishProduct',
        'as'        =>'/publish-product',

    ]);

    Route::get('manage-product',[

        'uses'      =>'ProductController@manageProduct',
        'as'        =>'/manage-product',

    ]);

    Route::post('update-product',[

        'uses'      =>'ProductController@updateProduct',
        'as'        =>'/update-product',

    ]);


//---------------end of product part----------------


//***************end of admin part*********************

//************admin order management***********

    Route::get('/order/manage-order',[
        'uses'      =>'OrderController@manageOrderInfo',
        'as'        =>'manage-order',
    ]);
    Route::get('/order/view-order-detail/{id}',[
        'uses'      =>'OrderController@viewOrderDetail',
        'as'        =>'view-order'
    ]);
    Route::get('/order/invoice/{id}',[
        'uses'      =>'OrderController@viewOrderInvoice',
        'as'        =>'order-invoice'
    ]);
    Route::get('/order/download-order-invoice/{id}',[
        'uses'      =>'OrderController@downloadOrderInvoice',
        'as'        =>'download-order-invoice'
    ]);


//*********end of admin order management********

    Route::get('/admin-log-out',[
        'uses'      =>'CheckoutController@userLogOut',
        'as'        =>'admin-log-out'
    ]);
});

//Route::get('/', function () {
//    return view('front-end.home.home');
//});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.home.home');
})->name('dashboard');
