<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use App\Events\MessageSentSecond;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/notify', function (Request $request) {
    $message = $request->input('message', 'پیامی دریافت نشد');
    event(new MessageSent($message));

    return response()->json(['status' => 'sent']);
});

Route::post('/notify2', function (Request $request) {
    $message = $request->input('message', 'پیامی دasdasdasdasdasdasdasdasdریافت نشد');
    broadcast(new MessageSentSecond($message))->via("reverb2");

    return response()->json(['status' => 'senq2323d32dt']);
});
