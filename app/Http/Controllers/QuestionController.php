<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:5|regex:[?]$',
        ]);

        $question = new Question;
        $question->body = $request->body;
        $question->save();

        return redirect('/');
    }
    
}
