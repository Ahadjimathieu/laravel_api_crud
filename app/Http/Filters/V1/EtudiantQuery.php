<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;
use App\Http\Filters\ApiFilter;
Class EtudiantQuery  extends ApiFilter{

    protected $safeParams = [
        'nom' => ['eq'],
        'prenom' => ['eq'],
        'adresse' => ['eq'],
    ];
    protected $columnMap = [
    ];
    protected $operatorMap = [
        'eq' => '=',
    ];


}


?>
