<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function manageCategory()
    { 
        $categories = Category::orderby("id","DESC")->paginate(10);
        $parent_categories = Category::where("category_id",NULL)->get();
        return view("admin.manageCategory", compact('categories', 'parent_categories'));
    }
    public function Createcategory(Request $data)
    {
        $data->validate([
            'cat_title' => 'required|string|max:255',
        ]);
         Category::create([
          'cat_title' => $data->cat_title,
          'cat_description' => $data->cat_description,
          'category_id' => $data->category_id,
        ]);
      return redirect()->route('admin.manageCategory')->with('success', 'Create Category Successfully...');

    }

    public function deleteCategory(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    public function UpdateCategory(Request $request, $id){
        $request->validate([
            'cat_title' => 'required|string|max:255',
        ]);
         Category::find($id)->update([
          'cat_title' => $request->cat_title,
          'cat_description' => $request->cat_description,
          'category_id' => $request->category_id,
        ]);
      return redirect()->route('admin.manageCategory')->with('msg', 'Category Updated Successfully...');
    }
}
