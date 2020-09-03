@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <div class="panel panel-success">
            <div class="panel-heading">
                <h3> Ask your question </h3>
            </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Question Form -->
            <div class="container"> 
                <form action="/question" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    
                    <!-- Question Name -->
                    <div class="form-group">
                        <!-- <label for="question-body" class="col-sm-3 control-label"> Your question</label> -->

                        <div class="col-sm-offset-2 col-sm-6 ">
                            <input type="text" name="body" id="question-body" class="form-control" value = "{{old('body')}}" placeholder="{{$random_question}}">
                        </div>
                    </div>

                    <!-- Add Question Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Question
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Current Questions with their answer counts -->
    @if (count($questions) > 0)
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3> Can you answer any of this questions? </h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped question-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Question</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                
                                    <div> <a href="/questions/{{$question->id}}">{{ $question->body }}</a> </div>
                                </td>

                                <td>
                                    <span class="badge badge-secondary"> <span class="badge badge-light"> {{ $answer_count[$question->id] }} </span> Answers</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    

    

@endsection