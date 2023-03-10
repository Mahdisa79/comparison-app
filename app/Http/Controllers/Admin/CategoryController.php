<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'persian_name' => 'required|string|min:2|max:255',
            'original_name' => 'required|string|min:2|max:255',
            'status' => 'required|numeric|in:0,1',   
        ]);

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {

        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      
        $data = $request->validate([
            'persian_name' => 'required|string|min:2|max:255',
            'original_name' => 'required|string|min:2|max:255',
            'status' => 'required|numeric|in:0,1',   
        ]);

        $category = Category::findOrFail($id);
        $category->update($data);


        return redirect()->route('admin.categories.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('admin.categories.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
