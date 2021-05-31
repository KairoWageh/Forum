<?php
namespace App\Repository\contracts;


/**
 * Interface BaseRepositoryInterface
 * @package App\Repository\contracts
 */
interface BaseRepositoryInterface
{
//    /**
//     * @param $result
//     * @param $message
//     * @return mixed
//     */
//    public function sendResponse($result, $message);
//
//    /**
//     * @param $error
//     * @param array $errorMessages
//     * @param int $code
//     * @return mixed
//     */
//    public function  sendError($error, $errorMessages = [], $code = 404);

    /**
     * @param $model
     * @return mixed
     */
    public function all($model);

    /**
     * @param $model
     * @return mixed
     */
    public function latest_records($model);
    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public function find($model, $id);
}
