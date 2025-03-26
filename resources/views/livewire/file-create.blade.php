<div>
    @if(session("success"))
        <div class="alert alert-success">{{ session("success") }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mt-3 text-center">
            <label>Name:</label>
            <input type="text" wire:model="name" class="form-control rounded bg-gray-800 text-white">
            @error("name")<span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mt-3 text-center">
            <label>Price:</label>
            <input type="number" wire:model="price" class="form-control rounded bg-gray-800">
            @error("price")<span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <br/>
        
        <div class="mt-3 text-center">
            <label>Choose Photo:</label>
            <br/><br/>
            <div 
                class="border p-6 text-center bg-light" 
                style="cursor: pointer; border: dashed;" 
                ondragover="event.preventDefault()" 
                ondrop="handleDrop(event)"
                id="dropArea"
            >
                <p>Drag & Drop file or click to browse</p>
                <input type="file" wire:model="photo" class="d-none" style="color: white" id="fileInput">

                @if($photo)
                <div class="mt-3">
                    <p><strong>Preview:</strong></p>
                    <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" style="max-width:150px;">
                </div>
                @endif
            </div>

            @error("photo")<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <br/>   
        <div class="mt-3 text-center">
            <button class="btn text-black rounded bg-white">
                Submit
            </button>
        </div>

    </form>
</div>

<script>
    function handleDrop(event) {
        event.preventDefault();
        @this.upload("photo", event.dataTransfer.files[0]);
    }

    document.getElementById("dropArea").addEventListener("click", function () {
        document.getElementById("fileInput").click();
    });
</script>
