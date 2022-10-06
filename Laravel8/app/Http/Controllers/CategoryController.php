<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use  App\Models\Category;
use DB;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Category_index()
    {
        $category=DB::table('category')->orderBy('id_category','desc')->get();
        return view('admin/category.index_category',compact('category'));
        
    }

    public function Category_Edit($id_category)
    {
        $category=DB::table('category')->where('id_category',$id_category)->get();
        return view('admin/category.update_category',compact('category'));
    }

    public function Category_Update(Request $request,$id_category)
    {
        $category_Update = array();
        $category_Update['name_category'] = $request->tenloaisanpham;
        DB::table('category')->where('id_category',$id_category)->update($category_Update);
        Session()->flash('success', 'Thành Công');
        return  redirect()->route('Category_index');
    }
    
    public function Category_create()
    {
        return view('admin/category.add_category');
    }
    
    public function Category_add(Request $request)
    {
        $request->validate([
            'namecategory' => 'unique:category,name_category',
        ],[
            'namecategory.unique' => 'Đã tồn tại !!!',
        ]);
       $data = new Category ;
       $data->name_category= $request->namecategory;
       $data->save();
       Session()->flash('success', 'Thành Công');
      //return redirect()->route('Category_create');
      return redirect()->route('Category_index');
    }

    public function Category_deleted ($id_category)
    {
        DB::table('category')->where('id_category',$id_category)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Category_index');
    }
}
