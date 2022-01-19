<?php
use Illuminate\Support\Facades\Route;

Route::get('toyyibpay-status', 'ToyyibPayController@status')->name('toyyibpay-status');
Route::post('toyyibpay-callback', 'ToyyibPayController@callback')->name('toyyibpay-callback');
