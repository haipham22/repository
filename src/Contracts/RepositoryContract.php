<?php


namespace haipham22\Repository\Contracts;

use Torann\LaravelRepository\Contracts\RepositoryContract as BaseRepositoryContract;

/**
 * Interface RepositoryContract
 * @package haipham22\Repository\Contracts
 */
interface RepositoryContract extends BaseRepositoryContract
{
    /**
     * Set the relationships that should be eager loaded
     * @param  string|array  $relations
     * @return $this
     */
    public function with($relations);

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return Model|static
     */
    public function findOrCreate(array $attributes = [], array $values = []);
}
