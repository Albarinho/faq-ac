<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\AnswerNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Answer;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($question)
    {
        $answer = new Answer();
        $edit = FALSE;
        return view('answerForm', ['answer' => $answer, 'edit' => $edit, 'question' => $question]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(REQUEST $request, $question)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $question = Question::find($question);
        $Answer = new Answer($input);
        $Answer->user()->associate(Auth::user());
        $Answer->question()->associate($question);
        $Answer->save();
        /*
         * Send Email to the user that question has been answered
         *
         */
        $user=\auth()->user();
        $by=User::find($a->user_id);
        Mail::to($user->email)->send(new AnswerNotification($user,$question,$Answer,$by));
        return redirect()->route('question.show', ['question_id' => $question->id])->with('message', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $question, $answer)
    {
        $answer = Answer::find($answer);
        return view('answer')->with(['answer' => $answer, 'question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question, $answer)
    {
        $answer = Answer::find($answer);
        $edit = TRUE;
        return view('answerForm', ['answer' => $answer, 'edit' => $edit, 'question' => $question]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(REQUEST $request, $question, $answer)
    {

        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $answer = Answer::find($answer);
        $answer->body = $request->body;
        $answer->save();
        return redirect()->route('answer.show', ['question_id' => $question, 'answer_id' => $answer])->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question, $answer)
    {
        $answer = Answer::find($answer);
        $answer->delete();
        return redirect()->route('question.show', ['question_id' => $question])->with('message', 'Delete');
    }
}