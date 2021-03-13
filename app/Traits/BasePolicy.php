<?php

namespace App\Traits;

trait BasePolicy
{
    protected $model;

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * Determine whether the user can index the product.
     * @param $guard
     * @return bool
     */
    public function index($guard)
    {
        return ($guard && $guard->hasPermission('index_' . $this->model));
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param $guard
     * @return bool
     */
    public function view($guard)
    {
        return ($guard && $guard->hasPermission('review_' . $this->model));
    }

    /**
     * Determine whether the user can create products.
     *
     * @param $guard
     * @return bool
     */
    public function create($guard)
    {
        return ($guard && $guard->hasPermission('create_' . $this->model));
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param $guard
     * @return bool
     */
    public function update($guard)
    {
        return ($guard && $guard->hasPermission('update_' . $this->model));
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param $guard
     * @return bool
     */
    public function delete($guard)
    {
        return ($guard && $guard->hasPermission('delete_' . $this->model));
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param $guard
     * @return bool
     */
    public function restore($guard)
    {
        return ($guard && $guard->hasPermission('restore_' . $this->model));
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param $guard
     * @return bool
     */
    public function forceDelete($guard)
    {
        return ($guard && $guard->hasPermission('force_delete_' . $this->model));
    }
}
