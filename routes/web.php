<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/*練習1:設定Route回傳View
Route::get('/',function (){
    return view('welcome')
});
*/

//練習1:設定Route回傳字串
Route::get('/',function (){
    return 'welcome';
});

//練習1:設定Route跳轉路由
Route::get('r1',function (){
    return redirect('r2');
});

Route::get('r2',function (){
    return view('welcome');
});

/*練習2:設定Route接受參數
Route::get('hello/{name}',function ($name){
    return 'Hello, '.$name;
});
*/
//練習2:設定參數成選擇性
Route::get('hello/{name?}',function ($name='Everybody'){
    return'Hello, '.$name;
})->name('hello.index');      //練習4:為Route命名(將練習2的路由命名為hello.index)

//練習3:測試artisan指令新增route
Route::get('welcome/{name}',function ($name){
    return 'welcome, '.$name;
});

//練習5:設定dashboard路徑的Route
Route::get('dashboard',function (){
    return'dashboard';
});

//練習5:設定另一個Route以群組包起來設定prefix
Route::group(['prefix' => 'admin'],function (){
    Route::get('dashboard',function (){
        return 'admin dashboard';
    });
});

//練習7:將Route的內容搬至Controller內
Route::get('home',[HomeController::class,'index'])->name('home.index');
