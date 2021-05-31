<?php
namespace App\Repository\sql;


use App\Http\Requests\ThreadRequest;
use Illuminate\Http\Request;
use App\Repository\contracts\ThreadsRepositoryInterface;
use App\Models\Thread;
use Illuminate\Support\Facades\Validator;

/**
 * Class ThreadsRepository
 * @package App\Repository\sql
 */
class ThreadsRepository extends BaseRepository implements ThreadsRepositoryInterface
{
    /**
     * @param Request $request
     * @param $action
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function store($request, $action)
    {
        $messages = [];
    return $request;
        $threadRequest = new ThreadRequest($action);
        $validator = Validator::make($request->all(), $threadRequest->rules(), $messages);
//        if($validator->fails()){
//            return $this->sendError('Validation error', $validator->errors());
//        }
        $thread = Thread::create([
            'user_id'    => auth()->id(),
            'channel_id' => request('channel_id'),
            'title'      => request('title'),
            'body'       => request('body')
        ]);

        return redirect($thread->path());
    }
}
