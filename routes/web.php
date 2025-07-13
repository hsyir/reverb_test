<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-message', function (Request $request) {
    $request->validate(['message' => 'required|string']);
    broadcast(new MessageSent($request->input('message')))->toOthers();

    return response()->json(['status' => 'Message sent!']);
});


Route::get('/test', function () {
    broadcast(new \App\Events\MessageSent('hello'));
    return 'sent';
});
