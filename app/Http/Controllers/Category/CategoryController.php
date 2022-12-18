<?php

namespace App\Http\Controllers\Category;



use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function view;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);

        $categories = null;
        if ($request->search_categories) {
            $categories = Category::where('name', 'LIKE', '%' . $request->search_categories . '%')->get();

        } else {
            $categories = Category::all();
        }
        return view('categories.index', ['categoriess' => $categories, 'search' => 'categories']);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);

        $validated = $request->validate([
            'name' => 'required'
        ]);
        Category::create($validated);
        return redirect()->route('categories.index')->with('message', __('messages.store category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validate([
            'name' => 'required'
        ]);
        $category->update($validated);
        return redirect()->route('categories.index')->with('message', __('messages.update category'));
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();
        return redirect()->route('categories.index')->with('message', __('messages.delete category'));
    }
}
