<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:5|regex:[?]$',
        ]);

        

        // $request->user()->tasks()->create([
        //     'name' => $request->name,
        // ]);

        // return redirect('/tasks');
    }
}
