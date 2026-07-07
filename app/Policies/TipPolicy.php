<?php

namespace App\Policies;

use App\Models\Tip;
use App\Models\User;

class TipPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Tip $tip): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        // Admins e usuários comuns podem criar cards
        return ! $user->is_blocked;
    }

    public function update(User $user, Tip $tip): bool
    {
        // Admin pode editar qualquer card; dono pode editar o seu
        return $user->is_admin || $tip->user_id === $user->id;
    }

    public function delete(User $user, Tip $tip): bool
    {
        return $user->is_admin || $tip->user_id === $user->id;
    }

    public function restore(User $user, Tip $tip): bool
    {
        return $user->is_admin || $tip->user_id === $user->id;
    }

    public function forceDelete(User $user, Tip $tip): bool
    {
        // Somente admins podem deletar permanentemente
        return (bool) $user->is_admin;
    }
}
