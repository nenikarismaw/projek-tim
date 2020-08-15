<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user', 'votes')->withCount('answers')->latest()->paginate(10);
        return view('pertanyaan.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'tag' => 'nullable',
        ]);

        $thread = new Question;
        $thread->user_id = auth()->user()->id;
        $thread->title = request('title');
        $thread->content = request('content');
        $thread->tag = request('tag');
        $thread->save();

        session()->flash('success', 'This question has been updated');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($questionId)
    {
        $question = Question::with('user', 'votes',
            'comments', 'comments.user',
            'answers', 'answers.comments', 'answers.comments.user')
            ->withCount('answers')->findOrFail($questionId);
        return view('pertanyaan.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($questionId)
    {
        $question = Question::with('user')->findOrFail($questionId);
        if ($question->user_id !== auth()->user()->id) {
            return abort(403);
        }
        return view('pertanyaan.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $questionId)
    {
        $question = Question::findOrFail($questionId);
        if ($question->user_id !== auth()->user()->id) {
            return abort(403);
        }

        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'tag' => 'nullable',
        ]);

        $question->title = request('title');
        $question->content = request('content');
        $question->tag = request('tag');
        $question->save();

        session()->flash('success', 'This question has been updated');
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($questionId)
    {
        $question = Question::findOrFail($questionId);
        if ($question->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $question->answers()->delete();
        $question->delete();

        session()->flash('success', 'Successfully Deleted');
        return redirect('/pertanyaan');
    }

    public function upvote($questionId)
    {
        $question = Question::findOrFail($questionId);
        $question->upvote();

        return redirect()->back();
    }

    public function downvote($questionId)
    {
        $question = Question::findOrFail($questionId);

        $user = auth()->user();
        $isAllowedToDownvote = $user->isAllowedToDownvote();
        if (!$isAllowedToDownvote) {
            Alert::toast("Sorry you can't downvote", 'error');
            return redirect()->back();
        }

        $question->downvote();
        return redirect()->back();
    }

    public function storeComment($questionId)
    {
        $question = Question::findOrFail($questionId);

        request()->validate([
            'content' => 'required',
        ]);

        $user = auth()->user();
        $question->addComment([
            'user_id' => $user->id,
            'content' => request('content'),
        ]);

        session()->flash('success', 'Comments have been saved');
        return redirect()->back();
    }
}
