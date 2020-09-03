@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Question Form -->
        <form action="/question" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Question Name -->
            <div class="form-group">
                <label for="question-body" class="col-sm-3 control-label">Ask your question</label>

                <div class="col-sm-6">
                    <input type="text" name="body" id="question-body" class="form-control">
                </div>
            </div>

            <!-- Add Question Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Question
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection