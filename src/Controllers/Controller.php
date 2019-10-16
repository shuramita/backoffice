<?php

namespace Shura\BackOffice\Controllers;

use App\Http\Controllers\Controller as AppController;

class Controller extends AppController
{
    public $namespace = 'BackOffice'; // registered in Service Provider

    function validationError($message){
        $validate = (object)[
            'error'=>(object) ['status'=>'ERROR','message'=>$message],
            'data'=>$message
        ];
        return response()->json($validate);
    }
    function jsonResponse($data,$message=""){
        $response = (object)[
            'error'=>(object) ['status'=>'OK','message'=>$message],
            'data'=>$data
        ];
        return response()->json($response);
    }
}
