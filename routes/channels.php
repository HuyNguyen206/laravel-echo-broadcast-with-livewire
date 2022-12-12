<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('project-changed.{id}', function ($user, $id) {
//    return $user->belongToProject($id);
//});
Broadcast::channel('project-participant.{id}', function (\App\Models\User $user, $id) {
    if ($user->belongToProject($id)) {
        return $user->toArray();
    }
});
