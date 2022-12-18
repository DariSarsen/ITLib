@extends('layouts.app')

@section('title','Edit Page')

@section('content')
    <div class="col-md-9 mx-auto">
        <div class="card">
            <div class="card-body pt-4">
                <form action="{{route('books.update',$book->id)}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="inputName" class="form-label">{{__('appword.namebook')}}:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" value="{{$book->name}}"
                                   class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                                   placeholder="{{__('appword.namebookplaceholder')}}.." required>
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="inputAuthor" class="form-label">{{__('appword.author')}}:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" value="{{$book->author}}"
                                   class="form-control @error('author') is-invalid @enderror" id="inputAuthor"
                                   name="author" placeholder="{{__('appword.nameauthor')}}.." required>
                            @error('author')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="inputName" class="form-label">{{__('appword.bookyear')}}:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="number" value="{{$book->year}}"
                                   class="form-control @error('year') is-invalid @enderror" id="inputName" name="year"
                                   min="1800" max="{{2022}}" step="1" required>
                            @error('year')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="category" class="form-label">{{__('appword.category')}}:</label>
                        </div>
                        <div class="col-sm-9">
                            <select name="category_id" id="category"
                                    class="form-select @error('category_id') is-invalid @enderror" required>
                                @foreach($categories as $cat)
                                    <option
                                        {{ $book->category_id == $cat->id ? 'selected' : '' }} value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="content" class="form-label">{{__('appword.description')}}(en):</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                      id="content" name="description_en" required>{{$book->description_en}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="content" class="form-label">{{__('appword.description')}}(ru):</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                      id="content" name="description_ru" required>{{$book->description_ru}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="content" class="form-label">{{__('appword.description')}}(kz):</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                      id="content" name="description_kz" required>{{$book->description_kz}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="document" class="col-sm-3 col-form-label">{{__('appword.file')}}:</label>
                        <div class="col-sm-9">
                            <input type="file" required id="document" class="form-control @error('document') is-invalid @enderror"
                                   name="document">
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col d-sm-flex justify-content-sm-center">
                        <button class="btn btn-outline-success" style="letter-spacing: 2px">{{__('appword.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


