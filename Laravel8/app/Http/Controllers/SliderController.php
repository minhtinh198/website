<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use App\Models\customer;
use App\traits\StorageImage;
use Illuminate\Support\Facades\Storage;
use App\Models\News;



class SliderController extends Controller
{
    use StorageImage;
    
    public function Slider_index()
    {
        //$Slider = DB::table('slider')->orderBy('id_slider','desc')->latest()->paginate(2);
        $Slider = DB::table('slider')->orderBy('id_slider','desc')->get();
        return view('admin/slider/index_slider',compact('Slider'));
    }

    public function Slider_create()
    {
        return view('admin/Slider/add_slider');
    }
    public function Slider_add(Request $request)
    {
        $data = new Slider ;
        $data->name_slider = $request->tenslider;
        $data->mota_slider = $request->mota_slider;
        $UploadFile= $this->Upload_FILE($request,'img_slider','image_Slider');  //image_Slider :  tên foder lưu ảnh   //img_slider : tên name thẻ input
        if(!empty($UploadFile)){
            $data->image_slider = $UploadFile['File_Path'];
        }        
        $data->save();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Slider_index');
    }

    public function Slider_Edit($id){
        $Slider=DB::table('slider')->where('id_slider',$id)->get();
        return view('admin/slider/Edit_Slider',compact('Slider'));
    }
    public function Slider_Update( Request $request, $id){ 
        $data = array();
        $data['name_slider'] = $request->tenslider;
        $data['mota_slider'] = $request->mota_slider;
        $UploadFile= $this->Upload_FILE($request,'img_slider','image_Slider');  //image_Slider :  tên foder lưu ảnh   //img_slider : tên name thẻ input
        if(!empty($UploadFile)){
            $data['image_slider'] = $UploadFile['File_Path'];
            DB::table('slider')->where('id_slider',$id)->update($data);
        } 
        DB::table('slider')->where('id_slider',$id)->update($data);
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Slider_index');
    }
    public function Slider_deleted ($id)
    {
        DB::table('slider')->where('id_slider',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Slider_index');
    }

    /////////////////////////////////////////////// Tin Tức //////////////////////////////////////////////
    public function index_News()
    {
        $News = DB::table('news')->orderBy('id_news','desc')->get(); 
        return view('admin/news.index_news',compact('News'));
    }
    public function add_News()
    {
        return view('admin/news.add_news');
    }
    public function add_News_post(Request $request)
    {
        $data = new News() ;
        $data->Name_News = $request->tenNews;
        $data->content = $request->mota_News;
        $UploadFile_News= $this->Upload_FILE($request,'img_News','image_Slider');  //image_Slider :  tên foder lưu ảnh   //img_News: tên name thẻ input
        if(!empty($UploadFile_News)){
            $data->img_news = $UploadFile_News['File_Path'];
        }        
        $data->save();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('index_News');
    }
    public function Update_News($id)
    {
        $data = News::where('id_news',$id)->first();
        return view('admin/news.update_news',compact('data'));
    }
    public function Update_News_post(Request $request,$id)
    {
        $Update_News_post = array();
        $Update_News_post['Name_News'] = $request->tenNews;
        $Update_News_post['content'] = $request->mota_News;
        $UploadFile= $this->Upload_FILE($request,'img_News','image_Slider');  //image_Slider :  tên foder lưu ảnh   //img_slider : tên name thẻ input
        if(!empty($UploadFile)){
            $Update_News_post['img_news'] = $UploadFile['File_Path'];
            DB::table('news')->where('id_news',$id)->update($Update_News_post);
        } 
        DB::table('news')->where('id_news',$id)->update($Update_News_post);
        Session()->flash('success', 'Thành Công');
        return redirect()->route('index_News');
    }
    public function deleted_News($id)
    {
        DB::table('news')->where('id_news',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('index_News');
    }
}
