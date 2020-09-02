<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:5',
            'question_id' => 'required'
        ]);

        $answer = new Answer;
        $answer->body = $request->body;
        $answer->question_id = $request->question_id;
        $answer->save();

        return redirect('/');
    }
}
