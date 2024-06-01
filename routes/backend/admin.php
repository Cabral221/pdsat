<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ImputationController;
use App\Domains\Auth\Http\Controllers\Backend\AccountController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('imputations', [ImputationController::class , 'index'])->name('imputations.index');
Route::delete('imputations/{imputation}', [ImputationController::class, 'delete'])->name('imputations.delete');
Route::get('imputations/{imputation}', [ImputationController::class, 'show'])->name('imputations.show');
Route::post('imputations/{imputation}/load', [ImputationController::class, 'load'])->name('imputations.load');
Route::get('imputations/{imputation}/resend', [ImputationController::class, 'resend'])->name('imputations.resend');

Route::post('imputations/{imputation}', [ImputationController::class, 'activeRequest'])->name('imputations.active');
Route::get('imputations/{imputation}/print', [ImputationController::class, 'print'])->name('imputations.print');
Route::get('imputations/{imputation}/download', [ImputationController::class, 'download'])->name('imputations.download');

Route::get('missions', [MissionController::class , 'index'])->name('missions.index');

Route::get('accounts', [AccountController::class, 'index'])->name('account.index');
Route::get('accounts/{account}', [AccountController::class, 'show'])->name('account.show');

Route::get('services', [ServiceController::class , 'index'])->name('services.index');
Route::post('services', [ServiceController::class , 'store'])->name('services.store');
