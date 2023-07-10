<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;

Route::prefix('artisan')->group(function () {
    Route::get('optimize', function () {
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'APP_DEBUG='.'true', 'APP_DEBUG='.'false', file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'DEBUGBAR_ENABLED='.'true', 'DEBUGBAR_ENABLED='.'false', file_get_contents($path)
            ));
        }
        Artisan::call('optimize');
    });
    Route::get('route', function () { Artisan::call('route:clear'); });
});

Route::post('send-message', [ContactController::class, 'send'])->name('mesaj'); // form action
Route::get('{slug?}', [HomeController::class, 'index'])->name('AppRoot');
// Route::fallback(function () {
//     return view('404');
// });
