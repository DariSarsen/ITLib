@extends('layouts.app')

@section('title','Users in ITL')

@section('content')
    <div class="container">
        <div class="row">

            <div class="pagetitle">
                <h1>Users List</h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg">

                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Auth Date</th>
                                <th scope="col">Update Date</th>

                                @can('editUser', \App\Models\User::class)
                                    <th scope="col">Change Role</th>
                                    <th scope="col">BAN</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>

                            @for($i =0; $i < count($users); $i++)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$users[$i]->name}}</td>
                                    <td>{{$users[$i]->email}}</td>
                                    <td>{{$users[$i]->role->name}}</td>
                                    <td>{{$users[$i]->created_at}}</td>
                                    <td>{{$users[$i]->updated_at}}</td>
                                    @can('update' , $users[$i])
                                        <td>
                                            <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#changeRole{{$i}}">
                                                Change
                                            </button>
                                            <div class="modal fade" id="changeRole{{$i}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{route('users.update',$users[$i]->id)}}"
                                                              method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Change Role of The
                                                                    User {{$users[$i]->name}}</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PUT')
                                                                <select name="role_id"
                                                                        class="form-select @error('role_id') is-invalid @enderror"
                                                                        required>
                                                                    @foreach($roles as $role)
                                                                        <option
                                                                            {{ $users[$i]->role_id == $role->id ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('role_id')
                                                                <div class="invalid-feedback">{{$message}}</div>
                                                                @enderror

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close
                                                                </button>
                                                                <button class="btn btn-primary">Change
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>

                                            <form
                                                action="@if($users[$i]->is_active) {{route('users.ban',$users[$i]->id)}} @else {{route('users.unban',$users[$i]->id)}} @endif"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button
                                                    class="btn btn-sm {{$users[$i]->is_active ? 'btn-outline-warning' : 'btn-outline-success'}}" {{$users[$i]->role->name == 'admin' ? 'disabled': ''}}>
                                                    {{$users[$i]->is_active ? 'Ban' : 'Unban'}}
                                                </button>

                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endfor
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
