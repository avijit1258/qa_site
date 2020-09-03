@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
        <div class="panel-heading">
           <h3> {{$question[0]->body}} </h3>
        </div>

        <div class="panel-body">
            @include('common.errors')
            <table class="table table-striped question-table">

                <!-- Table Body -->
                <tbody>
                    @foreach ($answers as $answer)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                
                                <div> {{ $answer->body }} </div>
                            
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <form action="/questions/{{$question[0]->id}}/answers" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Answer Name -->
                    <div class="form-group">
                        <label for="answer-body" class="col-sm-3 control-label">Answer this quesiton</label>

                        <div class="col-sm-6">
                            <input type="text" name="body" id="answer-body" class="form-control" value = "{{old('body')}}">
                        </div>
                    </div>

                    <!-- Add Answer Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Answer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

