<?php


namespace App\Http\Controllers;


use App\Models\Book;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller

{

    public function download(Book $book)
    {


        return redirect($book->document);
//        return back();

    }

}
