<?php

use App\Http\Controllers\PricelistController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('user/location', function (Request $request) {
//     $latude = $request->latitude;
//     $longitude = $request->longitude;

//     Order::create([
//         'latitude' => $latude,
//         'longitude' => $longitude
//     ]);

//     return response()->json(['message' => 'Location saved']);
// });
