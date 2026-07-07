<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function view(User $user, User $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, User $model): bool
    {
        // Admin pode editar qualquer um; o próprio usuário pode editar a si mesmo (ex: na página de perfil)
        return $user->is_admin || $user->id === $model->id;
    }

    public function delete(User $user, User $model): bool
    {
        // Apenas admin pode deletar outros usuários, e não pode deletar a si mesmo
        return $user->is_admin && $user->id !== $model->id;
    }

    public function restore(User $user, User $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function forceDelete(User $user, User $model): bool
    {
        return (bool) $user->is_admin;
    }
}
