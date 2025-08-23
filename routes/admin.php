<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\ServiceCategory;
use App\Http\Controllers\admin\stateController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\userServiceProvider\ServicesController;

// admin
    Route::group(['middleware' => ['auth','checkType:admin']], function () {

        Route::get('/', [adminController::class, 'index'])->name('admin.home');

        // users

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UsersController::class, 'users'])->name('admin.users');
            Route::get('/active/{id}', [UsersController::class, 'activation'])->name('admin.user.active');
        
        });

                //crud category of service
                Route::group(['prefix' => 'category'], function () {
                    Route::get('/', [ServiceCategory::class, 'index'])->name('categories');
                    Route::get('/create', [ServiceCategory::class, 'create'])->name('category.create');
                    Route::post('/store', [ServiceCategory::class, 'store'])->name('category.store');
                    Route::get('/edit/{id}', [ServiceCategory::class, 'edit'])->name('category.edit');
                    Route::post('/update/{id?}', [ServiceCategory::class, 'update'])->name('category.update');
                    Route::get('/delete/{id}', [ServiceCategory::class, 'destroy'])->name('category.del');

        
                });

                Route::group(['prefix' => 'services'], function () {
                    Route::get('/', [ServicesController::class, 'services'])->name('admin.services');
                });

        // Setting Routs
        Route::group(['prefix' => 'settings'], function () {
            
            Route::prefix('cities')->group(function () {       
                Route::get('/', [CityController::class, 'index'])->name('cities');
                Route::post('/store', [CityController::class, 'store'])->name('cities.add');
                Route::post('/update', [CityController::class, 'update'])->name('cities.update');
                Route::get('/delete/{id}', [CityController::class, 'destroy'])->name('cities.delete');
                Route::get('/active/{id}', [CityController::class, 'activation'])->name('admin.city.active');
            });

            // Route::get('/city', [CityController::class, 'create'])->name('add-city');
            // Route::post('/city/store', [CityController::class, 'store'])->name('store-city');
            // Route::get('/city/edit/{id}', [CityController::class, 'edit'])->name('edit-city');
            // Route::post('/city/update/{id}', [CityController::class, 'update'])->name('update-city');
            // Route::get('/city/active/{id}', [CityController::class, 'active'])->name('active.city');

            Route::get('/states', [stateController::class, 'index'])->name('states');
            Route::post('/state/store', [stateController::class, 'store'])->name('states.add');
            Route::post('/state/update', [stateController::class, 'update'])->name('states.update');
            Route::get('/state/delete/{id}', [stateController::class, 'destroy'])->name('states.delete');
            Route::get('/active/{id}', [stateController::class, 'activation'])->name('admin.state.active');

        });




        Route::group(['prefix' => 'payments'], function () {
            Route::get('/', [PaymentController::class, 'index'])->name('payments');
            Route::post('/paymentCheck', [PaymentController::class, 'paymentCheck'])->name('payments.paymentCheck');
        
        });



        Route::group(['prefix' => 'reports'], function () {
            Route::get('/', [adminController::class, 'reports'])->name('reports');
            Route::get('/show/{id}', [adminController::class, 'reportShow'])->name('report.show');

            
            });

        // //crud advertisement
        // Route::group(['prefix' => 'advertisement'], function () {
        //     Route::get('/index', [AdvertisementController::class, 'index'])->name('show.adv');
        //     Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('edit.adv');
        //     Route::post('/update/{id}', [AdvertisementController::class, 'update'])->name('update.adv');
        //     Route::post('/save', [AdvertisementController::class, 'store'])->name('save.adv');
        //     Route::get('/add', [AdvertisementController::class, 'create'])->name('add.adv');
        //     Route::get('/delete/{id}', [AdvertisementController::class, 'delete'])->name('delete.adv');
        //     Route::get('/active/{id}', [AdvertisementController::class, 'active'])->name('active.adv');

        // });





    });
// end dashboard