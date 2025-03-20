<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-white mb-6">Voting System</h1>

    <div 
        x-data="{ show: false, message: '' }"
        @vote-success.window="show = true; message = $event.detail; setTimeout(() => show = false, 3000)"
        x-show="show"
        class="bg-green-500 text-white text-center p-3 rounded-lg mb-4"
        style="display: none;"
    >
        Vote added successfully for <strong x-text="message"></strong>!
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($votings as $voting)
            <div class="bg-white shadow-md rounded-lg p-4 border">
                <h2 class="font-bold text-lg text-black">{{ $voting->candidate_name }}</h2>
                <p class="text-gray-600">Votes: {{ $voting->votes }}</p>

                <button 
                    wire:click="vote({{ $voting->id }})"
                    class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Vote
                </button>
            </div>
        @endforeach
    </div>
</div>
