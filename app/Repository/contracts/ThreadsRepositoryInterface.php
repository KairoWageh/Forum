<?php
namespace App\Repository\contracts;
use Illuminate\Http\Request;

/**
 * Interface ThreadsRepositoryInterface
 * @package App\Repository\contracts
 */
interface ThreadsRepositoryInterface{
    /**
     * @param Request $request
     * @param $action
     * @return mixed
     */
    function store(Request $request, $action);
}
