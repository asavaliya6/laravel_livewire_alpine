<div class="max-w-md mx-auto p-4 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-bold mb-4">User Profile Management</h2>

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded-md mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" wire:model="name" class="w-full p-2 border rounded-md">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <input type="email" wire:model="email" class="w-full p-2 border rounded-md" readonly>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Profile Image:</label>

            <input type="file" wire:model="image" x-ref="imageInput" @change="
                const reader = new FileReader();
                reader.onload = (e) => { $refs.imagePreview.src = e.target.result };
                reader.readAsDataURL($refs.imageInput.files[0]);
            " class="w-full p-2 border rounded-md">

            <!-- Image Preview -->
            <img x-ref="imagePreview"
                :src="'{{ $profileImage ? asset('storage/' . $profileImage) : '' }}'"
                class="mt-2 h-24 w-24 rounded-full">

            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Save Profile
        </button>
    </form>
</div>
