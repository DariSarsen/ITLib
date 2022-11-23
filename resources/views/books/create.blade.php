@extends('layouts.app')

@section('title','Create Page')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10 mx-auto mb-5 pagetitle">
                <h1>Add new Book</h1>
            </div>
            <div class="col-lg-10 mx-auto p-5 rounded bg-white border border-light shadow-sm">

                <form action="{{route('books.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-3 col-form-label">Имя Книги:</label>
                        <div class="col-sm-9">
                            <input required type="text" value="{{old('name')}}"
                                   class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                                   placeholder="Введите имя книги..">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputAuthor" class="col-sm-3 col-form-label">Автор Книги:</label>
                        <div class="col-sm-9">
                            <input required type="text" value="{{old('author')}}"
                                   class="form-control @error('author') is-invalid @enderror" id="inputAuthor"
                                   name="author" placeholder="Автор книги..">
                            @error('author')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-3 col-form-label">Год выпуска издания:</label>
                        <div class="col-sm-9">
                            <input required type="number" value="{{old('year') != null ? old('year') : 2022}}"
                                   class="form-control @error('year') is-invalid @enderror" id="inputNumber"
                                   name="year" min="1800" max="{{2022}}" step="1">
                            @error('year')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Категория:</label>
                        <div class="col-sm-9">
                            <select required class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                    aria-label="Default select example">
                                <option {{ !isset($book->category_id) ? 'selected' : '' }} disabled>Выберите
                                    категорию..
                                </option>

                                @foreach($categories as $cat)
                                    <option
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }} value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="desc" class="col-sm-3 col-form-label">Описание:</label>
                        <div class="col-sm-9">
                            <textarea required id="desc" class="form-control @error('description') is-invalid @enderror" rows="5"
                                      name="description" placeholder="Описание книги.."> {{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-4">
                            <button class="btn btn-outline-success mt-4 w-100"> C R E A T E</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection


