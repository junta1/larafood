<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
    ->group(function () {

        /**
         * Plan x Profile
         */
        Route::get('plans/{id}/profile/{idProfile}/detach', 'Admin\ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', 'Admin\ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', 'Admin\ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', 'Admin\ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'Admin\ACL\PlanProfileController@plans')->name('profiles.plans');


        /**
         * Permission x Profile
         */
        Route::get('profiles/{id}/permissions/{idPermission}/detach', 'Admin\ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::post('profiles/{id}/permissions', 'Admin\ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', 'Admin\ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', 'Admin\ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profiles', 'Admin\ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Permissions
         */
        Route::any('permissions/search', 'Admin\ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'Admin\ACL\PermissionController');


        /**
         * Profiles
         */
        Route::any('profiles/search', 'Admin\ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'Admin\ACL\ProfileController');

        /**
         * Routes Details Plans
         */
        Route::get('plans/{url}/details/create', 'Admin\DetailsPlanController@create')->name('details.plan.create');
        Route::get('plans/{url}/details/{idDetail}/edit', 'Admin\DetailsPlanController@edit')->name('details.plan.edit');
        Route::put('plans/{url}/details/{idDetail}', 'Admin\DetailsPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details', 'Admin\DetailsPlanController@index')->name('details.plan.index');
        Route::post('plans/{url}/details', 'Admin\DetailsPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details/{idDetail}', 'Admin\DetailsPlanController@show')->name('details.plan.show');
        Route::delete('plans/{url}/details/{idDetail}', 'Admin\DetailsPlanController@destroy')->name('details.plan.destroy');

        /**
         * Routes Plans
         */
        Route::get('plans/create', 'Admin\PlanController@create')->name('plans.create');
        Route::get('plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
        Route::put('plans/{url}/update', 'Admin\PlanController@update')->name('plans.update');
        Route::any('plans/search', 'Admin\PlanController@search')->name('plans.search'); //ordem da rota influencia
        Route::get('plans', 'Admin\PlanController@index')->name('plans.index');
        Route::post('plans', 'Admin\PlanController@store')->name('plans.store');
        Route::get('plans/{url}', 'Admin\PlanController@show')->name('plans.show');
        Route::delete('plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');

        /**
         * Home Dashboard
         */
        Route::get('/', 'Admin\PlanController@index')->name('admin.index');
    });

Route::get('/', function () {
    // return view('welcome');
    return view('admin.pages.plans.index');
});
