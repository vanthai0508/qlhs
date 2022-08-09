<?php 
namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

interface EloquentInterface
{
    public function list();

    public function create($request);

    public function update(array $data , $id);

    public function delete($id);

    public function find($id);


}

?>