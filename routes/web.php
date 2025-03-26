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
use App\Livewire\UserProfile;
use App\Models\User;
use App\Livewire\Chat;
use App\Livewire\FileCreate;


Route::view('/', 'welcome');

Route::get('dashboard', function(){
    return view('dashboard',[
        'users' => User::where('id','!=', auth()->id())->get(),
    ]);
})
->middleware(['auth','verified'])
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
Route::get('/profile', UserProfile::class)->name('profile');
Route::get('/chat/{user}',Chat::class)->name('chat');
Route::get('/files', FileCreate::class)->name('files');

require __DIR__.'/auth.php';
