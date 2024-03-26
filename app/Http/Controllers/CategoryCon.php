<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryCon extends Controller
{
    function category()
    {
        return view('backend.category');
    }
    function categoryPost(Request $request)
    {
        // $name = $request->cat_name;
        // $cat = new Category;
        // $cat->category_name = $name;
        // $cat->save();

        // Form Validation 

        $request->validate([
            'category_name' => ['required', 'min:3', 'max:50', 'unique:categories'],
        ],[
            'category_name.required'=>"Category name is required!",
        ]);


        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);

        return back()->with("success", 'Category Added Successfully!');
    }

    function viewCategory(){
        // $categories=Category::all();
        $categories=Category::orderby('category_name','asc')->simplepaginate('3');
        return view('backend.category-view', compact('categories'));
    }

    function deleteCategory($id){
        Category::findOrFail($id)->delete();
        // Category::where('id',$id)->delete();
        return back()->with("delete","Data Delete Successfully");
    }

    function editCategory($id){
        $category=Category::findOrFail($id);
        return view('backend.category-edit', compact('category'));
    }

    function categoryUpdate(Request $request){
        $request->validate([
            'category_name' => ['required', 'min:3', 'max:50', 'unique:categories'],
        ], [
            'category_name.required' => "Category name is required!",
            'category_name.min' => 'Category Name use minimam 3 Chr',
            'category_name.max' => 'Category Name use maximam 5 Chr',
            'category_name.unique' => 'Category Name Alredy Used',
        ]);

        Category::findOrFail($request->cat_id)->update([
            'category_name'=>$request->category_name,
            // 'updated_at' => Carbon::now(),
        ]);
        return redirect('/view-category')->with("update", 'Category Updated Successfully!');
    }
}
