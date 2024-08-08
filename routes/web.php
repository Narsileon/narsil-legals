<?php

#region USE

use Illuminate\Support\Facades\Route;
use Narsil\Legals\Http\Controllers\ImprintController;
use Narsil\Legals\Http\Controllers\PrivacyNoticeController;

#endregion

Route::middleware([
    'web'
])->group(function ()
{
    Route::get('imprint', ImprintController::class)
        ->name('imprint');
    Route::get('privacy-notice', PrivacyNoticeController::class)
        ->name('privacy-notice');
});
