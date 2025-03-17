<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ToDoList;
use App\Http\Controllers\UserController;
use App\Livewire\UserSearch;
use App\Livewire\LogoutComponent;
use App\Livewire\Wizard;
use Livewire\Volt\Volt;
use App\Http\Controllers\LogoutController;
use App\Livewire\VotingSystem;
use App\Livewire\Comments;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/to-do-list', ToDoList::class)->middleware(['auth'])->name('to-do-list');
Route::get('/user-search', UserSearch::class)->name('user-search');
Route::get('/wizard-form', Wizard::class)->name('wizard-form');
Route::get('/voting', VotingSystem::class)->name('voting');
Route::get('/comments', Comments::class)->name('comments');

require __DIR__.'/auth.php';
