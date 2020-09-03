<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $questions = Question::orderBy('created_at', 'desc')->get();
        
        $answer_count = array();

        $random_questions = array('What would you eat if you were stranded on a desert island?', 'Dont plants feel pain?', 'Where do you get your protein?', 'Lots of animals kill for food: why shouldn’t we?', ' Why not do something for people instead of animals?');

        for($i = 0; $i < count($questions); $i++)
        {
            if($questions[$i]->answers()->count())
            {
                $answer_count[$questions[$i]->id] = $questions[$i]->answers()->count();
            }else
            {
                $answer_count[$questions[$i]->id] = 0;
            }
            
        }

        return view('questions.index', [
            'questions' => $questions,
            'answer_count' => $answer_count,
            'random_question' => $random_questions[rand(0,4)]
        ]);

    }

    public function questionWithAnswers($question_id)
    {
        $question = Question::where('id', $question_id)->get();

        $answers = Answer::where('question_id', $question_id)->orderBy('created_at', 'asc')->get();

        return view('questions.question_with_answers', [
            'question' => $question,
            'answers' => $answers
        ]);
        
    }

}
