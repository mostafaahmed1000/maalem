<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/form1', function () {
    return view('form1');
});

Route::get('/form2', function () {
    return view('form2');
});

Route::get('/form3', function () {
    return view('form3');
});

Route::get('/mentor-details', function () {
    return view('mentor-details');
});

Route::get('/course-leadership', function () {
    return view('course-leadership');
});

Route::get('/course-operations', function () {
    return view('course-operations');
});

Route::get('/course-teaching', function () {
    return view('course-teaching');
});
