<?php

namespace App\Http\Controllers;

use App\Repository\contracts\RepliesRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Thread;

class RepliesController extends Controller
{
    protected $reply;

    /**
     * RepliesController constructor.
     * @param RepliesRepositoryInterface $reply
     */
    public function __construct(RepliesRepositoryInterface $reply)
    {
        $this->middleware('auth');
        $this->reply = $reply;
    }

    /**
     * @param $channelId
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($channelId, Thread $thread){
        $this->validate(request(), ['body' => 'required']);
        $thread->addReply([
           'body'    => request('body'),
           'user_id' => auth()->id()
        ]);
        return back();
    }
}
