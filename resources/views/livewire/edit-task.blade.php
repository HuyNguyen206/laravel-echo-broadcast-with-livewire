<div>
    @if ($edit)
        <form wire:submit.prevent="update">
            <input type="text" wire:model="title" id="">
            <button type="submit">Update</button>
        </form>
    @else
        <a wire:click.prevent="edit({{$task->id}})" class="text-orange-800" href="">Edit</a>
        <a class="text-red-400" wire:click.prevent='delete({{$task->id}})' href="">X</a>
    @endif
</div>
