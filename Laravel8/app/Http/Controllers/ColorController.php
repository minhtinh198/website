<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Color;

class ColorController extends Controller
{
    public function Color_index()
    {
        $color=DB::table('color')->orderBy('id_color','desc')->get();
        return view('admin/color/color_index',compact('color'));
    }
    public function Color_Edit($id)
    {
        $color=DB::table('color')->where('id_color',$id)->get();
        return view('admin/color/update_color',compact('color'));
    }

    public function Color_Update(Request $request,$id)
    {
        $color_Update = array();
        $color_Update['name_color'] = $request->namecolor;
        $color_Update['value_color'] = $request->color;
        DB::table('color')->where('id_color',$id)->update($color_Update);
        Session()->flash('success', 'Thành Công');
        return  redirect()->route('Color_index');
    }

    public function Color_create()
    {
        return view('admin/color/color_add');
    }
    public function Color_add(Request $request)
    {
        $request->validate([
            'color' => 'unique:color,value_color',
        ],[
             'color.unique' => 'Mã màu đã tồn Tại !!!',
        ]);
        $data = new color;
        $data->name_color= $request->namecolor;
        $data->value_color= $request->color;
        $data->save();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Color_index');
    }

    public function Color_delete($id)
    {
        DB::table('color')->where('id_color',$id )->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Color_index');
    }
}
