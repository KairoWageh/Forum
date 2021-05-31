<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Repository\contracts\ThreadsRepositoryInterface;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    protected $thread;

    /**
     * ThreadsController constructor.
     * @param ThreadsRepositoryInterface $thread
     */
    public function __construct(ThreadsRepositoryInterface $thread){
        $this->middleware('auth')->except(['index', 'show']);
        $this->thread = $thread;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$threads = Thread::latest()->get();
        $model = resolve(Thread::class);
        $threads = $this->thread->latest_records($model);
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $action = "store";
        $thread = $this->thread->store($request, $action);
        return $thread;
//        $thread = Thread::create([
//            'user_id' => auth()->id(),
//            'channel_id' => redirect('channel_id'),
//            'title'   => request('title'),
//            'body'    => request('body')
//        ]);
//
//        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param $channelId
     * @param \App\Models\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
