<?php

use Illuminate\Http\Request;


Route::apiResource('users', 'AdminApi\UserController');
Route::apiResource('roles', 'AdminApi\RoleController');
Route::apiResource('permissions', 'AdminApi\PermissionController');
Route::apiResource('blogs', 'BlogController')->middleware('auth');
Route::middleware('auth:api')->get('/userId', function (Request $request) {
    return $request->user()->id;
});
Route::get('/me', 'AdminApi\UserController@GetUser');
Route::post('blogs/{blog}/update-image', 'BlogController@updateFeaturedImage')->middleware('auth');

//Route::group(['middleware' => ['auth']], function () {
    Route::apiResource('/supplier', 'AdminApi\SupplierController');
    Route::apiResource('/supplierOrder', 'AdminApi\SupplierOrderController');
    Route::apiResource('/category', 'AdminApi\CategoryController')->middleware('auth');
    Route::apiResource('/wholesale', 'AdminApi\WholeSalerController')->middleware('auth');

    Route::apiResource('/product', 'AdminApi\ProductController');
    Route::apiResource('/expense-category', 'AdminApi\ExpenseCategoryController');
    Route::apiResource('/expense', 'AdminApi\ExpenseController');
    Route::apiResource('/customer', 'AdminApi\CustomerController');
    Route::apiResource('/store', 'AdminApi\StoresController');
    Route::apiResource('/store-product', 'AdminApi\StoresProductController');
    Route::apiResource('/online-product', 'AdminApi\OnlineProductController');

    Route::apiResource('/size', 'AdminApi\SizeController');
    Route::apiResource('/status', 'AdminApi\OrderStatusController');
    Route::apiResource('/role', 'AdminApi\RoleController');
    Route::apiResource('/users', 'AdminApi\UserController');
    Route::apiResource('/supplier-account', 'AdminApi\SupplierAccountController');
    Route::apiResource('/order-product-details', 'AdminApi\OrderDetailsController');
    Route::apiResource('/deli-company', 'AdminApi\DeliCompanyController');

    Route::apiResource('/general', 'AdminApi\GeneralController');
    Route::Post('/feature/{id}', 'AdminApi\ProductController@feature');
    Route::Post('/stock/update/{id}', 'AdminApi\ProductController@StockUpdate');
    Route::Post('/supplier-account/update/{id}', 'AdminApi\SupplierAccountController@SupplierUpdate');
    Route::Post('/stock/transfer/{id}', 'AdminApi\ProductController@StockTransfer');

    Route::get('/getting/product/{id}', 'AdminApi\PosController@GetProduct');

    Route::get('/addTocart/{id}', 'AdminApi\CartController@AddToCart');
    Route::get('/cart/product', 'AdminApi\CartController@CartProduct');
    Route::get('/remove/cart/{id}', 'AdminApi\CartController@removeCart');
    Route::get('/increment/{id}', 'AdminApi\CartController@Increment');
    Route::get('/decrement/{id}', 'AdminApi\CartController@Decrement');
    Route::get('/vats', 'AdminApi\CartController@Vats');
    Route::get('/addTocartShop/{id}', 'AdminApi\CartShopController@AddToCart');

    Route::post('/orderdone', 'AdminApi\PosController@OrderDone');
    Route::post('/shoporderdone', 'AdminApi\PosShopController@OrderDone');

    Route::get('/orders', 'AdminApi\OrdersController@TodayOrder');
    Route::get('/orders/all', 'AdminApi\OrdersController@AllOrder');
    Route::get('/orders/{id}', 'AdminApi\OrdersController@show');
    Route::post('/orders/{id}', 'AdminApi\OrdersController@update');
    Route::get('/order/details/{id}', 'AdminApi\OrdersController@OrderDetails');
    Route::get('/order/orderdetails/{id}', 'AdminApi\OrdersController@OrderDetailsAll');
    Route::get('/order/refund-details/{id}', 'AdminApi\OrdersController@OrderRefundsdetails');
    Route::get('/order/refund-product/{id}', 'AdminApi\OrdersController@OrderRefund');
    Route::post('/search/order/', 'AdminApi\OrdersController@SearchOrderDate');
    Route::post('/search/date/', 'AdminApi\OrdersController@SearchOrderBtwDate');
    Route::post('/search/month/', 'AdminApi\OrdersController@SearchMonth');
    Route::get('/pending-orders/all', 'AdminApi\OrdersController@PendingOrder');
    Route::get('/delevared-orders/all', 'AdminApi\OrdersController@DelevaredOrder');
    Route::get('/delevared-orders/courier', 'AdminApi\OrdersController@CourierOrder');
    Route::post('/status-orders', 'AdminApi\OrdersController@StatusOrder');
    Route::post('/courier-orders', 'AdminApi\OrdersController@CourierOrder');

    Route::get('/current-user', 'AdminApi\UserController@currentUser');
    Route::post('/barcode/', 'AdminApi\ProductController@barcode');
