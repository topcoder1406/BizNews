<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $countsQueryResult = DB::table('posts')->selectRaw('category_id, count(*)')
                                    ->where('author_user_id', auth()->id())
                                    ->groupBy('category_id')
                                    ->get();

        $counts = collect($countsQueryResult)->mapWithKeys(fn($item) => [ $item->category_id => $item->{ 'count(*)' } ]);
        return view('admin.category.index', [
            'categories' => Category::withCount('posts')->get(),
            'counts' => $counts
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name|min:2|max:50',
            'slug' => 'required|unique:categories,slug|min:2|max:50'
        ]);

        Category::create($data);
        cache()->put('all_categories', Category::all());

        return redirect(route('admin.index-categories'))->with('success', ['Category', 'created successfully.']);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'name' => [ 'required', 'min:2', 'max:50', Rule::unique('categories', 'name')->ignore($category) ],
            'slug' => [ 'required', 'min:2', 'max:50', Rule::unique('categories', 'slug')->ignore($category) ]
        ]);

        $category->update($data);
        cache()->put('all_categories', Category::all());

        return redirect(route('admin.edit-category', $category))->with('success', [ 'Category', 'updated successfully.' ]);
    }

    public function destroy(Category $category) {
        if (Gate::denies('delete-category', $category)) {
            return back()->with('fail', [ ' ', 'You can\'t delete category only if nobody else have posts in this category.' ]);
        }

        $category->delete();
        cache()->put('all_categories', Category::all());

        return back()->with('success', [ 'Category', 'deleted successfully.' ]);
    }
}
