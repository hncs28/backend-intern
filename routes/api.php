<?php

use App\Http\Controllers\Front\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\EmployeeController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\CustomerController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\AuthController;

Route::get('employees/{employeeID}',[EmployeeController::class,'show']);
Route::get('employees', [EmployeeController::class, 'index']);
#Services
Route::get('getservices',[ServiceController::class,'index']);
Route::get('getservices/{serviceID}',[ServiceController::class,'show']);
#Order
Route::get('getorder',[OrderController::class, 'index']);
Route::get('getorder/{customerID}',[OrderController::class,'byUser']);
Route::post('submitorder',[OrderController::class, 'store']);
#Comment
Route::get('getcomment',[CommentController::class,'index']);
Route::post('storecomment',[CommentController::class,'store']);
#Customers
Route::get('getuser',[CustomerController::class,'getcustomer']);
#login
Route::post('login',[AuthController::class,'login']);
Route::post('register',[CustomerController::class,'store']);
#history
Route::get('history/{customerID}',[OrderController::class,'search']);