//Report Generate by Date
    Route::post('/report/order/', 'AdminApi\ReportOrderController@SearchOrderDate');
    Route::post('/report/date/', 'AdminApi\ReportOrderController@SearchOrderBtwDate');
    Route::post('/report/month/', 'AdminApi\ReportOrderController@SearchMonth');

//total-generate
    Route::post('/report/order/total/', 'AdminApi\ReportOrderController@TotalSearchOrderDate');
    Route::post('/report/date/total/', 'AdminApi\ReportOrderController@TotalSearchOrderBtwDate');
    Route::post('/report/month/total/', 'AdminApi\ReportOrderController@TotalSearchMonth');

//Report Generate by Products
    Route::post('/report/order/product', 'AdminApi\ReportOrderProductController@SearchOrderDate');
    Route::post('/report/date/product', 'AdminApi\ReportOrderProductController@SearchOrderBtwDate');
    Route::post('/report/month/product', 'AdminApi\ReportOrderProductController@SearchMonth');

//total-generate
    Route::post('/report/order/product/total/', 'AdminApi\ReportOrderProductController@TotalSearchOrderDate');
    Route::post('/report/date/product/total', 'AdminApi\ReportOrderProductController@TotalSearchOrderBtwDate');
    Route::post('/report/month/product/total/', 'AdminApi\ReportOrderProductController@TotalSearchMonth');


//Report Generate by Category
    Route::post('/report/order/category', 'AdminApi\ReportOrderCategoryController@SearchOrderDate');
    Route::post('/report/date/category', 'AdminApi\ReportOrderCategoryController@SearchOrderBtwDate');
    Route::post('/report/month/category', 'AdminApi\ReportOrderCategoryController@SearchMonth');

//total-generate
    Route::post('/report/order/category/total/', 'AdminApi\ReportOrderCategoryController@TotalSearchOrderDate');
    Route::post('/report/date/category/total', 'AdminApi\ReportOrderCategoryController@TotalSearchOrderBtwDate');
    Route::post('/report/month/category/total/', 'AdminApi\ReportOrderCategoryController@TotalSearchMonth');

//Report Generate by Company
    Route::post('/report/order/company', 'AdminApi\ReportOrderCourierController@SearchOrderDate');
    Route::post('/report/date/company', 'AdminApi\ReportOrderCourierController@SearchOrderBtwDate');
    Route::post('/report/month/company', 'AdminApi\ReportOrderCourierController@SearchMonth');

//total-generate
    Route::post('/report/order/company/total/', 'AdminApi\ReportOrderCourierController@TotalSearchOrderDate');
    Route::post('/report/date/company/total', 'AdminApi\ReportOrderCourierController@TotalSearchOrderBtwDate');
    Route::post('/report/month/company/total/', 'AdminApi\ReportOrderCourierController@TotalSearchMonth');

