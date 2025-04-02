<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Reply;

class Comments extends Component
{
    public $content;
    public $comments;
    public $editId;
    public $editContent = [];
    public $replyContent = [];

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::with('replies')->get();
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create(['content' => $this->content]);
        $this->content = '';
        $this->loadComments(); 
    }

    public function addReply($commentId)
    {
        $this->validate([
            'replyContent.' . $commentId => 'required|string|max:255',
        ]);

        if (isset($this->replyContent[$commentId])) {
            Reply::create([
                'comment_id' => $commentId,
                'content' => $this->replyContent[$commentId],
            ]);

            $this->replyContent[$commentId] = ''; 
            $this->loadComments(); 
        }
    }

    public function editComment($commentId)
    {
        $this->editId = $commentId;
        $this->editContent[$commentId] = Comment::find($commentId)->content;
    }

    public function updateComment($commentId)
    {
        $this->validate([
            'editContent.' . $commentId => 'required|string|max:255',
        ]);

        Comment::find($commentId)->update(['content' => $this->editContent[$commentId]]);
        $this->editId = null;
        $this->loadComments();
    }

    public function deleteComment($commentId)
    {
        Comment::find($commentId)->delete();
        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.comments')->layout('layouts.app');
    }
}
