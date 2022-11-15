<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;

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

/*===================from LINK API========*/
Route::get('/insert-json', function(){
	$json = file_get_contents('https://kodepos-2d475.firebaseio.com/kota_kab/k69.json?print=pretty');
	$objs = json_decode($json,true);
	foreach ($objs as $obj)  {
		foreach ($obj as $key => $value) {
			$insertArr[$key] = $value;
		}
		DB::table('kab_kota')->insert($insertArr);
	}
	dd("Finished adding data in examples table");
});

Route::get('/insert-provinsi', function(){
	$json = file_get_contents('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
	$objs = json_decode($json,true);
	foreach ($objs as $obj)  {
		foreach ($obj as $key => $value) {
			$insertArr[$key] = $value;
		}
		DB::table('provinsi')->insert($insertArr);
	}
	dd("Finished adding data in examples table");
});

Route::get('/insert-covid', function(){
	$json = file_get_contents('https://data.covid19.go.id/public/api/prov.json');
	$objs = json_decode($json,true);
	foreach ((array)$objs as $obj)  {
		foreach ($obj as $key => $value) {
			$insertArr[$key] = $value;
		}
		DB::table('covid')->insert($insertArr);
	}
	dd("Finished adding data in examples table");
});
/*=================== end from LINK API========*/

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth'])->group(function(){
	Route::get('/warga',[WargaController::class,'index']);
	Route::get('/warga/create',[WargaController::class,'create']);
	Route::post('/warga/store',[WargaController::class,'store']);
	Route::get('/warga/{id}/edit',[WargaController::class,'edit']);
	Route::put('/warga/{id}',[WargaController::class,'update']);
	Route::delete('/warga/{id}',[WargaController::class,'destroy']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
