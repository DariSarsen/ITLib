@extends('layouts.app')

@section('title','Categories')

@section('content')
    <div class="container">
        <div class="row">

            <div class="pagetitle">
                <h1>{{__('appword.Categories List')}}</h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg">
                        <div class="my-3">
                            @can('create', \App\Models\Category::class)
                            <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addcategory">
                                {{__('appword.Add New Category')}}
                            </button>

                            <div class="modal fade" id="addcategory" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('categories.store')}}"
                                              method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{__('appword.Add New Category')}}</h5>
                                                <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="col-sm-9 mx-auto">
                                                    <input required type="text" value="{{old('name')}}" placeholder="{{__('appword.Enter Name')}}.."
                                                           class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">{{__('appword.close')}}
                                                </button>
                                                <button class="btn btn-primary">{{__('appword.add')}}
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
                                <th scope="col">{{__('appword.name')}}</th>
                                <th scope="col">{{__('appword.Date Added')}}</th>
                                <th scope="col">{{__('appword.Update Date')}}</th>
                                @can('create',\App\Models\Category::class)
                                <th scope="col">{{__('appword.Editing')}}</th>
                                <th scope="col" width="6%">{{__('appword.deletion')}}</th>
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

                                        <button type="button" class="btn btn-outline-info btn-sm text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#edit{{$i}}">
                                            {{__('appword.edit')}}
                                        </button>
                                        <div class="modal fade" id="edit{{$i}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('categories.update',$categoriess[$i]->id)}}" method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{__('appword.Name Editing')}}</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <input required type="text" value="{{old('name')}}" placeholder="{{__('appword.Enter New Name')}}.."
                                                                   class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                                                            @error('name')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary text-capitalize"
                                                                    data-bs-dismiss="modal">{{__('appword.close')}}
                                                            </button>
                                                            <button class="btn btn-primary text-capitalize">{{__('appword.edit')}}
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
                                        <button type="button" class="btn btn-outline-info btn-sm text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#delete{{$i}}">
                                            {{__('appword.delete')}}
                                        </button>
                                        <div class="modal fade" id="delete{{$i}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('categories.destroy',$categoriess[$i]->id)}}"
                                                          method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{__('appword.Delete Category')}} {{$categoriess[$i]->name}}</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="text-center">
                                                                {{__('appword.areyousure')}}?
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">{{__('appword.no')}}
                                                            </button>
                                                            <button class="btn btn-primary">{{__('appword.confirmdelete')}}
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
