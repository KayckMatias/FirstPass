<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->pageTitle = "Categories";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->paginate(10);
        return view('categories.index', ['categories' => $categories, 'title' => $this->pageTitle]);
    }

    public function search(Request $request)
    {
        $search = $request->search_categories;
        $categories = Category::query()
            ->where('category_name', 'LIKE', "%$search%")
            ->where('user_id', Auth::id())
            ->paginate(10);

        return view('categories.index', ['search' => $search, 'categories' => $categories, 'title' => $this->pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', ['title' => $this->pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $input = $request->all();
        Category::create($input);
        return redirect(route('categories.index'))->with('message', 'Category Added!')->with('alert_type', 'tw-text-green-700 tw-bg-green-100');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if (Auth::id() != $category->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('categories.index');
        }

        return view('categories.edit', ['category' => $category, 'title' => $this->pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);
        $input = $request->all();

        if (Auth::id() != $category->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('categories.index');
        }

        $category->update($input);
        return redirect(route('categories.index'))->with('message', 'Category Updated')->with('alert_type', 'tw-text-green-700 tw-bg-green-100');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (Auth::id() != $category->user_id) { // Verify if User logged is same of user DB
            return $this->redirectOnNoPermission('categories.index');
        }
        
        Category::destroy($id);
        return redirect(route('categories.index'))->with('message', 'Category Deleted!')->with('alert_type', 'tw-text-red-700 tw-bg-red-100');
    }
}
