<?php

namespace App\Repositories\Contracts;
/**
 * RepositoryInterface provides the standard functions to be expected of ANY 
 * repository.
 */
interface RepositoryInterface 
{
 
    public function all($columns = array('*'));
 
    public function paginate($perPage = 15, $columns = array('*'));
 
    public function create(array $data);
 
    public function update(array $data, $id);
 
    public function delete($id);
 
    public function find($id, $columns = array('*'));
 
    public function findBy($field, $value, $columns = array('*'));
}

?>
