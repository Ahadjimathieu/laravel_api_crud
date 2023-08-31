<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

Class ApiFilter {

    protected $safeParams = [];
    protected $columnMap = [
    ];
    protected $operatorMap = [];
    public function transform(Request $request){

        $finalArray = [];
        foreach($this->safeParams as $param =>$operators){
            $query = $request->query($param);

            if(!isset($query)){
                continue;
            }

            $colum = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {

                if(isset($query[$operator])){
                    $finalArray [] = [$colum, $this->operatorMap[$operator],$query[$operator]];
                }
                # code...
            }
        }



        return $finalArray;

    }
}


?>
