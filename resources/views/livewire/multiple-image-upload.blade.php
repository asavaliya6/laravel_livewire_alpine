<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="uploadImages">
        <input type="file" class="text-black" wire:model="images" multiple>
        @error('images.*') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Upload</button>
    </form>

    <br/><br/>
    <div wire:poll.1s>
        <h3 class="text-black">Uploaded Images:</h3>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            @foreach ($uploadedImages as $img)
                <img src="{{ asset('storage/' . $img->image) }}" width="100">
            @endforeach
        </div>
    </div>
</div>
