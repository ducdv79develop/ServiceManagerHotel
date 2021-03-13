<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Repositories\BaseEloquent;

class AdminEloquent extends BaseEloquent implements AdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function getModel(): string
    {
        return Admin::class;
    }
}
