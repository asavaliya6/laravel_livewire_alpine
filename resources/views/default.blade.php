<!DOCTYPE html>
<html>
<head>
    <title>Livewire Wizard Form</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('wizard.css') }}" rel="stylesheet" id="bootstrap-css">
</head>
<body>
     
<div class="container">
    
    <div class="card mt-5">
        <h3 class="card-header p-3">Livewire Wizard Form</h3>
        <div class="card-body">
            <livewire:wizard />
        </div>
    </div>
        
</div>
    
</body>
  
@livewireScripts
  
</html>
