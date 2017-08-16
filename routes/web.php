<?php

Route::group(['prefix' => 'attribute', 'as' => 'attribute.', 'namespace' => 'Wuwx\LaravelAttribute\Controllers', 'middleware' => 'web'], function () {
    Route::resource('content_types', 'ContentTypesController');
    Route::resource('content_types.properties', 'PropertiesController');
});