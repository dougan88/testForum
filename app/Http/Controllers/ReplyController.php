<?php

namespace App\Http\Controllers;

use App\Thread;
use App\ThreadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function reply(Thread $thread)
    {
        return view('reply-thread', ['thread' => $thread]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'content' => [
                'required',
            ]
        ]);

        $threadResponseFields = array_merge($request->toArray(), [
            'user_id' => Auth::user()->id
        ]);

        $threadResponse = ThreadResponse::create($threadResponseFields);

        $threadResponse->save();

        return redirect('view-thread/' . $thread->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThreadResponse  $threadResponse
     * @return \Illuminate\Http\Response
     */
    public function show(ThreadResponse $threadResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreadResponse  $threadResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(ThreadResponse $threadResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThreadResponse  $threadResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThreadResponse $threadResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThreadResponse  $threadResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThreadResponse $threadResponse)
    {
        //
    }
}
