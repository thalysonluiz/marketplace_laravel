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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::get('/model', function () {

  // $user = new \App\User();
  // $user->name = "Teste";
  // $user->email = "teste@teste.com";
  // $user->password = bcrypt(123456);

  // $user->save();

  // return view('welcome');

  //Pegar loja de user
  // $user = \App\User::find(11);

  // $store = $user->store; //O objeto unico

  // $products = \App\Store::find(1)->products()->where('id', 1)->get(); //Especificar
  // $products = \App\Store::find(1)->products; // Todos

  // $categoria = \App\Category::find(1)->products; // Todos produtos daquela categoria

  //Criar loja para um usuario
  // $user = \App\User::find(10);
  // $store = $user->store()->create([
  //     'name' => 'Loja Teste',
  //     'description' => 'Loja de Informática',
  //     'phone' => 'XX-XXXXX-XXXX',
  //     'slug' => 'loja-teste',
  // ]);
  // dd($store);

  //Criar produto para uma loja
  // $store2 = \App\Store::find(11);
  // $products = $store2->products()->create([
  //     'name' => 'Notebook DELL 2',
  //     'description' => 'Core i5, 8Gb ram',
  //     'body' => 'algo',
  //     'price' => 2999.90,
  //     'slug' => 'notebook-dell-2',
  // ]);
  // dd($products);

  //Criar uma categoria
  // \App\Category::create([
  //     'name' => 'Games',
  //     'description' => 'games',
  //     'slug' => 'games'
  // ]);

  // \App\Category::create([
  //     'name' => 'Notebooks',
  //     'description' => 'Notebooks',
  //     'slug' => 'notebooks'
  // ]);

  // return \App\Category::all();

  //Adicionar um produto a uma categoria e vice-versa
  //$product = \App\Product::find(11);
  //$product->categories()->attach([1]); //sync([1, 2])

  //return $products;
});

Route::group(['middleware' => ['auth']], function () {
  Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::prefix('stores')->name('stores.')->group(function () {
      Route::get('/', 'StoreController@index')->name('index');
      Route::get('/create', 'StoreController@create')->name('create');
      Route::post('/store', 'StoreController@store')->name('store');
      Route::get('/{id}/edit', 'StoreController@edit')->name('edit');
      Route::post('/update/{id}', 'StoreController@update')->name('update');
      Route::get('/destroy/{id}', 'StoreController@destroy')->name('destroy');
    });

    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');

    Route::post('/photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');