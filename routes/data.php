<?php

// this route is used for get and set data from database


Route::get('/books','DataController@getBooks');
Route::post('/books','DataController@setBooks');
Route::get('/delete/{id}','DataController@deleteBooks');
Route::post('/update','DataController@updateBooks');
