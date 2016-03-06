<?php

Route::get('/', 'Basiccontroller@index');
Route::get('about-us', 'Basiccontroller@about_us');
Route::get('services', 'Basiccontroller@services');
Route::get('portfolio', 'Basiccontroller@portfolio');
Route::get('blog','Basiccontroller@blog');
Route::get('contact','Basiccontroller@contact');

Route::get('register','Basiccontroller@register');
Route::post('register','Basiccontroller@register_submit');

Route::get('customer-list','Basiccontroller@customers_list');
Route::get('product-list','Basiccontroller@product_list');