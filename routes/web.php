<?php

 

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function(){
	/*
	*Category
	*/
	Route::group(['prefix' => '/categories'], function(){
		Route::get('/', 'Category\CategoryController@index')->name('category.index');

		Route::group(['prefix' => '/{category}'], function(){
			Route::get('/listings','Listing\ListingController@index')->name('listings.index');
		});
	});
	/*
		*listing
	*/
	Route::group(['prefix' => '/listing', 'namespace' => 'listing'], function(){
		Route::post('/{listing}/favourites','ListingFavouriteController@store')->name('listings.favourites.store');
	});

	Route::get('/{listing}', 'listing\ListingController@show')->name('listing.show');
});
 
