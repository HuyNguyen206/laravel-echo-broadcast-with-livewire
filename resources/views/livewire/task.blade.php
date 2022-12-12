<div>
    <h1>{{$project->title}}</h1>
    <div class="flex space-x-4">
        <div>
            <h2 class="font-semibold">List participants</h2>
            <ul>
                @foreach($participants as $user)
                    <li wire:key="{{$user['id']}}">{{$user['name']}}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2 class="font-semibold">List Task</h2>
            <ul>
                @foreach($tasks as $task)
                    <li class="flex">
                        {{$task->title}}
                        <livewire:edit-task wire:key="{{$task->id}}" :task="$task"/>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>


    <form wire:submit.prevent="store">
        <input type="text" wire:model="title" id="">
        <button type="submit">Store</button>
    </form>
</div>
