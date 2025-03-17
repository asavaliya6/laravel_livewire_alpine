<div class="max-w-2xl mx-auto bg-gray-900 p-6 rounded-lg shadow-lg text-white">

    <!-- Add Comment Form -->
    <div class="mb-4">
        <textarea 
            wire:model="content" 
            class="w-full p-3 border border-gray-600 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add a comment"
        ></textarea>
        <button 
            wire:click="addComment"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 mt-2 rounded w-full"
        >
            Add Comment
        </button>
    </div>

    <!-- Comments List -->
    @foreach($comments as $comment)
        <div class="p-4 border border-gray-700 rounded mb-4 bg-gray-800">
            @if($editId === $comment->id)
                <textarea 
                    wire:model="editContent.{{ $comment->id }}" 
                    class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white"
                ></textarea>
                <button 
                    wire:click="updateComment({{ $comment->id }})" 
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 mt-2 rounded"
                >
                    Update
                </button>
            @else
                <p class="text-lg text-gray-300">{{ $comment->content }}</p>
                <div class="flex space-x-4 mt-2">
                    <button 
                        wire:click="editComment({{ $comment->id }})" 
                        class="text-blue-400 hover:text-blue-500"
                    >
                        Edit
                    </button>
                    <button 
                        wire:click="deleteComment({{ $comment->id }})" 
                        class="text-red-400 hover:text-red-500"
                    >
                        Delete
                    </button>
                </div>
            @endif

            <!-- Reply Section -->
            <div class="mt-4">
                <textarea 
                    wire:model.defer="replyContent.{{ $comment->id }}" 
                    class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white"
                    placeholder="Write a reply..."
                ></textarea>
                <button 
                    wire:click="addReply({{ $comment->id }})"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 mt-2 rounded w-full"
                >
                    Reply
                </button>
            </div>

            <!-- Display Replies -->
            @if($comment->replies->count())
                <div class="ml-4 mt-3 space-y-2">
                    @foreach($comment->replies as $reply)
                        <div class="p-3 border-l-4 border-blue-500 bg-gray-700 rounded">
                            <p class="text-gray-300">{{ $reply->content }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</div>
