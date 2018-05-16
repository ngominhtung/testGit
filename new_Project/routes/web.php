<?php

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
Route::get('home', function(){
	return 'Hihi';
});
Route::get('login', function(){
	return view('welcome');
});
Route::get('schema/create', function(){

	Schema::create('khoapham', function($table){
		$table->increments('id');
		$table->string('tenmonhoc');
		$table->integer('gia');
		$table->text('ghichu')->nullable();
		// timestamps tao 2 truong la created_at: tao luc nao 
		//va update_at: sua luc nao de quan ly du lieu
		// tham khao cac loai du lieu tai https://laravel.com/docs/5.6/migrations
		$table->timestamps();
	});
});
Route::get('schema/chang-col-attr',function(){
	Schema::table('khoapham',function($table){
		$table->string('tenmonhoc',50)->change();
	});
});
Route::get('schema/select-all-table',function(){
	$data = DB::table('khoapham')->get();
	echo '<pre>';
	print_r($data);
	echo '</pre>';
});
Route::get('schema/select-oneCol-table',function(){
	$data = DB::table('khoapham')->select('tenmonhoc')->get();
	echo '<pre>';
	print_r($data);
	echo '</pre>';
});