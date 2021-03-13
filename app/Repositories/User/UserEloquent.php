<?php

namespace App\Repositories\User;

use App\Repositories\BaseEloquent;
use App\Models\User;

class UserEloquent extends BaseEloquent implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function getModel(): string
    {
        return User::class;
    }
}
