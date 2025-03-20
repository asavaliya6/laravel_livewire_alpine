<div class="p-6 bg-white rounded-lg shadow-md">

    <h2 class="text-2xl font-bold mb-4 text-black">
        {{ $taskId ? 'Edit Task' : 'Add New Task' }}
    </h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4 text-black">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4 text-black">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-4">
        <input 
            type="text"
            wire:model="title"
            placeholder="Task Title"
            class="w-full p-3 border border-gray-300 rounded-md text-black"
        />
    </div>

    <div class="mb-4">
        <textarea
            wire:model="description"
            placeholder="Task Description"
            class="w-full p-3 border border-gray-300 rounded-md text-black"
        ></textarea>
    </div>

    <!-- Add New Task Button -->
    @if(!$taskId)
        <button 
            wire:click="createTask"
            class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 text-black"
        >
            Add New Task
        </button>
    @endif

    @if($taskId)
        <button 
            wire:click="updateTask"
            class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 text-black"
        >
            Update Task
        </button>
    @endif

    <h2 class="text-2xl font-bold mt-6 mb-4 text-black">Task List</h2>

    <!-- Status Filter -->
    <div class="mb-4 flex space-x-4">
        <button 
            wire:click="$set('statusFilter', 'all')"
            class="px-4 py-2 bg-gray-500 rounded-md {{ $statusFilter === 'all' ? 'bg-blue-500 text-white' : '' }}">
            All
        </button>

        <button 
            wire:click="$set('statusFilter', 'Pending')"
            class="px-4 py-2 bg-gray-500 rounded-md {{ $statusFilter === 'Pending' ? 'bg-yellow-500 text-white' : '' }}">
            Pending
        </button>

        <button 
            wire:click="$set('statusFilter', 'Completed')"
            class="px-4 py-2 bg-gray-500 rounded-md {{ $statusFilter === 'Completed' ? 'bg-green-500 text-white' : '' }}">
            Completed
        </button>
    </div>

    <!-- Task List -->
    @foreach($tasks as $task)
    <div class="p-4 border rounded-md bg-gray-100 mb-2 flex items-center justify-between text-black">
        <div>
            <strong>{{ $task->title }}</strong> — {{ $task->description }} 
            <span class="{{ $task->status === 'Completed' ? 'text-green-500' : 'text-yellow-500' }}">
                ({{ $task->status }})
            </span>
        </div>

        <div class="flex space-x-2">
            <button 
                wire:click="loadTaskData({{ $task->id }})"
                class="bg-blue-500 text-white px-4 py-2 rounded-md"
            >
                Edit
            </button>

            <!-- Show "Mark as Completed" Button Only for Pending Tasks -->
            @if($task->status === 'Pending')
                <button 
                    wire:click="markAsCompleted({{ $task->id }})"
                    class="bg-green-500 text-white px-4 py-2 rounded-md"
                >
                Mark as Completed
                </button>
            @endif

            <button 
                wire:click="deleteTask({{ $task->id }})"
                class="bg-red-500 text-white px-4 py-2 rounded-md"
            >
                Delete
            </button>
        </div>
    </div>
@endforeach
</div>
