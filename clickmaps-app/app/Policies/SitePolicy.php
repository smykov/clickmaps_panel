<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Определяем, может ли данный пользователь удалить данную задачу.
     *
     * @param  User  $user
     * @param  Site  $site
     * @return bool
     */
    public function destroy(User $user, Site  $site)
    {
        return $user->id === $site->user_id;
    }
}
