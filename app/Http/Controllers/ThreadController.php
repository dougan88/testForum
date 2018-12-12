<?php

namespace App\Http\Controllers;

use App\Rules\DotEnd;
use App\Rules\NoNumbers;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userThreads()
    {
        return view('list-threads', ['threads' => Thread::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()]);
    }

    public function allThreads()
    {
        return view('all-threads', ['threads' => Thread::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('add-thread');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateThread($request);

        $threadFields = array_merge($request->toArray(), [
            'user_id' => Auth::user()->id
        ]);
        $thread = Thread::create($threadFields);

        $thread->save();

        return redirect('view-thread/' . $thread->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('view-thread', ['thread' => $thread]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('edit-thread', ['thread' => $thread]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $validatedData = $this->validateThread($request);

        $thread->title = $request->get('title');
        $thread->content = $request->get('content');
        $thread->save();

        return view('view-thread', ['thread' => $thread]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        try{
            $thread->delete();
        } catch (\Exception $exception) {
        }

        return redirect('list-threads');
    }

    private function validateThread(Request $request)
    {
        return $request->validate([
            'title' => [
                'required',
                'unique:threads',
                'min:3',
                'max:255',
                new NoNumbers()
            ],
            'content' => [
                'max:255',
                new DotEnd(),
            ]
        ]);
    }
}
