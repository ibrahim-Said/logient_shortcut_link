<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function successResponse($data,$code=200){
        $data=array_merge([
            'success'=>true,
            'error_message'=>'',
        ],$data);
        return $this->sendResponse($data,$code);
    }
    public function errorResponse($message,$code=200){
        $data=[
            'success'=>false,
            'error_message'=>''
        ];
        if(is_array($message)){
            $data=array_merge($data,$message);
        }else{
            $data['error_message']=$message;
        }
        return $this->sendResponse($data,$code);
    }
    public function sendResponse($data,$code=200){
        $header = array(
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json($data,$code,$header,JSON_UNESCAPED_UNICODE);
    }
    public function fileResponse($path,$mime_type){
        return response()->file(storage_path('app\\public\\' . $path),[
                'Content-Type' => $mime_type,
                'Content-Disposition' => 'inline; filename="Lesson-file"'
        ]);
    }
}
