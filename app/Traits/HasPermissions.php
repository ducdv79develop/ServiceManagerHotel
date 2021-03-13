<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use App\Models\Role;
use function GuzzleHttp\Promise\queue;

trait HasPermissions
{
    protected $permissionList;
    protected $guard;

    /**
     * @param string $guard
     */
    public function setGuard($guard): void
    {
        $this->guard = $guard;
    }

    /**
     * get role of guard
     * @return BelongsToMany
     */
    protected function role()
    {
        return $this->belongsTo(Role::Class, 'role_id');
    }

    /**
     * Does the role test exist?
     * @param $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->contains('name', $role);
        }

        return false;
    }

    /**
     * get all permission follow role of guard
     * @return Collection
     */
    private function getPermissions()
    {
        if (!empty($this->role)) {
            if (!$this->role->permissions($this->guard)->isEmpty()) {
                $this->permissionList = $this->role->permissions($this->guard);
            }
        }
        return $this->permissionList ? $this->permissionList : collect();
    }

    /**
     * Does the permission test exist?
     * @param null $permission
     * @return bool|int
     */
    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count();
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }
}
