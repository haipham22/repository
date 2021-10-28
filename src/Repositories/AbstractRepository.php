<?php


namespace haipham22\Repository\Repositories;


use haipham22\Repository\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryContract
 * @package haipham22\Repository\Contracts
 */
abstract class AbstractRepository extends \Torann\LaravelRepository\Repositories\AbstractRepository implements RepositoryContract
{
    /**
     * @param array|string $relations
     * @param null $callback
     * @return mixed
     */
    public function with($relations)
    {
        return $this->addScopeQuery(function (Builder $query) use ($relations) {
            return $query->with($relations);
        });
    }

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return Model|static
     */
    public function findOrCreate(array $attributes = [], array $values = [])
    {
        $this->newQuery();
        return $this->query->firstOrCreate($attributes, $values);
    }

    /**
     * Lock the selected rows in the table for updating.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function lockForUpdate()
    {
        return $this->addScopeQuery(function ($query) {
            return $query->lockForUpdate();
        });
    }
}
