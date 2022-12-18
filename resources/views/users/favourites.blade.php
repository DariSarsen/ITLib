@extends('layouts.app')

@section('title','My Favourite Books')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($books) == 0)
                <div class="text-center mt-3">
                    <h3>{{__('appword.favouritesmessage')}}<a href="{{route('books.index')}}">{{__('appword.homepage')}}.</a></h3>
                </div>
            @else
                @foreach($books as $book)

                    <div class="col-md-6 d-inline-flex">
                        <div class="card w-100 shadow-sm">

                            <div class="card-body">
                                <div class="card-title text-center d-inline-flex w-100 justify-content-between">
                                    <div>
                                        {{$book->name}} <span class="h5">({{$book->year}})</span>
                                    </div>
                                    <div>
                                        <form action="{{route('user.editFavourites',$book->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="bi bi-bookmark-fill bg-white border-0" title="{{__('appword.deletefavourites')}}"></button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    <b>{{__('appword.author')}}: </b> <span class="card-text text-secondary">{{$book->author}}<br>
                                    </span>
                                    <b>{{__('appword.description')}}: </b><span class="card-text d-block text-truncate">{{$book->description}}</span>
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <a href="{{route('books.show', $book->id)}}"
                                   class="text-center d-block">{{__('appword.inmoredetail')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
