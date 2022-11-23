<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::with('usersFavourite')->get();
        return view('books.index',['categories'=>Category::all(), 'books'=>$book]);

    }

    public function trashbooks()
    {
        $this->authorize('viewTrash', Book::class);
        return view('books.trash',['categories'=>Category::all() , 'books'=>Book::onlyTrashed()->get()]);
    }

    public function booksByCategory(Category $category)
    {
        return view('books.index',['categories'=>Category::all(), 'books'=>$category->books]);
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create',['categories'=>Category::all()]);
    }

    public function store(BookRequest $request)
    {
        $this->authorize('create', Book::class);

        Book::create($request->all());
        return back()->with('message','Books Created Successfully');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book'=>$book, 'categories' => Category::all()]);
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        return view('books.edit', ['book'=>$book, 'categories' => Category::all()]);
    }

    public function update(BookRequest $request, Book $book)
    {
        $this->authorize('update', $book);

        $book->update($request->all());
        return redirect()->route('books.show',$book->id)->with('message','Books Updated Successfully');
    }

    public function restore($id)
    {
        $book = Book::withTrashed()->find($id);
        $this->authorize('restore',$book);
        $book->restore();
        return redirect()->route('books.index')->with('message','The Book has been Restored!!!');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete',$book);
        $book->delete();
        return redirect()->route('books.index')->with('message','The Book was added to the Trash!!!');
    }

    public function forceDelete($id)
    {
        $book = Book::withTrashed()->find($id);
        $this->authorize('forceDelete',$book);

        $book->forceDelete();
        return redirect()->route('books.index')->with('message','Book Deleted from the DB!!!');
    }
}
