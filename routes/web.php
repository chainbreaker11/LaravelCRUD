<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AnimeController;
Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/empleado ', function () {
    return view('empleado.index');
});

Route:: get('/empleado/create',[EmpleadoController::class,'create']);
*/
Route::resource('anime',AnimeController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [AnimeController::class, 'index'])->name('home');

Route:: group (['middleware'=> 'auth'],function(){
    
    Route::get('/',[AnimeController::class, 'index'])->name('home');

});