@extends('layouts.app')

@section('title','ITLib Home')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($books))
                @foreach($books as $book)

                    <div class="col-md-4 d-inline-flex">
                        <div class="card w-100 shadow-sm">

                            <div class="card-body">
                                <div class="card-title text-center d-inline-flex w-100 justify-content-between">
                                    <div>
                                        {{$book->name}} <span class="h5">({{$book->year}})</span>
                                    </div>
                                    <div>
                                        @can('editFavourites',\App\Models\Book::class)
                                        <form action="{{route('user.editFavourites',$book->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            @if(in_array($book->id,$favourites))
                                                <button class="bi bi-bookmark-fill bg-white border-0" title="{{ __('appword.deletefavourites') }}"></button>
                                            @else
                                                <button class="bi bi-bookmark bg-white border-0" title="{{ __('appword.addfavourites') }}"></button>
                                            @endif
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                                <div>
                                    <b>{{ __('appword.author') }}: </b> <span class="card-text text-secondary">{{$book->author}}<br>
                                    </span>
                                    <b>{{ __('appword.description') }}: </b><span class="card-text d-block text-truncate">{{$book->description}}</span>
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <a href="{{route('books.show', $book->id)}}"
                                   class="text-center d-block">{{ __('appword.inmoredetail') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
