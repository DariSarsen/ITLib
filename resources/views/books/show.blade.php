@extends('layouts.app')


@section('title',$book->name)


@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <dl class="row fs-5">
                        <dt class="col-md-3">Название:</dt>
                        <dd class="col-md-9">{{$book->name}}</dd>
                        <dt class="col-md-3">Автор:</dt>
                        <dd class="col-md-9">{{$book->author}}</dd>
                        <dt class="col-md-3">Год издания:</dt>
                        <dd class="col-md-9">{{$book->year}}</dd>
                        <dt class="col-md-3">Описание книги:</dt>
                        <dd class="col-md-9">{{$book->description}}</dd>
                        <a href="{{asset($book->document)}}" class="text-center mt-4"><i class="bi bi-file-earmark-arrow-down"> </i>Download this book </a>
                    </dl>
                </h5>
                @can('update',$book)
                <div class="col d-md-flex justify-content-between">
                    <a href="{{route('books.edit', $book->id)}}" class="btn btn-outline-success"
                       style="letter-spacing: 2px">EDIT BOOK</a><br><br>
                    <form action="{{route('books.destroy', $book->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" style="letter-spacing: 2px">DELETE</button>
                    </form>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
