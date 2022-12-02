<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return Response::view('contact');
});

Route::post('/contact', function(Request $request){
    dd($request->get('phone_number'));
});

Route::post('ejercicio2/a',function() {
    $product = [
        'name' => 'Keyboard',
        'description' => 'Mechanical RGB keyboard',
        'price' => 200
    ];
    return response()->json($product)->setStatusCode(200);
 });

Route::post('ejercicio2/b' ,function() {
    $product = [
        'name' => 'Keyboard',
        'description' => 'Mechanical RGB keyboard',
        'price' => -100
    ];
    
    if($product['price']<0){
        return response()->json(['message' => "Price can't be less than 0"])->setStatusCode(422);
    };
    
});
Route::post('/ejercicio2/c', function (FacadesRequest $request) {
            $discount = $request->query('discount');
    $price = $request->get('price');
    if (in_array($discount, ["SAVE5", "SAVE10", "SAVE15"])) {
        $discountValue = intval(substr($discount, 4));
        $price -= $request->get('price') * ($discountValue / 100);
    } else {
        $discountValue = 0;
    }
    return Response::json([
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'price' => $price,
        'discount' => $discountValue
    ]);
});