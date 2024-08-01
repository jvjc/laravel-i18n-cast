<?php

use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $products = Product::with('translations')->get();
    $locale = Session::get('locale', Config::get('app.locale'));
    App::setLocale($locale);

    return view('welcome', compact('products'));
});

Route::get('/api/{locale}/products', function ($locale) {
    App::setLocale($locale);

    $products = Product::with('translations')->get();

    return response()->json($products);
})->where('locale', 'en|es');

Route::post('/switch-language', function () {
    Session::put('locale', request('locale', 'es'));

    return back();
})->name('switch-language');
