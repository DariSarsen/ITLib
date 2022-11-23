@extends('layouts.app')

@section('title','Trash books')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Small tables -->
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Year</th>
                    <th scope="col">Deleted at</th>
                    @can('viewTrash', \App\Models\Book::class)
                        <th scope="col">RESTORE</th>
                        <th scope="col" width="6%">DELETE</th>
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
                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                        RESTORE
                                    </button>
                                </form>
                            </td>
                        @endcan
                        @can('forceDelete', $books[$i])
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{$i}}">
                                    DELETE
                                </button>
                                <div class="modal fade" id="delete{{$i}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('books.forceDelete',$books[$i]->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete without the possibility of
                                                        recovery</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="text-center">
                                                        Are you sure?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No
                                                    </button>
                                                    <button class="btn btn-danger">Yes, delete</button>
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


