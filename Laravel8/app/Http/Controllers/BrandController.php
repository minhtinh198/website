<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Str;
use DB;


class BrandController extends Controller
{
    public function Brand_index()
    {
        $brand = DB::table('brand')->orderBy('id_brand','desc')->get();
        return view('admin/brand.index_Brand', compact('brand'));
    }
    public function Brand_create()
    {
        return view('admin/brand.add_Brand');
    }
    public function Brand_add(Request $request)
    {
        $request->validate([
            'tenthuonghieu' => 'unique:brand,name_brand',
        ],[
            'tenthuonghieu.unique' => 'Đã tồn tại !!!',
        ]);
        $data = new brand;
        $data->name_brand = $request->tenthuonghieu;
        $data->save();
        Session()->flash('success', 'Thành Công');
        return  redirect()->route('Brand_index');
    }
    public function Brand_Edit($id)
    {
        
        $brand= DB::table('brand')->where('id_brand',$id)->get();
        return view('admin/brand.update_brand',compact('brand'));
    }
    public function Brand_Update(Request $request,$id)
    {
        $Brand_Update = array();
        $Brand_Update['name_brand'] = $request->tenthuonghieu;
        DB::table('brand')->where('id_brand',$id)->update($Brand_Update);
        Session()->flash('success', 'Thành Công');
        return  redirect()->route('Brand_index');
    }
    public function Brand_deleted($id) 
    {
        DB::table('brand')->where('id_brand',$id )->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Brand_index');
        
    }
    
    
}
