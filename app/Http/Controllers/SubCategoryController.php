<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubCategoryController extends Controller
{
    function subcategory(){
      $category=  Category::orderBy('category_name','asc')->get();
        return view('backend.add-sub-category', compact('category'));
    }

    function viewSubCategory(){
        $count=SubCategory::count();
           $subCategory=SubCategory::simplepaginate(3);
        return view('backend.sub-category-view', compact('subCategory','count'));
        // return view('backend.sub-category-view');
    }
    function subcategoryPost(Request $request){
      SubCategory::insert([
        'sub_category_name'=>$request->sub_category_name,
        'category_id'=>$request->category_id,
        'created_at'=>Carbon::now(),

      ]);
      return back()->with('success',"Sub Category Added Successfully");
    }  
    function subcategoryUpdate(){
     
    }
    function subdeleteCategory($id){
        SubCategory::findOrFail($id)->delete();
        return back()->with('success',"Data Deleted Success");
        // return $id;
    }
    // sub category page link function 
    function subeditCategory(){

    }
    // Sub category deleted data view 
    function deletedSubCategoryView(){
          $subCategory=SubCategory::onlyTrashed()->simplepaginate(3);
        return view('backend.deleted-subcategory', compact('subCategory'));
    }

    function restore($id){
        SubCategory::withTrashed()->findOrFail($id)->restore();
        return back()->with('success',"Data Restore Successfully");
    }
    function permanentDelete($id){
        SubCategory::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success',"Data Parmanent Deleted Successfully");
    }
  
    
}
