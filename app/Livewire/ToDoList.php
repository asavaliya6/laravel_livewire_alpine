<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class ToDoList extends Component
{
    public $title, $description, $taskId;
    public $statusFilter = 'all';  // New status filter

    public function createTask()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'Pending', // Default status for new tasks
        ]);

        session()->flash('message', 'Task created successfully.');
        $this->resetFields();
    }

    public function loadTaskData($id)
    {
        $task = Task::find($id);

        if ($task) {
            $this->taskId = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
        }
    }

    public function updateTask()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = Task::find($this->taskId);

        if ($task) {
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);

            session()->flash('message', 'Task updated successfully.');
            $this->resetFields();
        } else {
            session()->flash('error', 'Task not found.');
        }
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
            session()->flash('message', 'Task deleted successfully.');
        } else {
            session()->flash('error', 'Task not found.');
        }
    }

    public function markAsCompleted($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->update(['status' => 'Completed']);
        }
    }

    public function resetFields()
    {
        $this->taskId = null;
        $this->title = '';
        $this->description = '';
    }

    public function render()
    {
        $tasks = Task::when($this->statusFilter !== 'all', function ($query) {
            $query->where('status', $this->statusFilter);
        })->get();

        return view('livewire.to-do-list', [
            'tasks' => $tasks
        ])->layout('layouts.app');
    }
}
