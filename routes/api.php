<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/notify', function (Request $request) {
    $message = $request->input('message', 'پیامی دریافت نشد');
event(new MessageSent($message));

    return response()->json(['status' => 'sent']);
});
