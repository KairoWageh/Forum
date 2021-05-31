<?php

namespace App\Repository\sql;

use App\Repository\contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
//    /**
//     * @param $result
//     * @param $messages
//     * @return mixed|void
//     */
//    public function sendResponse($result, $message)
//    {
//        $response = [
//            'success' => true,
//            'data'    => $result,
//            'message' => $message
//        ];
//        return response()->json($response, 200);
//    }
//
//    /**
//     * @param $error
//     * @param array $errorMessages
//     * @param int $code
//     * @return mixed|void
//     */
//    public function sendError($error, $errorMessages = [], $code = 404){
//        $response = [
//            'success' => false,
//            'message' => $error
//        ];
//
//        if(!empty($errorMessages)){
//            $response['data'] = $errorMessages;
//        }
//
//        return response()->json($response, $code);
//    }
    /**
     * @param $model
     * @return mixed
     */
    public function all($model)
    {
        return $model->all();
    }

    /**
     * @param $model
     * @return mixed
     */
    public function latest_records($model)
    {
        return $model::latest()->get();
    }

    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public function find($model, $id){
        return $model->find($id);
    }
}
