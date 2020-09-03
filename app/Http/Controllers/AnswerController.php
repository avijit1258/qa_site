<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $question_id)
    {
        $this->validate($request, [
            'body' => 'required|min:5',
        ]);

        $answer = new Answer;
        $answer->body = $request->body;
        $answer->question_id = $question_id;
        $answer->save();

        return redirect()->back();
    }
}
