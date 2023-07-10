<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\ThumbnailController;
use App\Http\Controllers\Panel\UploadController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\BlogController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ReferenceController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\TagController;
use App\Http\Controllers\Panel\BrandController;
use App\Http\Controllers\Panel\MenuController;
use App\Http\Controllers\Panel\MessageController;
use App\Http\Controllers\Panel\ServiceController;
use App\Http\Controllers\Panel\LogController;
use App\Http\Controllers\Panel\TranslateController;
use App\Http\Controllers\Panel\SettingsController;
use App\Http\Controllers\Panel\TeamController;
use App\Http\Controllers\Panel\PageController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\BankAccountController;
use App\Http\Controllers\Panel\CouponController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\PermissionController;

Route::get('changeLang/{lang}', [HomeController::class, 'changeLang'])->name('panel.change.lang');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('panel.login');
    Route::get('logout', 'logout')->name('panel.logout');
    Route::post('login', 'checkLogin')->name('panel.auth');

    Route::prefix('forgot-password')->group(function(){
        Route::post('mail', 'sendMail')->name('panel.forgot-password.mail');
        Route::get('reset/{token?}', 'reset')->name('panel.forgot-password.page');
        Route::post('reset', 'checkForgot')->name('panel.forgot-password.check');
    });
});

Route::middleware(['isLogged'])->group(function (){
    Route::get('/', [HomeController::class, 'dashboard'])->name('panel.root');

    Route::controller(ThumbnailController::class)->group(function () {
        Route::get('thumbnail/{module}/{uid}/{lang}', 'thumbnail')->name('panel.thumbnail');
        Route::post('submitThumbnail', 'submit')->name('panel.submit-thumbnail');
    });

    Route::controller(UploadController::class)->group(function () {
        Route::post('uploadThumbnail', 'uploadThumbnail')->name('panel.upload-thumbnail');
        Route::post('uploadContentImg', 'uploadContentImg')->name('panel.content-img-upload');
    });

    Route::controller(UserController::class)->prefix('users')->group(function (){
        Route::middleware('checkPermission:management,read')->group(function (){
            Route::get('/', 'list')->name('panel.users');
            Route::get('edit/{id}', 'edit')->name('panel.users.edit');
        });
        Route::middleware('checkPermission:management,write')->group(function (){
            Route::get('add', 'add')->name('panel.users.add');
            Route::post('action', 'action')->name('panel.users.action');
        });
    });

    Route::controller(PermissionController::class)->prefix('permission')->group(function (){
        Route::middleware('checkPermission:management,read')->group(function (){
            Route::get('/', 'list')->name('panel.permission');
            Route::get('edit/{id}', 'edit')->name('panel.permission.edit');
        });
        Route::middleware('checkPermission:management,write')->group(function (){
            Route::get('add', 'add')->name('panel.permission.add');
            Route::post('action', 'action')->name('panel.permission.action');
        });
    });

    Route::get('/log', [LogController::class, 'list'])->middleware('checkPermission:management,read')->name('panel.log');

    Route::controller(BlogController::class)->prefix('blog')->group(function () {
        Route::middleware('checkPermission:/blog,read')->group(function (){
            Route::get('/', 'list')->name('panel.blog');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.blog.edit');
        });
        Route::middleware('checkPermission:/blog,write')->group(function (){
            Route::get('add', 'add')->name('panel.blog.add');
            Route::post('action', 'action')->name('panel.blog.action');
        });
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::middleware('checkPermission:/product,read')->group(function (){
            Route::get('/', 'list')->name('panel.product');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.product.edit');
        });
        Route::middleware('checkPermission:/product,write')->group(function (){
            Route::get('add', 'add')->name('panel.product.add');
            Route::post('action', 'action')->name('panel.product.action');
        });
    });

    Route::controller(ReferenceController::class)->prefix('reference')->group(function (){
        Route::middleware('checkPermission:/reference,read')->group(function (){
            Route::get('/', 'list')->name('panel.reference');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.reference.edit');
        });
        Route::middleware('checkPermission:/reference,write')->group(function (){
            Route::get('add', 'add')->name('panel.reference.add');
            Route::post('action', 'action')->name('panel.reference.action');
        });
    });

    Route::controller(CategoryController::class)->prefix('category')->group(function (){
        Route::middleware('checkPermission:/category,read')->group(function (){
            Route::get('/', 'list')->name('panel.category');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.category.edit');
        });
        Route::middleware('checkPermission:/category,write')->group(function (){
            Route::get('add', 'add')->name('panel.category.add');
            Route::post('action', 'action')->name('panel.category.action');
        });
    });

    Route::controller(TagController::class)->prefix('tag')->group(function (){
        Route::middleware('checkPermission:/tag,read')->group(function (){
            Route::get('/', 'list')->name('panel.tag');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.tag.edit');
        });
        Route::middleware('checkPermission:/tag,write')->group(function (){
            Route::get('add', 'add')->name('panel.tag.add');
            Route::post('action', 'action')->name('panel.tag.action');
        });
    });

    Route::controller(BrandController::class)->prefix('brand')->group(function (){
        Route::middleware('checkPermission:/brand,read')->group(function (){
            Route::get('/', 'list')->name('panel.brand');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.brand.edit');
        });
        Route::middleware('checkPermission:/brand,write')->group(function (){
            Route::get('add', 'add')->name('panel.brand.add');
            Route::post('action', 'action')->name('panel.brand.action');
        });
    });

    Route::controller(MenuController::class)->prefix('menu')->group(function (){
        Route::middleware('checkPermission:/menu,read')->group(function (){
            Route::get('/', 'list')->name('panel.menu');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.menu.edit');
        });
        Route::middleware('checkPermission:/menu,write')->group(function (){
            Route::get('add', 'add')->name('panel.menu.add');
            Route::post('action', 'action')->name('panel.menu.action');
        });
    });

    Route::controller(MessageController::class)->prefix('message')->group(function (){
        Route::middleware('checkPermission:/message,read')->group(function (){
            Route::get('/', 'list')->name('panel.message');
            Route::get('browse/{id}', 'browse')->name('panel.message.browse');
        });
        Route::post('send', 'send')->name('panel.message.send');
    });

    Route::controller(PageController::class)->prefix('page')->group(function (){
        Route::middleware('checkPermission:/page,read')->group(function (){
            Route::get('/', 'list')->name('panel.page');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.page.edit');
        });
        Route::middleware('checkPermission:/page,write')->group(function (){
            Route::get('add', 'add')->name('panel.page.add');
            Route::post('action', 'action')->name('panel.page.action');
        });
    });

    Route::controller(ServiceController::class)->prefix('service')->group(function (){
        Route::middleware('checkPermission:/service,read')->group(function (){
            Route::get('/', 'list')->name('panel.service');
            Route::get('edit/{id}/{lang}', 'edit')->name('panel.service.edit');
        });
        Route::middleware('checkPermission:/service,write')->group(function (){
            Route::get('add', 'add')->name('panel.service.add');
            Route::post('action', 'action')->name('panel.service.action');
        });
    });

    Route::controller(TranslateController::class)->prefix('translate')->group(function (){
        Route::middleware('checkPermission:/translate,read')->group(function (){
            Route::get('/', 'list')->name('panel.translate');
            Route::get('edit/{key}', 'edit')->name('panel.translate.edit');
        });
        Route::middleware('checkPermission:/translate,write')->group(function (){
            Route::get('add', 'add')->name('panel.translate.add');
            Route::post('action', 'action')->name('panel.translate.action');
        });
    });

    Route::controller(SettingsController::class)->prefix('settings')->group(function (){
        Route::get('/', 'index')->middleware('checkPermission:/settings,read')->name('panel.settings');
        Route::middleware('checkPermission:/settings,write')->group(function (){
            Route::post('action', 'action')->name('panel.settings.action');
        });
    });

    Route::controller(TeamController::class)->prefix('team')->group(function (){
        Route::middleware('checkPermission:/team,read')->group(function (){
            Route::get('/', 'list')->name('panel.team');
            Route::get('edit/{id}', 'edit')->name('panel.team.edit');
        });
        Route::middleware('checkPermission:/team,write')->group(function (){
            Route::get('add', 'add')->name('panel.team.add');
            Route::post('action', 'action')->name('panel.team.action');
        });
    });

    Route::controller(CustomerController::class)->prefix('customer')->group(function (){
        Route::middleware('checkPermission:/customer,read')->group(function (){
            Route::get('/', 'list')->middleware('checkPermission:/customer,read')->name('panel.customer');
            Route::get('edit/{id}', 'edit')->name('panel.customer.edit');
        });
        Route::middleware('checkPermission:/customer,write')->group(function (){
            Route::post('action', 'action')->name('panel.customer.action');
        });
    });

    Route::controller(CouponController::class)->prefix('coupon')->group(function (){
        Route::middleware('checkPermission:/coupon,read')->group(function (){
            Route::get('/', 'list')->middleware('checkPermission:/coupon,read')->name('panel.coupon');
            Route::get('edit/{id}', 'edit')->name('panel.coupon.edit');
        });
        Route::middleware('checkPermission:/coupon,write')->group(function (){
            Route::get('add', 'add')->name('panel.coupon.add');
            Route::post('action', 'action')->name('panel.coupon.action');
        });
    });

    Route::controller(SliderController::class)->prefix('slider')->group(function (){
        Route::middleware('checkPermission:/slider,read')->group(function (){
            Route::get('/', 'list')->middleware('checkPermission:/slider,read')->name('panel.slider');
            Route::get('edit/{id}', 'edit')->name('panel.slider.edit');
        });
        Route::middleware('checkPermission:/slider,write')->group(function (){
            Route::get('add', 'add')->name('panel.slider.add');
            Route::post('action', 'action')->name('panel.slider.action');
        });
    });

    Route::controller(BankAccountController::class)->prefix('bank-accounts')->group(function (){
        Route::middleware('checkPermission:/bank-accounts,read')->group(function (){
            Route::get('/', 'list')->middleware('checkPermission:/bank-accounts,read')->name('panel.bank-accounts');
            Route::get('edit/{id}', 'edit')->name('panel.bank-accounts.edit');
        });
        Route::middleware('checkPermission:/bank-accounts,write')->group(function (){
            Route::get('add', 'add')->name('panel.bank-accounts.add');
            Route::post('action', 'action')->name('panel.bank-accounts.action');
        });
    });

    Route::controller(OrderController::class)->prefix('orders')->group(function (){
        Route::middleware('checkPermission:/orders,read')->group(function (){
            Route::get('/', 'list')->name('panel.orders');
            Route::get('browse/{id}', 'browse')->name('panel.orders.browse');
        });
        Route::middleware('checkPermission:/orders,write')->group(function (){
            Route::post('submitShippingNo', 'submitShippingNo')->name('panel.orders.shipping-num');
            Route::post('update', 'updateStat')->name('panel.orders.update');
        });
    });
});
