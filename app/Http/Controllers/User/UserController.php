<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//        $this->middleware('status');
//    }

    public function index(Request $request)
    {

        $users = null;
        if ($request->search_users) {
            $users = User::where('name', 'LIKE', '%' . $request->search_users . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search_users . '%')
                ->with('role')->get();

        } else {
            $users = User::with('role')->get();
        }
        return view('users.index', ['users' => $users, 'search' => 'users', 'roles' => Role::all()]);
    }

    public function profile()
    {
        return view('users.profile',['categories' => Category::all()]);
    }

    public function favourites()
    {
        $book = Auth::user()->favourites()->get();
        return view('users.favourites',['books' => $book, 'categories' => Category::all()]);
    }

    public function editFavourites(Book $book)
    {
        $this->authorize('editFavourites', Book::class);
        $favourite = Auth::user()->favourites()->where('book_id' , $book->id)->first();
        if($favourite == null){
            Auth::user()->favourites()->attach($book->id);
        }
        else{
            Auth::user()->favourites()->detach($book->id);
        }

        return back();
    }

    //edit role
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        if ($user->role->name != 'admin') {
            $request->validate(['role_id' => 'required|numeric|exists:roles,id']);
            $user->update([
                'role_id' => $request->role_id
            ]);

            return back()->with('message', __('messages.changerole'));
        } else {
            return back()->with('message', __('messages.changeroleerror'));
        }
    }

    public function ban(Request $request, User $user)
    {
        $this->authorize('update', $user);

        if ($user->role->name != 'admin') {
            $user->update([
                'is_active' => false
            ]);
        }
        return back();
    }

    public function unban(Request $request, User $user)
    {
        $this->authorize('update', $user);

        if ($user->role->name != 'admin') {
            $user->update([
                'is_active' => true
            ]);
        }
        return back();
    }
}
