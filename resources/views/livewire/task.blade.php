<div>
    <h>{{$project->title}}</h>
    <ul>
        @foreach($tasks as $task)
            <li wire:key="{{$task->id}}">{{$task->title}}</li>
        @endforeach
    </ul>
    <form wire:submit.prevent="store">
        <input type="text" wire:model="title" id="">
        <button type="submit">Store</button>
    </form>
</div>
