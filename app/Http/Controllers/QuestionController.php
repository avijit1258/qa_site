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
            'body' => 'required|min:5|regex:/[?]$/',
        ]);

        $question = new Question;
        $question->body = $request->body;
        $question->save();

        return redirect('/');
    }

    public function allQuestionsWithTheirAnswerCount()
    {
        $questions = Question::orderBy('created_at', 'asc')->get();
        
        $answer_count = array();

        for($i = 0; $i < count($questions); $i++)
        {
            $answer_count[$questions[$i]->id] = $questions[$i]->answers()->count();
        }

        return view('questions.index', [
            'questions' => $questions,
            'answer_count' => $answer_count
        ]);

    }

    public function questionWithAnswers($question_id)
    {
        $question = Question::where('id', $question_id)->get();

        $answers = Answer::where('question_id', $question_id)->order_by('created_at', 'desc')->all();

        return view('home', [
            'question' => $question,
            'answers' => $answers
        ]);
        
    }

}
