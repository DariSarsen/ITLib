@extends('layouts.app')

@section('title','Feedbacks')

@section('content')
    <div class="container">
        <div class="row">

            @if(isset($feedbacks))
                @foreach($feedbacks as $feedback)

                    <div class="col-md-10 mx-auto">
                        <div class="card w-100 shadow-sm">

                            <div class="card-body">
                                <div class="card-title w-100">
                                    <div>
                                        Title: {{$feedback->title}}
                                    </div>

                                </div>
                                <div>
                                    <b>Email: </b> <span class="card-text text-secondary">{{$feedback->email}}<br>
                                    </span>
                                    <b>Description: </b>{{$feedback->description}}
                                </div>
                            </div>
                            <div class="card-footer border-0 text-end">
                                <form action="{{route('feedbacks.destroy',$feedback->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">D E L E T E</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
