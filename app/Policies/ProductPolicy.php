<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_product');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->can('view_product');
    }

    public function create(User $user): bool
    {
        return $user->can('create_product');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->can('update_product');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->can('delete_product');
    }
}
