<?php

namespace App\Http\Livewire;

use App\Events\ProjectChanged;
use Livewire\Component;

class EditTask extends Component
{
    public $edit = false;
    public $task;
    public $title;

    public function render()
    {
        return view('livewire.edit-task');
    }

    public function edit($taskId)
    {
        $this->edit = true;
        $this->title = $this->task->title;
    }

    public function update()
    {
        $this->task->update([
            'title' => $this->title
        ]);
        $this->edit = false;
        event((new ProjectChanged($this->task->project_id)));
    }


    public function delete($taskId)
    {
        $task = tap(\App\Models\Task::find($taskId))->delete();

        event((new ProjectChanged($task->project_id)));
    }

}
