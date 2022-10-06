<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsController;


Route::get('/clear-cache',function(){
	$exitCode =Artisan::call('cache:clear');
});




Route::prefix('Admin')->group(function () {   

       Route::get('/', [AdminloginController::class, 'index_Login'])->name('Login_admin');
       Route::post('/', [AdminloginController::class, 'Login'])->name('Login_admin');
       Route::get('Logout', [AdminloginController::class, 'Logout'])->name('Logout');
       Route::get('Dashboard', [AdminloginController::class, 'Dashboard'])->name('Dashboard');
       //thông tin admin
       Route::get('index_admin', [AdminloginController::class, 'index_admin'])->name('index_admin');

       Route::get('add_admin', [AdminloginController::class, 'add_admin'])->name('add_admin');
       Route::post('add_admin', [AdminloginController::class, 'add_admin_post'])->name('add_admin_post');

       Route::get('Update_admin/{id_Customer}', [AdminloginController::class, 'Update_admin'])->name('Update_admin');
       Route::post('Update_admin/{id_Customer}', [AdminloginController::class, 'Update_admin_post'])->name('Update_admin_post');

       Route::get('deleted_admin/{id_Customer}', [AdminloginController::class, 'deleted_admin'])->name('deleted_admin');


     Route::prefix('Category')->group(function () {   
            Route::get('/', [CategoryController::class, 'Category_index'])->name('Category_index');
            
            Route::get('Category_add', [CategoryController::class, 'Category_create'])->name('Category_create');
            Route::post('Category_add', [CategoryController::class, 'Category_add'])->name('Category_add');

            Route::get('Category_Edit/{id_category}', [CategoryController::class, 'Category_Edit'])->name('Category_Edit');
            Route::post('Category_Update/{id_category}', [CategoryController::class, 'Category_Update'])->name('Category_Update');

            Route::get('Category_deleted/{id_category}', [CategoryController::class, 'Category_deleted'])->name('Category_deleted');
     });

     Route::prefix('Brand')->group(function () {   
            Route::get('Brand_index', [BrandController::class, 'Brand_index'])->name('Brand_index');

            Route::get('Brand_add', [BrandController::class, 'Brand_create'])->name('Brand_create');
            Route::post('Brand_add', [BrandController::class, 'Brand_add'])->name('Brand_add');

            Route::get('Brand_Edit/{id_brand}', [BrandController::class, 'Brand_Edit'])->name('Brand_Edit');
            Route::post('Brand_Update/{id_brand}', [BrandController::class, 'Brand_Update'])->name('Brand_Update');
           

            Route::get('Brand_deleted/{id_brand}', [BrandController::class, 'Brand_deleted'])->name('Brand_deleted');
     });

     Route::prefix('Customer')->group(function () {   
              //admin
            Route::get('Customer_index', [CustomerController::class, 'Customer_index'])->name('Customer_index');

            Route::get('deleted-{id_Customer}', [CustomerController::class, 'deleted'])->name('deleted');     
            // Khách hàng sữa thông tin của mình
            Route::get('index_khachhang/{id_Customer}', [CustomerController::class, 'index_khachhang'])->name('index_khachhang');

            Route::get('edit_khachhang/{id_Customer}', [CustomerController::class, 'edit_khachhang'])->name('edit_khachhang');
            Route::post('Update_khachhang/{id_Customer}', [CustomerController::class, 'Update_khachhang'])->name('Update_khachhang');

            // khach hàng quên mật khẩu
            Route::get('/', [CustomerController::class, 'reset_password'])->name('reset_password');
            Route::post('Recover_pass', [CustomerController::class, 'Recover_pass'])->name('Recover_pass');

            Route::get('update_new_pass', [CustomerController::class, 'update_new_pass'])->name('update_new_pass');
            Route::post('Rest_new_pass', [CustomerController::class, 'Rest_new_pass'])->name('Rest_new_pass');




     });
        Route::prefix('Review')->group(function () {   
              Route::get('Review_index', [HomeController::class, 'Review_index'])->name('Review_index');
              Route::get('Unactive/{id_review}', [HomeController::class, 'Unactive'])->name('Unactive');
              Route::get('active/{id_review}', [HomeController::class, 'active'])->name('active');
              Route::get('delete/{id_review}', [HomeController::class, 'detele_review'])->name('detele_review');
              
       });
     Route::prefix('Coupon')->group(function () {   
       Route::get('Coupon_index', [CouponController::class, 'Coupon_index'])->name('Coupon_index');  
       Route::get('create_coupon', [CouponController::class, 'create_coupon'])->name('create_coupon');
       Route::post('Add_coupon', [CouponController::class, 'Add_coupon'])->name('Add_coupon');  
       Route::get('deleted_coupon/{id_coupon}', [CouponController::class, 'deleted_coupon'])->name('deleted_coupon');

       Route::get('coupon_Email/{coupon_code}', [CouponController::class, 'coupon_Email'])->name('coupon_Email');

       });

       Route::prefix('News')->group(function () {   
              Route::get('index_News', [SliderController::class, 'index_News'])->name('index_News_admin'); 

              Route::get('add_News', [SliderController::class, 'add_News'])->name('add_News'); 
              Route::post('add_News_post', [SliderController::class, 'add_News_post'])->name('add_News_post');

              Route::get('Update_News/{id_news}', [SliderController::class, 'Update_News'])->name('Update_News'); 
              Route::post('Update_News_post/{id_news}', [SliderController::class, 'Update_News_post'])->name('Update_News_post'); 
              
              Route::get('deleted_News/{id_news}', [SliderController::class, 'deleted_News'])->name('deleted_News');
              });


       Route::prefix('Order')->group(function () {   
              Route::get('/', [OrderController::class, 'Order_index'])->name('Order_index');
              Route::get('order_details/{order_code}', [OrderController::class, 'order_details'])->name('order_details');  
              Route::get('order_delete/{order_code}', [OrderController::class, 'order_delete'])->name('order_delete'); 

              //trạng thái đơn hàng admin thay đổi
              Route::get('active_0/{id_order}', [OrderController::class, 'active_0'])->name('active_0');
              Route::get('active_1/{id_order}', [OrderController::class, 'active_1'])->name('active_1');
              Route::get('active_2/{id_order}', [OrderController::class, 'active_2'])->name('active_2');

              //lich su đơn hàng của khách hàng
              Route::get('view_history/{id_customer}', [OrderController::class, 'view_history'])->name('view_history');
              // người dùng xóa đơn hàng
              Route::get('deleted_history/{order_code}', [OrderController::class, 'deleted_history'])->name('deleted_history');
             
               // lịch sử đơn hàng chi tiết của khách hàng
              Route::get('details_history/{order_code}', [OrderController::class, 'details_history'])->name('details_history');

              // in đơn hàng 

              Route::get('In_Order/{order_code}', [OrderController::class, 'Print_Order'])->name('Print_Order');

        });
       
     Route::prefix('Product')->group(function () {   
            Route::get('/', [ProductController::class, 'Product_index'])->name('Product_index');

            Route::get('Product_create', [ProductController::class, 'Product_create'])->name('Product_create');
            Route::post('Product_add', [ProductController::class, 'Product_add'])->name('Product_add');

            Route::get('Product_Edit/{id_product}', [ProductController::class, 'Product_Edit'])->name('Product_Edit');
            Route::post('Product_Update/{id_product}', [ProductController::class, 'Product_Update'])->name('Product_Update');

            Route::get('Product_deleted/{id_product}', [ProductController::class, 'Product_deleted'])->name('Product_deleted');

            // tiềm kiếm product admin
            Route::post('Search_admin', [ProductController::class, 'Search_admin'])->name('Search_admin');

     });

       Route::prefix('Slider')->group(function () {   
              Route::get('Slider_index', [SliderController::class, 'Slider_index'])->name('Slider_index');

              Route::get('slider_create', [SliderController::class, 'Slider_create'])->name('Slider_create');
              Route::post('Slider_add', [SliderController::class, 'Slider_add'])->name('Slider_add');

              Route::get('Slider_Edit/{id_slider}', [SliderController::class, 'Slider_Edit'])->name('Slider_Edit');
              Route::post('Slider_Update/{id_slider}', [SliderController::class, 'Slider_Update'])->name('Slider_Update');

              Route::get('Slider_deleted/{id_slider}', [SliderController::class, 'Slider_deleted'])->name('Slider_deleted');

       });

     Route::prefix('Color')->group(function () {   
       Route::get('Color_index', [ColorController::class, 'Color_index'])->name('Color_index');

       Route::get('Color_Edit/{id_color}', [ColorController::class, 'Color_Edit'])->name('Color_Edit');
       Route::post('Color_Update/{id_color}', [ColorController::class, 'Color_Update'])->name('Color_Update');

       Route::get('Color_add', [ColorController::class, 'Color_create'])->name('Color_create');
       Route::post('Color_add', [ColorController::class, 'Color_add'])->name('Color_add');

       Route::get('Color_delete/{id_color}', [ColorController::class, 'Color_delete'])->name('Color_delete');
     });
     
});

