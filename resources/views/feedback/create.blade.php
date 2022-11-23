@extends('layouts.app')

@section('title','Create Page')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10 mx-auto mb-5 pagetitle text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="darkblue" class="bi bi-patch-question-fill mb-3" viewBox="0 0 16 16">
                    <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z"/>
                </svg>
                <h1>Feedback</h1>
            </div>
            <div class="col-lg-10 mx-auto mb-3 p-5 rounded bg-white border border-light shadow-sm">

                <form action="{{route('feedbacks.store')}}" method="post">
                    @csrf


                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input required type="emali" value="{{old('email')}}"
                                   class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                   name="email">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-9">
                            <input required type="text" value="{{old('title')}}"
                                   class="form-control @error('title') is-invalid @enderror" id="inputName" name="title">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="desc" class="col-sm-3 col-form-label">Write a feedback or a question:</label>
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
                            <button class="btn btn-outline-success mt-4 w-100"> S E N D </button>
                        </div>
                    </div>

                </form>



            </div>
            <div class="col-lg-10 mx-auto my-5 pagetitle text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="darkblue" class="bi bi-info-circle-fill mb-3" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg>
                <h1>Contact Us</h1>
            </div>
            <div class="col-lg-10 mx-auto justify-content-between d-flex mt-2 fs-4">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    Our Phone: 8 777 777 77 77
                </div>
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                     Email: itlib@gmail.com
                </div>

            </div>

        </div>
    </div>
@endsection


