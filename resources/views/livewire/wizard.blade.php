<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">

    @if(!empty($successMessage))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">{{ $successMessage }}</div>
    @endif

    <div class="flex justify-between items-center border-b-2 pb-2 mb-4">
        <div @class(['font-bold text-blue-500' => $currentStep == 1])>Step 1</div>
        <div @class(['font-bold text-blue-500' => $currentStep == 2])>Step 2</div>
        <div @class(['font-bold text-blue-500' => $currentStep == 3])>Step 3</div>
    </div>

    <!-- Step 1 -->
    @if($currentStep == 1)
    <div>
        <h3 class="text-lg font-semibold mb-4">Step 1: Product Information</h3>

        <div class="mb-4">
            <label class="block text-sm font-medium">Product Name:</label>
            <input type="text" wire:model="name" class="w-full p-2 border border-gray-300 rounded-md">
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Product Amount:</label>
            <input type="text" wire:model="amount" class="w-full p-2 border border-gray-300 rounded-md">
            <x-input-error :messages="$errors->get('amount')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Product Description:</label>
            <textarea wire:model="description" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            <x-input-error :messages="$errors->get('description')" />
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                wire:click.prevent="firstStepSubmit">
            Next
        </button>
    </div>
    @endif

    <!-- Step 2 -->
    @if($currentStep == 2)
    <div>
        <h3 class="text-lg font-semibold mb-4">Step 2: Product Status</h3>

        <div class="mb-4">
            <label class="block text-sm font-medium">Product Status:</label>
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" wire:model="status" value="1" @checked($status == '1')> Active
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" wire:model="status" value="0" @checked($status == '0')> DeActive
                </label>
            </div>
            <x-input-error :messages="$errors->get('status')" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Product Stock:</label>
            <input type="text" wire:model="stock" class="w-full p-2 border border-gray-300 rounded-md">
            <x-input-error :messages="$errors->get('stock')" />
        </div>

        <div class="flex gap-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                    wire:click.prevent="secondStepSubmit">
                Next
            </button>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                    wire:click.prevent="back(1)">
                Back
            </button>
        </div>
    </div>
    @endif

    <!-- Step 3 -->
    @if($currentStep == 3)
    <div>
        <h3 class="text-lg font-semibold mb-4">Step 3: Review Product Details</h3>

        <table class="table-auto w-full border-collapse border border-gray-200 mb-4">
            <tbody>
                <tr>
                    <td class="p-2 border">Product Name:</td>
                    <td class="p-2 border font-semibold">{{ $name }}</td>
                </tr>
                <tr>
                    <td class="p-2 border">Product Amount:</td>
                    <td class="p-2 border font-semibold">{{ $amount }}</td>
                </tr>
                <tr>
                    <td class="p-2 border">Product Status:</td>
                    <td class="p-2 border font-semibold">{{ $status ? 'Active' : 'DeActive' }}</td>
                </tr>
                <tr>
                    <td class="p-2 border">Product Description:</td>
                    <td class="p-2 border font-semibold">{{ $description }}</td>
                </tr>
                <tr>
                    <td class="p-2 border">Product Stock:</td>
                    <td class="p-2 border font-semibold">{{ $stock }}</td>
                </tr>
            </tbody>
        </table>

        <div class="flex gap-4">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600"
                    wire:click.prevent="submitForm">
                Finish!
            </button>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                    wire:click.prevent="back(2)">
                Back
            </button>
        </div>
    </div>
    @endif
</div>
