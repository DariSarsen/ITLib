<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>403</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css', 'resources/js/main.js'])

</head>

<body>

<main>
    <div class="container">

        <section class="mt-4 d-flex flex-column align-items-center justify-content-center text-primary">
            <h1>403 {{__('appword.forbidden')}}</h1>
            <h2>{{__('appword.You don\'t have permission')}}.</h2>
            <a class="btn btn-outline-primary btn-sm mt-4" href="{{route('books.index')}}">{{__('appword.Back to home')}}</a>
            <img src="/img/not-found.svg" class="img-fluid py-5 col-9" alt="Page Not Found">
        </section>

    </div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>

