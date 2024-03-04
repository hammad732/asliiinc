<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear', function () {

    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
});

// ================= home =================
// Route::get('/', function () {

//     return view('frontend/main');
// })->name('/');

Route::get('/', 'UserController@aboutus')->name('main');
Route::get('/home', 'UserController@main')->name('home');
Route::get('/select-state', 'UserController@states')->name('select.state');

Route::post('/change-page-id2', 'UserController@change_page_id')->name('make.change');
Route::get('/change-page-id', 'UserController@change_id')->name('change.page');

Route::get('/stores', 'UserController@stores')->name('stores');
Route::get('/search/store', 'UserController@search_store')->name('search.store');

Route::get('sa/add/site/number', 'UserController@SupportNumber')->name('sa.add.site.number');
Route::post('sa/store/site/number', 'UserController@SupportStoreNumber')->name('sa.store.site.number');


// ================= login ================
Route::get('/login', function () {
    if (Auth::check() == 0) {
        return view('auth/login');
    }
})->name('login');

// ================= logout ===============
Route::get('/logout', function () {
    if (Auth::check() == 0) {
        return view('auth/login');
    }
})->name('logout');

// ================= register =============
Route::get('/register', function () {
    return view('auth/register');
})->name('register');

// ================= GUEST ROUTES =================
Route::get('/connect', 'UserController@connect')->name('connect');

//------------------Search Function----------------------------------------
Route::any('/product-search', 'UserController@search_product')->name('product_search');

Route::get('/subcategories-list', 'UserController@subcategories_list')->name('subcategories.list');
Route::get('/check/role', 'UserController@check_role')->name('check.role');


Route::post('/connect/email', 'UserController@connect_email')->name('connect.email');

Route::get('/rproduct-list', 'UserController@rproduct_list')->name('rproduct.list');
Route::get('/view-rproduct', 'UserController@view_rproduct')->name('view.rproduct');


Route::get('/dproduct-list', 'UserController@dproduct_list')->name('dproduct.list');
Route::get('/view-dproduct', 'UserController@view_dproduct')->name('view.dproduct');

//--------------------------------jobs routes-------------------------------
Route::get('/jobs', 'UserController@jobs')->name('view.jobs');
Route::get('/job/detail/{id}', 'UserController@job_detail')->name('job.detail');

//--------------------------------cart routes-------------------------------
Route::get('cart-add/{id}', 'CartController@add_cart')->name('cart.add');
Route::get('d-cart-add/{id}', 'CartController@d_add_cart')->name('d.cart.add');
Route::get('cart-remove/{id}', 'CartController@remove_cart')->name('cart.remove');

