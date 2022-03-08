<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdertoInvoiceController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\User;
use App\Models\Role;
use GuzzleHttp\Psr7\Request;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('quotations', QuotationController::class);

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    // Route::get('/', function () {
    //     return view('sales.landing');
    // });



    //logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    //Role
    Route::get('/users/users_details', [UserController::class, 'details'])->name('users.details');
    Route::get('/users/location', function () {
        return view('sales.users.location');
    })->name('users.location');
    // Route::get('userrole', [UserController::class, 'roleindex'])->name('users.roleindex');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //exits route
    Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
    Route::resource('orders', OrderController::class);



    // Route::post('user/location', [OrderController::class, 'store']);
    Route::post('user/location', function () {

        //     try {
        $latude = request()->input('latitude');
        $longitude = request()->input('longitude');

        //         Order::create([
        //             'latitude' => $latude,
        //             'longitude' => $longitude,
        //             'customer_name' => 'Jeffrey',
        //             'user_id' => 1,
        //             'address' => '123',
        //             'phone' => '123',
        //             'status' => 'pending',
        //             'payment_method' => 'cash',
        //         ]);

        //         return response()->json(['message' => 'Location saved']);
        //     } catch (Exception $e) {
        //         return response()->json(['message' => $e->getMessage()]);
        //     }
    });

    // Products Route below

    Route::get('/products', [ProductController::class, 'index'])->name("products.index");
    Route::get('/products/create', [ProductController::class, 'create'])->name("products.create");
    Route::get('/products/product_details', [ProductController::class, 'product_details'])->name("products.details");
    Route::post('/products', [ProductController::class, 'store'])->name("products.store");
    Route::get('/products/{product}', [ProductController::class, 'show'])->name("products.show");

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{product}', [ProductController::class, 'update'])->name("products.update");
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name("products.destroy");




    // pricelist Route below


    Route::get('/pricelists', [PricelistController::class, 'index'])->name("pricelists.index");
    Route::get('/pricelists/create', [PricelistController::class, 'create'])->name("pricelists.create");
    Route::post('/pricelists', [PricelistController::class, 'store'])->name("pricelists.store");

    Route::get('/pricelists/{id}/edit', [PricelistController::class, 'edit'])->name("pricelists.edit");
    Route::post('/pricelists/{id}', [PricelistController::class, 'update'])->name("pricelists.update");
    Route::delete('/pricelists/{id}', [PricelistController::class, 'destroy'])->name("pricelists.destroy");


    // order_to_invoice routes below

    Route::get('/orders_to_invoice', [OrdertoInvoiceController::class, 'index'])->name("orders_to_invoice.index");
    Route::get('/orders_to_invoice/create', [OrdertoInvoiceController::class, 'create'])->name("orders_to_invoice.create");

    Route::get('/orders_to_invoice/{id}/pdf', [OrdertoInvoiceController::class, 'downloadPdf'])->name("invoices.pdf");
    Route::get('/orders_to_invoice/{id}/export', [OrdertoInvoiceController::class, 'export'])->name("invoices.export");




    // customer routes below

    // Route::get('/customers', [CustomerController::class, 'index'])->name("customers.index");
    // Route::get('/customers/create', [CustomerController::class,'create'])->name("customers.create");
    // Route::post('/customers', [CustomerController::class,'store'])->name("customers.store");

    Route::resource('customers', CustomerController::class);

    // Route::get('/invoice/{order_id}', [OrdertoInvoiceController::class, 'createPdf'])->name("createInvoice");

    Route::get('/invoice/{order_id}', [OrdertoInvoiceController::class, 'downloadPdf'])->name("downloadPdf");

    Route::get('/notification/{product}/{notification}', [NotificationController::class, 'showForUpdating'])->name("products.pricelist");
});
