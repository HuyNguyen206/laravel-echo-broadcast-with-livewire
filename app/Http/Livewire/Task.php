<?php

namespace App\Http\Livewire;

use App\Events\ProjectChanged;
use Livewire\Component;

class Task extends Component
{
//    protected $listeners = ['echo:App.Models.Project,TaskCreated' => 'refresh'];
    public $title;
    public $project;
    public $participants = [];
    public $edit = false;
    public $editTitle;
    public $editTask ;

    public function getListeners()
    {
        return [
            "echo-presence:project-participant.{$this->project->id},ProjectChanged" => 'refresh',
//            "echo-presence:project-participant.{$this->project->id},here" => 'refresh',
            "echo-presence:project-participant.{$this->project->id},here" => 'here',
            "echo-presence:project-participant.{$this->project->id},joining" => 'joining',
            "echo-presence:project-participant.{$this->project->id},leaving" => 'leaving',
            // Or:
//            "echo-presence:project-participant-changed.{$this->project->id},here" => 'notifyNewOrder',
        ];
    }

    public function render()
    {
        $tasks = $this->project->tasks()->paginate(100);
        return view('livewire.task', compact('tasks'));
    }

    public function store()
    {
        $task = \App\Models\Task::create([
            'title' => $this->title,
            'project_id' => $this->project->id
        ]);

        event((new ProjectChanged($task->project_id)));
    }

    public function here($users)
    {
        $this->participants = collect($users);
//        $this->render();
//        dump('all current user: '.json_encode(collect($users)->flatten(1)->pluck('name')->toArray()));
    }

    public function joining($user)
    {
        $this->participants = $this->participants->push($user);
//        $this->render();
//        dump('new join user: '.json_encode($user['user']['name']));
    }

    public function leaving($user)
    {
        $this->participants = $this->participants->filter(function ($participant) use($user) {
            return $participant['id'] !== $user['id'];
        });
//        $this->render();
//        dump('leaving user: '.json_encode($user['user']['name']));
    }

    public function refresh()
    {
        $this->render();
    }
}
