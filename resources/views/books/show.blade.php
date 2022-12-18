@extends('layouts.app')


@section('title',$book->name)


@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <dl class="row fs-5">
                        <dt class="col-md-3">{{__('appword.namebook')}}:</dt>
                        <dd class="col-md-9">{{$book->name}}</dd>
                        <dt class="col-md-3">{{__('appword.author')}}:</dt>
                        <dd class="col-md-9">{{$book->author}}</dd>
                        <dt class="col-md-3">{{__('appword.bookyear')}}:</dt>
                        <dd class="col-md-9">{{$book->year}}</dd>
                        <dt class="col-md-3">{{__('appword.description')}}:</dt>
                        <dd class="col-md-9">{{$book->{'description_'.app()->getLocale()} }}</dd>

                        <a href="{{asset($book->document)}}" class="text-center mt-4"><i class="bi bi-file-earmark-arrow-down"> </i>{{__('appword.download')}}</a>

                    </dl>
                </h5>
                @can('update',$book)
                <div class="col d-md-flex justify-content-between">
                    <a href="{{route('books.edit', $book->id)}}" class="btn btn-outline-success text-uppercase"
                       style="letter-spacing: 2px">{{__('appword.edit')}}</a><br><br>
                    <form action="{{route('books.destroy', $book->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger text-uppercase" style="letter-spacing: 2px">{{__('appword.delete')}}</button>
                    </form>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
