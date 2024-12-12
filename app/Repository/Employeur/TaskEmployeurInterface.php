<?php 

namespace App\Repository\Employeur;
use Illuminate\Http\Request;

interface TaskEmployeurInterface {
    public function storeFormation($request, $model);

    public function storeSubvention($request, $model);

    public function store($request,$model);

}