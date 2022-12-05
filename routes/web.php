<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store');

Route::post('/ejercicio3', Function(Request $request){
    $request->validate([
            'name' => 'required | string | max:64',
            'description' => 'required | string | max:512',
            'price' => 'required | numeric | gt:0',
            'has_battery' => 'required | boolean',
            'battery_duration' => 'required_if:has_battery,true | numeric | gt:0',
            'colors' => 'required | array',
            'colors.*' => 'required | string',
            'dimensions' => 'required | array',
            'dimensions.width' => 'required | numeric | gt:0 ',
            'dimensions.height' => 'required | numeric | gt:0 ',
            'dimensions.length' => 'required | numeric | gt:0 ',
            'accessories' => 'required | array',
            'accessories.*' => 'required | array',
            'accessories.*.name' => 'required | string',
            'accessories.*.price' => 'required  | numeric| gt:0',
    ]);
    return response();
});
