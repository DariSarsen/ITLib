@extends('layouts.app')

@section('title','Trash books')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Small tables -->
            <table class="table table-sm">
                <thead class="text-uppercase">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('appword.namebook')}}</th>
                    <th scope="col">{{__('appword.author')}}</th>
                    <th scope="col">{{__('appword.bookyear')}}</th>
                    <th scope="col">{{__('appword.deleted at')}}</th>
                    @can('viewTrash', \App\Models\Book::class)
                        <th scope="col"></th>
                        <th scope="col" width="6%"></th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @for($i =0; $i < count($books); $i++)
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$books[$i]->name}}</td>
                        <td>{{$books[$i]->author}}</td>
                        <td>{{$books[$i]->year}}</td>
                        <td>{{$books[$i]->deleted_at}}</td>
                        @can('restore', $books[$i])
                            <td>
                                <form action="{{route('books.restore',$books[$i]->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-success btn-sm text-uppercase">
                                        {{__('appword.restore')}}
                                    </button>
                                </form>
                            </td>
                        @endcan
                        @can('forceDelete', $books[$i])
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm text-uppercase" data-bs-toggle="modal"
                                        data-bs-target="#delete{{$i}}">
                                    {{__('appword.delete')}}
                                </button>
                                <div class="modal fade" id="delete{{$i}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('books.forceDelete',$books[$i]->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{__('appword.forcedelete')}}</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="text-center">
                                                        {{__('appword.areyousure')}}?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{__('appword.no')}}
                                                    </button>
                                                    <button class="btn btn-danger">{{__('appword.confirmdelete')}}</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endfor
                </tbody>
            </table>
            <!-- End small tables -->
        </div>
    </div>
@endsection