//Report Generate by Shop
    Route::post('/report/order/shop', 'AdminApi\ReportOrderStoreController@SearchOrderDate');
    Route::post('/report/date/shop', 'AdminApi\ReportOrderStoreController@SearchOrderBtwDate');
    Route::post('/report/month/shop', 'AdminApi\ReportOrderStoreController@SearchMonth');

//total-generate
    Route::post('/report/order/shop/total/', 'AdminApi\ReportOrderStoreController@TotalSearchOrderDate');
    Route::post('/report/date/shop/total', 'AdminApi\ReportOrderStoreController@TotalSearchOrderBtwDate');
    Route::post('/report/month/shop/total/', 'AdminApi\ReportOrderStoreController@TotalSearchMonth');

//Report Generate by Expense
    Route::post('/report/expense', 'AdminApi\ReportExpenseController@SearchExpenseDate');
    Route::post('/report/date/expense', 'AdminApi\ReportExpenseController@SearchExpenseBtwDate');
    Route::post('/report/month/expense', 'AdminApi\ReportExpenseController@SearchExpenseMonth');

//total-generate
    Route::post('/report/expense/total/', 'AdminApi\ReportExpenseController@TotalSearchExpenseDate');
    Route::post('/report/date/expense/total', 'AdminApi\ReportExpenseController@TotalSearchExpenseBtwDate');
    Route::post('/report/month/expense/total/', 'AdminApi\ReportExpenseController@TotalSearchExpenseMonth');

//Report Generate by Expense category
    Route::post('/report/expense/category', 'AdminApi\ReportExpenseCategoryController@SearchExpenseDate');
    Route::post('/report/date/expense/category', 'AdminApi\ReportExpenseCategoryController@SearchExpenseBtwDate');
    Route::post('/report/month/expense/category', 'AdminApi\ReportExpenseCategoryController@SearchExpenseMonth');

//total-generate
    Route::post('/report/expense/category/total/', 'AdminApi\ReportExpenseCategoryController@TotalSearchExpenseDate');
    Route::post('/report/date/expense/category/total', 'AdminApi\ReportExpenseCategoryController@TotalSearchExpenseBtwDate');
    Route::post('/report/month/expense/category/total/', 'AdminApi\ReportExpenseCategoryController@TotalSearchExpenseMonth');

//Home Count Api
//product count
    Route::get('/product-count', 'AdminApi\HomeController@ProductsCount');
    Route::get('/category-count', 'AdminApi\HomeController@CategoryCount');
    Route::get('/stores-product-count', 'AdminApi\HomeController@StoresProductsCount');
    Route::get('/online-product-count', 'AdminApi\HomeController@OnlineProductsCount');
//Order count
    Route::get('/today-order-count', 'AdminApi\HomeController@TodayOrderCount');
    Route::get('/today-order-amount', 'AdminApi\HomeController@TodayOrderAmount');
    Route::get('/this-month-order-count', 'AdminApi\HomeController@ThisMonthOrderCount');
    Route::get('/month-order-amount', 'AdminApi\HomeController@ThisMonthOrderAmount');
    Route::get('/this-month-pending-order-count', 'AdminApi\HomeController@PendingOrderCount');
    Route::get('/this-month-pending-order-amount', 'AdminApi\HomeController@PendingOrderAmount');
    Route::get('/this-month-delivered-order-count', 'AdminApi\HomeController@DeliveredOrderCount');
    Route::get('/this-month-delivered-order-amount', 'AdminApi\HomeController@DeliveredOrderAmount');

//Expense Amount
    Route::get('/today-expense-amount', 'AdminApi\HomeController@TodayExpenseAmount');
    Route::get('/month-expense-amount', 'AdminApi\HomeController@MonthExpenseAmount');

//Supplier Total
    Route::get('/supplier-total-amount', 'AdminApi\SupplierController@TotalAmount');
//Earning Total
    Route::post('/report/earning', 'AdminApi\ReportProfitController@SearchExpenseDate');


//});
