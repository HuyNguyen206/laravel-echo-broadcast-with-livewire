<?php

namespace App\Http\Livewire;

use App\Events\ProjectChanged;
use Livewire\Component;

class Task extends Component
{
//    protected $listeners = ['echo:App.Models.Project,TaskCreated' => 'refresh'];
    public $title;
    public $project;

    public function getListeners()
    {
        return [
            "echo-private:App.Models.Project.{$this->project->id},ProjectChanged" => 'refresh',
            // Or:
//            "echo-presence:tasks.{$this->orderId},OrderShipped" => 'notifyNewOrder',
        ];
    }

    public function render()
    {
        $tasks = $this->project->tasks()->paginate(5);
        return view('livewire.task', compact('tasks'));
    }

    public function store()
    {
        $task = \App\Models\Task::create([
            'title' => $this->title,
            'project_id' => $this->project->id
        ]);

        event((new ProjectChanged($task)));
    }

    public function refresh()
    {
        $this->render();
    }
}
