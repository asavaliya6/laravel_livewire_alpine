<div class="p-6">
    <input 
        type="text" 
        wire:model.debounce.300ms="search" 
        placeholder="Search by Name or Email..." 
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black"
    />

    @if($users->isEmpty())
        <p class="mt-4 text-gray-500 text-black">No users found.</p>
    @else
        <ul class="mt-4 space-y-2">
            @foreach($users as $user)
                <li class="p-3 bg-gray-800 text-white rounded-md shadow-md">
                    {{ $user->name }} - {{ $user->email }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
