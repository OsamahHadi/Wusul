<?php

use App\Models\User;
use App\Models\Work;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceCat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\site\OrderController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\userServiceProvider\WorkController;
use App\Http\Controllers\userServiceProvider\ServicesController;
use App\Http\Controllers\userServiceProvider\ServiceProviderController;

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

/**
 * website for user
 */


//  end sit

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::middleware(['checkType:serviceProvider'])->group(function () {
            Route::get('/services', [ProfileController::class, 'services'])->name('profile.service');
        });

            Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');

            //wallet
            Route::get('/wallet', [ProfileController::class, 'wallet'])->name('wallet');

        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/{id}/services', [ProfileController::class, 'showService'])->name('profile.service.show');
    });
    // Account Settings
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', [UsersController::class, 'account'])->name('account');
        Route::post('/update', [UsersController::class, 'update'])->name('account.update');
        Route::post('/image', [UsersController::class, 'saveImage'])->name('account.image');
        Route::get('/security', function () {
            return view('account.security');
        })->name('account_security');
        Route::post('/changePass', [UsersController::class, 'changePassword'])->name('account.changePass');
        Route::get('/social', [UsersController::class, 'social'])->name('account_social');
        Route::post('/social', [UsersController::class, 'updateSocial'])->name('account_updateSocial');
    });

        //crud order
        Route::group(['prefix' => 'order'], function () {
            Route::get('/create/{id}', [OrderController::class, 'create'])->name('order.create');
            Route::post('/send', [OrderController::class, 'send'])->name('order.send');
            Route::get('/show/{id?}', [OrderController::class, 'show'])->name('order.show');
            Route::post('/response', [OrderController::class, 'orderResponse'])->name('order.response');
            Route::post('/payment', [OrderController::class, 'payment'])->name('order.payment');
            Route::post('/orderConfirm', [OrderController::class, 'orderConfirm'])->name('order.orderConfirm');
            Route::post('/paymentCheck', [OrderController::class, 'paymentCheck'])->name('order.paymentCheck');
            Route::get('/', [OrderController::class, 'orders'])->name('orders');
            Route::get('/cancel/{id}', [OrderController::class, 'cancel'])->name('order.cancel');

        });


        Route::group(['prefix' => 'reports'], function () {
            Route::post('/add', [SiteController::class, 'addReport'])->name('reports.add');
            });

});
Route::get('/services', [SiteController::class, 'services'])->name('home.services');

Route::get('/test', function () {
    $categories = ServiceCat::all();

    return view('test', compact('categories'));

// );
});
Route::get('/test1', function () {
    $services = Service::where('user_id', Auth::id())->get();

    $work = Work::CheckOwner()->findOrFail(2);
    return view('testu', [
            'services' => $services,
            'work' => $work
        ]

    );
});
Route::get('/test2', function () {
    $category = ServiceCat::all();
    return view('tests', [
            'category' => $category
        ]

    );

});
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/contact', function () {
    return view('contact_us');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/activation', function () {
    return view('auth.activation');
})->name('activation');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//Route::get('/profile', function () {
//    return view('user.profile');
//})->name('profile')->middleware('auth');

Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/service/{id}', [SiteController::class, 'service'])->name('service.details');

Route::get('/l/l', function () {
    return view('admin.payment');
})->name('test');

// start routes of user that provide service
Route::group(['prefix' => 'serviceProvider',
'middleware' => ['checkType:serviceProvider','auth','verified']
        ],
        function () {

    Route::get('/', [ServiceProviderController::class, 'home'])->name('serviceProvider.home');

    //crud category of service
    Route::group(['prefix' => 'service'], function () {
        Route::get('/', [ServicesController::class, 'index'])->name('service');
        Route::get('/create', [ServicesController::class, 'create'])->name('service.create');
        Route::post('/store', [ServicesController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
        Route::post('/update/{id}', [ServicesController::class, 'update'])->name('service.update');
        Route::get('/delete/{id}', [ServicesController::class, 'destroy'])->name('service.delete');

    });

    // crud work
    Route::group(['prefix' => 'work'], function () {
        Route::get('/', [WorkController::class, 'index'])->name('work');
        Route::get('/create', [WorkController::class, 'create'])->name('work.create');
        Route::post('/store', [WorkController::class, 'store'])->name('work.store');
        Route::get('/edit/{id}', [WorkController::class, 'edit'])->name('work.edit');
        Route::post('/update/{id}', [WorkController::class, 'update'])->name('work.update');
        Route::get('/delete/{id}', [WorkController::class, 'destroy'])->name('work.delete');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::post('/receiveOrder', [PaymentController::class, 'receiveOrder'])->name('order.receiveOrder');
    });


});
// // orders
// Route::group(['prefix' => 'orders'], function () {
// });

// start routes of user that provide service
Route::group(['prefix' => 'admin', 'middleware' => 'checkType:admin'], function () {

});
