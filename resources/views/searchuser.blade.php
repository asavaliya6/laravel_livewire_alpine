<div class="space-y-4">
    <!-- Search Input -->
    <input 
        type="text" 
        placeholder="Search Users..." 
        x-data="{ search: @entangle('search') }"
        x-model="search"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
    />

    <!-- Results List -->
    <ul class="divide-y divide-gray-200 rounded-lg bg-gray-100">
        @forelse($users as $user)
            <li class="p-4 hover:bg-blue-100 transition">
                <span class="font-semibold">{{ $user->name }}</span> 
                <span class="text-gray-500">({{ $user->email }})</span>
            </li>
        @empty
            <li class="p-4 text-red-500 text-center">No users found.</li>
        @endforelse
    </ul>
</div>