Route::get('/cart-display', 'CartController@cart_display')->name('cart.display');
Route::get('/cart-destroy/{id}', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart-update/{id}', 'CartController@update')->name('cart.update');
Route::get('/cart-checkout', 'CartController@checkout')->name('cart.checkout');

// ================= END OF GUEST ROUTES =================

Auth::routes();
// ================= AUTH ROUTES =================
Route::group(['middleware' => ['auth']], function () {
    //profile
    Route::get('/get-profile-data', 'UserController@get_profile_data')->name('get.profile.data');
    Route::post('/profile-update', 'UserController@profile_update')->name('profile.update');


    Route::get('/user/view/order/{id}', 'UserController@user_view_order')->name('user.view.order');

    //--------------------------------Orders routes-------------------------------
    Route::post('/order/store', 'OrderController@order_store')->name('order.store');
    Route::get('/payment/methods', 'OrderController@payment_methods')->name('payment.methods');
    Route::post('paypal/payment', 'OrderController@paypal_payment_option')->name('paypal.payment.option');
    Route::get('/thank-you', 'OrderController@thank_you')->name('thank.you');
    Route::get('pdf-download', 'OrderController@pdf_download')->name('pdf.download');

    Route::get('/rthank-you/{id}', 'OrderController@rthank_you');
    Route::get('/dthank-you/{id}', 'OrderController@dthank_you');

    // ================= Super Admin ROUTES =================
    Route::group(['middleware' => ['role:Super Admin|Admin']], function () {

        Route::get('/select/type', 'UserController@select_p_type')->name('sa.select.p.type');
        Route::get('/sa/view/rproducts', 'UserController@sa_rproducts')->name('sa.frontend.rproducts');
        Route::get('/sa/view/dproducts', 'UserController@sa_dproducts')->name('sa.frontend.dproducts');
        Route::get('products/out-of-stock/{id}', 'SuperadminController@stock')->name('stock');
        //stores
        Route::get('sa/stores-view', 'SuperadminController@stores_view')->name('sa.stores.view');
        Route::post('sa/store-save', 'SuperadminController@store_save')->name('sa.store.save');
        Route::get('sa/store-delete', 'SuperadminController@store_delete')->name('sa.store.delete');
        Route::get('sa/get-edit-store-data', 'SuperadminController@get_edit_store_data')->name('sa.get.edit.store.data');
        Route::post('sa/store-update', 'SuperadminController@store_update')->name('sa.store.update');

        //connect
        Route::get('sa/connect', 'SuperadminController@connect')->name('sa.connect');
        Route::get('sa/connect-create', 'SuperadminController@connect_create')->name('sa.connect.create');
        Route::post('sa/connect-save', 'SuperadminController@connect_save')->name('sa.connect.add');


        Route::get('sa/get/connect/data', 'SuperadminController@get_connect_data')->name('sa.get.connect.data');
        Route::post('sa/connect/update', 'SuperadminController@connect_update')->name('sa.connect.update');
        Route::get('sa/connect/delete/{id}', 'SuperadminController@connect_delete')->name('sa.connect.delete');

        //Super Admin-dashboard
        Route::get('sa/dashboard', 'SuperadminController@dashboard')->name('sa.dashboard');
        Route::get('/select-state-user', 'SuperadminController@states_user_edit')->name('select.state.user.edit');

        //jobs
        Route::get('jobs-view', 'SuperadminController@jobs_view')->name('sa.jobs.view');
        Route::post('job-save', 'SuperadminController@job_save')->name('sa.job.save');
        Route::get('job-delete', 'SuperadminController@job_delete')->name('sa.job.delete');
        Route::get('get-edit-job-data', 'SuperadminController@get_edit_job_data')->name('sa.get.edit.job.data');
        Route::post('job-update', 'SuperadminController@job_update')->name('sa.job.update');

        //users
        Route::get('sa/users-view', 'SuperadminController@users_view')->name('sa.users.view');
        Route::post('sa/user-save', 'SuperadminController@user_save')->name('sa.user.save');
        Route::get('sa/user-block', 'SuperadminController@user_block')->name('sa.user.block');
        Route::get('sa/get-edit-user-data', 'SuperadminController@get_edit_user_data')->name('sa.get.edit.user.data');
        Route::post('sa/user-update', 'SuperadminController@user_update')->name('sa.user.update');

        //categories
        Route::get('sa/categories-view', 'SuperadminController@categories_view')->name('sa.categories.view');
        Route::post('sa/category-save', 'SuperadminController@category_save')->name('sa.category.save');
        Route::get('sa/category-delete', 'SuperadminController@category_delete')->name('sa.category.delete');
        Route::get('sa/get-edit-category-data', 'SuperadminController@get_edit_category_data')->name('sa.get.edit.category.data');
        Route::post('sa/category-update', 'SuperadminController@category_update')->name('sa.category.update');

        //sub-categories
        Route::get('sa/sub-categories-view', 'SuperadminController@sub_categories_view')->name('sa.sub.categories.view');
        Route::post('sa/sub-category-save', 'SuperadminController@sub_category_save')->name('sa.sub.category.save');
        Route::get('sa/sub-category-delete', 'SuperadminController@sub_category_delete')->name('sa.sub.category.delete');
        Route::get('sa/get-edit-sub-category-data', 'SuperadminController@get_edit_sub_category_data')->name('sa.get.edit.sub.category.data');
        Route::post('sa/sub-category-update', 'SuperadminController@sub_category_update')->name('sa.sub.category.update');

        //product
        Route::get('sa/add/product', 'SuperadminController@add_product_form')->name('sa.add.product.form');
        Route::post('product-save', 'SuperadminController@product_save')->name('sa.product.save');
        Route::get('sa/get/subcat', 'SuperadminController@get_subcat_json')->name('get.subcat.json');
        Route::post('sa/import/products', 'SuperadminController@import_products')->name('sa.import.products');

        //rproducts
        Route::get('rproducts-view', 'SuperadminController@rproducts_view')->name('sa.rproducts.view');
        Route::post('rproduct-save', 'SuperadminController@rproduct_save')->name('sa.rproduct.save');
        Route::get('rproduct-delete', 'SuperadminController@rproduct_delete')->name('sa.rproduct.delete');
        Route::get('get-edit-rproduct-data', 'SuperadminController@get_edit_rproduct_data')->name('sa.get.edit.rproduct.data');
        Route::post('rproduct-update', 'SuperadminController@rproduct_update')->name('sa.rproduct.update');
        //update product status
        Route::post('rproducts-status-update', 'SuperadminController@rproduct_update_status')->name('rproduct_update_status');

        //orders
        Route::get('sa/r/orders', 'SuperadminController@r_orders')->name('sa.r.orders');
        Route::get('sa/rorder/view/{id}', 'SuperadminController@sa_view_rorder')->name('sa.view.rorder');
        Route::get('sa/d/orders', 'SuperadminController@d_orders')->name('sa.d.orders');
        Route::get('sa/dorder/view/{id}', 'SuperadminController@sa_view_dorder')->name('sa.view.dorder');


        Route::get('sa/rorder/pdf', 'SuperadminController@rorder_pdf')->name('sa.rorder.pdf.download');
        Route::get('sa/dorder/pdf', 'SuperadminController@dorder_pdf')->name('sa.dorder.pdf.download');

        //dproducts
        Route::get('dproducts-view', 'SuperadminController@dproducts_view')->name('sa.dproducts.view');
        Route::post('dproduct-save', 'SuperadminController@dproduct_save')->name('sa.dproduct.save');
        Route::get('dproduct-delete', 'SuperadminController@dproduct_delete')->name('sa.dproduct.delete');
        Route::get('get-edit-dproduct-data', 'SuperadminController@get_edit_dproduct_data')->name('sa.get.edit.dproduct.data');
        Route::post('dproduct-update', 'SuperadminController@dproduct_update')->name('sa.dproduct.update');

        //marquees
        Route::get('marquees-view', 'SuperadminController@marquees_view')->name('sa.marquees.view');
        Route::post('sa/marquee-save', 'SuperadminController@marquee_save')->name('sa.marquee.save');
        Route::get('sa/marquee-delete', 'SuperadminController@marquee_delete')->name('sa.marquee.delete');
        Route::get('sa/get-edit-marquee-data', 'SuperadminController@get_edit_marquee_data')->name('sa.get.edit.marquee.data');
        Route::post('sa/marquee-update', 'SuperadminController@marquee_update')->name('sa.marquee.update');

        //services
        Route::get('sa/show/service', 'SuperadminController@show_service')->name('sa.show.service');
        Route::get('/service', 'SuperadminController@show_service_index')->name('sa.show.service_all');
        Route::get('/allservices/{type}', 'SuperadminController@show_allservice')->name('singleservices');
        Route::get('/service_detail/{id}', 'SuperadminController@singleservices')->name('service_detail');
        Route::get('service-create', 'SuperadminController@service_create')->name('service.create');
        Route::get('service-type-create', 'SuperadminController@service_type_create')->name('service-type.create');
        Route::post('service-save', 'SuperadminController@service_save')->name('service.save');
        Route::post('service-type-save', 'SuperadminController@service_type_save')->name('service-type.save');
        Route::get('service-edit/{id}', 'SuperadminController@service_edit')->name('service.edit');
        Route::post('service-update', 'SuperadminController@service_update')->name('service.update');
        Route::get('service-delete/{id}', 'SuperadminController@service_delete')->name('service.delete');

        Route::get('sa/aboutus', 'SuperadminController@aboutus')->name('sa.aboutus');
        Route::get('aboutus-edit/{id}', 'SuperadminController@aboutus_edit')->name('aboutus.edit');
        Route::post('aboutus-update', 'SuperadminController@aboutus_update')->name('aboutus.update');


        Route::post('content-save', 'SuperadminController@content_save')->name('content.save');
        Route::get('content-edit/{id}', 'SuperadminController@content_edit')->name('content.edit');
        Route::post('content-update', 'SuperadminController@content_update')->name('content.update');
        Route::get('content-delete/{id}', 'SuperadminController@content_delete')->name('content.delete');


        Route::get('content-create', 'SuperadminController@content_create')->name('content.create');

        //add varients for old products

        Route::get('sa/show-varient/{id}', 'SuperadminController@show_varient')->name('show.varient');

        Route::get('varient-create/{id}', 'SuperadminController@varient_create')->name('varient.create');
        Route::post('varient-save', 'SuperadminController@varient_save')->name('varient.save');
        Route::get('varient-edit/{id}', 'SuperadminController@varient_edit')->name('varient.edit');
        Route::post('varient-update', 'SuperadminController@varient_update')->name('varient.update');
        Route::get('varient-delete/{id}', 'SuperadminController@varient_delete')->name('varient.delete');


    }); //END of Super ADMIN role middleware

    // ================= Admin ROUTES =================
    Route::group(['middleware' => ['role:Admin']], function () {
        //Admin-dashboard
        Route::get('a/dashboard', 'AdminController@dashboard')->name('a.dashboard');
    }); //END of USER role middleware

    // ================= Distributor ROUTES =================
    Route::group(['middleware' => ['role:Distributor']], function () {
        //Distributor-dashboard
        Route::get('d/dashboard', 'DistributorController@dashboard')->name('d.dashboard');
        Route::get('d/orders', 'DistributorController@orders')->name('d.orders');
    }); //END of Distributor role middleware

    // ================= Retailer ROUTES =================
    Route::group(['middleware' => ['role:Retailer']], function () {
        //Retailer-dashboard
        Route::get('r/dashboard', 'RetailerController@dashboard')->name('r.dashboard');
        Route::get('r/orders', 'RetailerController@orders')->name('r.orders');
    }); //END of Retailer role middleware

    // ================= USER ROUTES =================
    Route::group(['middleware' => ['role:user']], function () {
    }); //END of USER role middleware

    // ================= USER ROUTES =================
    Route::group(['middleware' => ['role:user']], function () {
    }); //END of USER role middleware

}); //END of AUTH middleware


// Route::get('/allproducts', function ()
// {
//     return view('frontend/layouts/allproducts');
// });

Route::get('/allproducts/{id}', 'UserController@all_products')->name('allproducts');

Route::get('service-view/{id}', 'SuperadminController@service_view')->name('service.view');


                    //   varients routes

Route::get('/applyjob', function () {
    return view('frontend/connect/applyjob');
})->name('applyjob');

Route::get('/aboutus', 'UserController@aboutus')->name('aboutus');


// Route::get('/aboutus', function () {
//     return view('frontend/aboutus');
// })->name('aboutus');
