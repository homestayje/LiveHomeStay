<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','CouponController@index')->name('coupon.user.index');
Route::get('/create','CouponController@create')->name('coupon.user.create');
Route::get('/edit/{id}','CouponController@edit')->name('coupon.user.edit');
Route::post('/store/{id}','CouponController@store')->name('coupon.user.store');
Route::post('/bulkEdit','CouponController@bulkEdit')->name('coupon.user.bulkEdit');
Route::get('/get_services', 'CouponController@getServiceForSelect2')->name('coupon.admin.getServices');