<?php 
namespace App\Repositories\Criteria\Posts;
 
use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\Criteria;
 
class RecentPosts implements CriteriaInterface{
 
    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('id','6');

        return $query;
    }                        
}