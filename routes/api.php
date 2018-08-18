<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => []], function() {

    // Tracking API routes
    Route::get('/tracking', 'Api\TrackingController@getTrackingData');

    // Images API routes
    Route::get('/images/{user}', 'Api\ImageController@getUserImages');

    Route::post('/images/{user}', 'Api\ImageController@storeUserImages');

    Route::post('/image/update/{image}', 'Api\ImageController@update');

    Route::get('/image/delete/{image}', 'Api\ImageController@delete');

    // Project imagesy
    Route::get('/images/project/{project}', 'Api\ProjectController@getProjectImages');

    // Get posts by user
    Route::get('/posts/user/{user}', 'Api\PostController@getUserPosts');

    Route::post('/schedule/user/{user}', 'Api\ScheduleController@storeSchedule');

    Route::get('/schedule/user/{user}', 'Api\ScheduleController@getUserSchedule');

    // Remove schedule from database
    Route::get('/schedule/remove/{schedule}', 'Api\ScheduleController@removeSchedule');

    // Get user social channels
    Route::get('/schedule/social-channels/user/{user}', 'Api\ScheduleController@getUserSocialChannels');

});
