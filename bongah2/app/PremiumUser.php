<?php
/**
 * Created by PhpStorm.
 * User: NP
 * Date: 5/12/2018
 * Time: 5:54 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PremiumUser implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return $this|void
     */
    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
        return $builder->where('type','premium');
    }

    /**
     *
     */
//    protected static function boot()
//    {
//        parent::boot();
//        static::addGlobalScope(new PremiumUser);
//
//    }
}