<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
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

    public function allQuestionsWithTheirAnswerCount()
    {
        $questions = Question::order_by('created_at', 'asc')->get();
        
        $answer_count = array();

        for($i = 0; $i < count($questions); $i++)
        {
            $answer_count[$questions[$i]->id] = $questions[$i]->answers()->count();
        }

        return view('home', [
            'questions' => $questions,
            'answer_count' => $answer_count
        ]);

    }

}