Route::prefix('SHOP')->group(function () { 
       Route::get('/', [HomeController::class, 'font_end'])->name('font_end');
       Route::get('product_chitiet-{id_product}', [HomeController::class, 'product_chitiet'])->name('product_chitiet');
       Route::get('category-{id_category}', [HomeController::class, 'show_category'])->name('show_category');
       Route::get('brand-{id_brand}', [HomeController::class, 'show_brand'])->name('show_brand');

       Route::post('Search', [HomeController::class, 'Search'])->name('Search');

       //đăng nhập font-end
       Route::get('Login', [HomeController::class, 'Login'])->name('Login');
       Route::get('Logout_font_end/{session_id}', [HomeController::class, 'Logout_font_end'])->name('Logout_font_end');
       Route::post('Login', [HomeController::class, 'Login_post'])->name('Login_post');

       //đăng ký
       Route::get('Register', [HomeController::class, 'Register'])->name('Register');
       Route::post('Register', [HomeController::class, 'Customer_add'])->name('Customer_add');

       //cart
       Route::get('Shopping_Cart', [CartController::class, 'Shopping_Cart'])->name('Shopping_Cart');
       Route::get('deleted_Cart/{session_id}', [CartController::class, 'deleted_Cart'])->name('deleted_Cart');
       Route::post('add_Cart', [CartController::class, 'add_Cart'])->name('add_Cart');
       Route::post('update_Cart', [CartController::class, 'update_Cart'])->name('update_Cart');
       Route::post('check_coupon', [CartController::class, 'check_coupon'])->name('check_coupon');

       //order
       Route::get('Shopping_order', [CartController::class, 'Shopping_order'])->name('Shopping_order');
       Route::post('Order', [CartController::class, 'Order'])->name('Order');

       //Review
       Route::post('Review', [HomeController::class, 'Review'])->name('Review');

       // Tin Tức
       Route::get('News', [HomeController::class, 'index_News'])->name('index_News');
       Route::get('News_chitiet/{id_news}', [HomeController::class, 'index_News_chitiet'])->name('index_News_chitiet');
       
       
  });




