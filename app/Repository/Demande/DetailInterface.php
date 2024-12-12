<?php 

namespace App\Repository\Demande;
use Illuminate\Http\Request;

interface DetailInterface {
    public function show($model,$cod_demande);
}