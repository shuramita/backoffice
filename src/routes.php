<?php
Route::prefix('backoffice')
    ->middleware(['web','backoffice','cors'])
    ->namespace('Shura\BackOffice\Controllers')
    ->group(function () {
        Route::get('/home', function(){
                            return '-^^-';
                   })->name('backoffice');

        Route::get('/dashboard', 'BackOfficeController@dashboard')->name('backoffice.dashboard');
        Route::get('/setting', 'BackOfficeController@setting')->name('backoffice.setting');
});
Route::prefix('api/backoffice')
    ->middleware(['web','auth:api','cors'])
    ->namespace('Shura\BackOffice\Controllers\API')
    ->group(function () {
        Route::get('navigation', 'NavigationController@index');
    });
