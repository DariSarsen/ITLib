@extends('layouts.app')

@section('title','Categories')

@section('content')
    <div class="container">
        <div class="row">

            <div class="pagetitle">
                <h1>Categories List</h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg">
                        <div class="my-3">
                            @can('create', \App\Models\Category::class)
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addcategory">
                                Add New Category
                            </button>

                            <div class="modal fade" id="addcategory" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('categories.store')}}"
                                              method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add New Category</h5>
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="col-sm-9 mx-auto">
                                                    <input required type="text" value="{{old('name')}}" placeholder="Enter Name.."
                                                           class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <button class="btn btn-primary">Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                        <!-- Small tables -->
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date Added</th>
                                <th scope="col">Update Date</th>
                                @can('create',\App\Models\Category::class)
                                <th scope="col">EDIT</th>
                                <th scope="col" width="6%">DELETE</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>

                            @for($i =0; $i < count($categoriess); $i++)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$categoriess[$i]->name}}</td>
                                    <td>{{$categoriess[$i]->created_at}}</td>
                                    <td>{{$categoriess[$i]->updated_at}}</td>
                                    @can('update', $categoriess[$i])
                                    <td>

                                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{$i}}">
                                            EDIT
                                        </button>
                                        <div class="modal fade" id="edit{{$i}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('categories.update',$categoriess[$i]->id)}}" method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Name</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <input required type="text" value="{{old('name')}}" placeholder="Enter New Name.."
                                                                   class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                                                            @error('name')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close
                                                            </button>
                                                            <button class="btn btn-primary">Edit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    @endcan
                                    @can('delete', $categoriess[$i])
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{$i}}">
                                            DELETE
                                        </button>
                                        <div class="modal fade" id="delete{{$i}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('categories.destroy',$categoriess[$i]->id)}}"
                                                          method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Category {{$categoriess[$i]->name}}</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="text-center">
                                                                Are you sure?
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No
                                                            </button>
                                                            <button class="btn btn-primary">Yes, delete
                                                            </button>
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
            </section>
        </div>
    </div>
@endsection
