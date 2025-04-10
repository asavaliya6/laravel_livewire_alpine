## install laravel breeze

- composer create-project laravel/laravel example-app
- Install Breeze `composer require laravel/breeze` `php artisan breeze:install` `php artisan migrate` `npm install` `npm run dev` `php artisan serve`(breeze install with Livewire(volt Class API) with Alpine)

## Dynamic To-Do List with Status Filtering

- Install Livewire `composer require livewire/livewire`
- Create Livewire Component `php artisan make:livewire TodoList`
- Create Migration & Model `php artisan make:migration create_tasks_table -m` `php artisan migrate`
- Implement Livewire Logic --> app/Http/Livewire/TodoList.php and Create Livewire View --> resources/views/livewire/todo-list.blade.php and Add route
- Include Livewire Scripts -->resources/views/layouts/app.blade.php:
- 1) add before the closing </body> tag 
`
@livewireScripts
<script src="//unpkg.com/alpinejs" defer></script>
`

- 2) add inside <head>

`
@livewireStyles
`

## Livewire Wizard Multi Step Form

- Create Migration and Model `php artisan make:migration create_products_table` `php artisan migrate` `php artisan make:model Product`
- Create Component `php artisan make:livewire wizard`
- Update Livewire Component Logic --> app/Livewire/Wizard.php and Create Livewire View --> resources/views/livewire/wizard.blade.php and Add route and Create View --> resources/views/default.blade.php (In this file use @livewireStyles, @livewireScripts, and @livewire('wizard')) and --> add public/wizard.css file

## Real-Time Voting system

- Install Livewire `composer require livewire/livewire` and publish Livewire `php artisan livewire:publish`
- Create Livewire Component `php artisan make:livewire VotingSystem`
- Create Migration and Model `php artisan make:migration create_votings_table --create=votings` `php artisan migrate` `php artisan make:Model Voting`
- Seed Data `php artisan make:seeder VotingSeeder` `php artisan db:seed --class=VotingSeeder`
- Build Livewire Component --> app/Http/Livewire/VotingSystem.php and Add View --> resources/views/livewire/voting-system.blade.php and Add Route

## Comments and Reply 

- Create Livewire Component `php artisan make:livewire Comments`
- Create Migration and Model `php artisan make:migration create_comments_table` `php artisan make:migration create_replies_table` `php artisan migrate` `php artisan make:Model Comment` `php artisan make:Model Reply`
- Build Livewire Component --> app/Http/Livewire/Comments.php and Add View --> resources/views/livewire/comments.blade.php and Add Route

## Upload profile image

- Create Livewire Component `php artisan make:livewire UserProfile`
- Create Profile Model and Migration `php artisan make:model Profile -m` `php artisan migrate` `php artisan migrate`
- Build Livewire Component --> app/Http/Livewire/UserProfile.php and Add View --> resources/views/livewire/user-profile.blade.php and Add Route
- Create Storage Link `php artisan storage:link`

## Realtime Chat application

- Create Model and Migration `php artisan make:model Message -m` `php artisan migrate`
- Create livewire Component `php artisan make:livewire Chat`
- Create view and update route and appserviceprovider

## Drag and drop with file upload

- Create Livewire Component `php artisan make:livewire FileCreate`
- Create Migration and Model `php artisan make:migration create_files_table` and `php artisan make:model File` and add route    

## Multiple Image Upload

- Create Livewire Component `php artisan make:livewire MultipleImageUpload`  
- Create Migration and Model `php artisan make:model Image -m` `php artisan migrate` and add route