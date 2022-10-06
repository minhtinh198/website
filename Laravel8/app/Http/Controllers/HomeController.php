<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use DB;
use App\Models\product;
use App\Models\customer;
use App\Models\Review;
use Session;



class HomeController extends Controller
{
    public function font_end(Request $request)   //hiển thị sản phẩm trang in dex
    { 

        $brand  = DB::table('brand')->get();
        $Slider = DB::table('slider')->orderBy('id_slider','desc')->take(1)->get();  
        $category = DB::table('category')->get();
        $product_data = DB::table('products')->where('status',1)->orderby('id_product','desc')->get(); 
        $product = DB::table('products')->where('status',1)->orderby('id_product','desc')->paginate(16);         
        return view('font-end/layout',compact('product','category','Slider','brand','product_data'));
    }
    
    public function product_chitiet(Request $request,$id)
    {
        
        $review = DB::table('review')
        ->where('id_product',$id)
        ->where('status',1)
        ->orderby('id_review','desc')
        ->take(4)
        ->get();
        $product_sizes = DB::table('product_sizes')
        ->where('id_product',$id)
        ->join('sizes','product_sizes.id_size','=','sizes.id_size')
        ->select('product_sizes.id_size','sizes.value')
        ->get();

        $product_colors = DB::table('product_colors')
        ->where('id_product',$id)
        ->join('color','product_colors.id_color','=','color.id_color')
        ->select('product_colors.*','color.*')
        ->get();

        $product= product::where('id_product',$id)
        ->join('category','products.id_category','=','category.id_category')
        ->join('brand','products.id_brand','=','brand.id_brand')
        ->select('products.*','category.*','brand.*')
        ->get();
        ////////////san pham lien quan 
        foreach($product as $key => $val)
        {
            $category_id = $val->id_category ;
        }
        $product_lienquan= product::where('id_category',$category_id)->get();
        /////////////////////////////

        $product_chitiet = DB::table('product_img')->where('id_product',$id)->get();
        
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/product_chitiet',compact('brand','category','product','product_chitiet','product_colors','product_lienquan','product_sizes','review'));
    }
        //sản phẩm theo loại
    public function show_category(Request $request,$id)
    {       
        if(!($request->price)){
            $show_category= DB::table('products')->where('id_category',$id)->get();
        }else{
            if($request->price)
            {
                $price = $request->price;
                    switch($price)
                    {
                        case '1' :
                            $show_category= DB::table('products')->where('id_category',$id)->where('price','<',250000)->get();
                            break;
                        case '2' :
                            $show_category= DB::table('products')->where('id_category',$id)->whereBetween('price', [250000, 500000])->get();
                            break;
                        case '3' :
                            $show_category= DB::table('products')->where('id_category',$id)->whereBetween('price', [500000, 750000])->get();
                            break;      
                        case '4' :
                            $show_category= DB::table('products')->where('id_category',$id)->where('price','>',750000)->get();
                            break;  
                    }
            }
        }
        if($request->oderby)
            {
                $oderby =$request->oderby;
                switch($oderby)
                {
                    case 'min' :
                        $show_category= DB::table('products')->where('id_category',$id)->orderby('price','DESC')->get();
                        break;
                    case 'max' :
                        $show_category= DB::table('products')->where('id_category',$id)->orderby('price','ASC')->get();
                        break;
                }
            } 
        
        
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/show_category',compact('brand','category','show_category'));
    }
            //sản phảm theo thương hiệu
    public function show_brand(Request $request,$id)
    {
        
        if(!($request->price) && !($request->oderby)){
            $show_brand= DB::table('products')->where('id_brand',$id)->get();
        }else{
            
            if($request->price){
                $price = $request->price;
                switch($price)
                {
                    case '1' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->where('price','<',250000)->get();
                        break;
                    case '2' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->whereBetween('price', [250000, 500000])->get();
                        break;
                    case '3' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->whereBetween('price', [500000, 750000])->get();
                        break;      
                    case '4' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->where('price','>',750000)->get();
                        break;  
                }
            }
            if($request->oderby)
            {
                $oderby =$request->oderby;
                switch($oderby)
                {
                    case 'min' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->orderby('price','DESC')->get();
                        break;
                    case 'max' :
                        $show_brand= DB::table('products')->where('id_brand',$id)->orderby('price','ASC')->get();
                        break;
                }
            }   
        }
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/show_brand',compact('brand','category','show_brand'));
        
     
    }

    //search font-end 
    public function Search(Request $request)
    {
            $Search = $request->Search;

            $brand  = DB::table('brand')->get();
            $category = DB::table('category')->get();
          
            $Search_product = DB::table('products')
            ->where('name_product','like','%'. $Search.'%')
            ->orwhere('name_product',$Search)
            ->orwhere('price',$Search)
            ->get();

            return view('font-end/search',compact('brand','category','Search_product'));
    }

    //Login font-end
    public function Login()
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/Login',compact('category','brand'));
    }
    public function Login_post(Request $request)
    {
        $user = DB::table('customers')->where('Email_Customer','=',$request->email)
        ->where('lever','=',0)
        ->first();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $Login_user = Session::get('Login_user');
        if($user)
        {
            if (md5($request->password)== $user->password_Customer) {
                    $Login_user[] = array(
                        'session_id' =>$session_id,
                        'id_Customer'   => $user->id_Customer,
                        'Email_Customer' =>$user->Email_Customer,
                        'name_Customer' =>$user->name_Customer,
                        'phone_Customer' =>$user->phone_Customer,
                    );
                    session::put('Login_user',$Login_user);
                    return  redirect()->route('font_end'); 
            }
            else
            {
                session()->flash('success', 'Mật khẩu không đúng');
                return  redirect()->route('Login');
                
            }
           
        }
        else{
            session()->flash('success', 'Tài khoản không đúng');
            return  redirect()->route('Login');
        }
    }
    public function Logout_font_end($session_id)     
    {   
        $Login_user = Session::get('Login_user');
        if($Login_user == true)
        {
            foreach($Login_user as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($Login_user[$key]);
                }
            }
            Session::put('Login_user',$Login_user); 
        }
        Session::forget('coupon');
        Session::forget('cart');
        return redirect()->route('font_end');
    }
    //dang ký người dùng
    public function Register()
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/Register',compact('category','brand'));
    }
    public function Customer_add(Request $request)
    {
        $request->validate([
            'email' => 'unique:customers,Email_Customer',
        ],[
            'email.unique' => 'Đã tồn tại !!!',
        ]);
         $data = new customer;
         $data->name_Customer = $request->name;
         $data->Email_Customer = $request->email;
         $data->phone_Customer =$request->phone;
         $data->password_Customer = md5($request->password);
         $data->lever= 0;
        $data->save();
        session()->flash('success', 'Thành Công !!!');
        return redirect()->route('Register');
    }


    //Review

    public function Review(Request $request)
    {
       $data = new Review ;
       $data ->name_review = $request->name;
       $data->email_review = $request->email;
       $data->review = $request ->message;
       $data->id_product = $request ->product_id;
       $data->status = 0;
        $data->save();
        return redirect()->back();
    }
        
    public function Review_index()
    {   
        $review = DB::table('review')->get();
        return view('admin/Review.index_review',compact('review'));
    }
    public function Unactive($id)
    {   
        DB::table('review')->where('id_review',$id)->update(['status'=>1]);
        return redirect()->back();
    }

    public function active($id)
    {
        DB::table('review')->where('id_review',$id)->update(['status'=>0]);
        return redirect()->back();
    }
   public function detele_review($id)
   {
        DB::table('review')->where('id_review',$id)->delete();
        return redirect()->back();
   }

   // Tin Tức

   public function index_News()
   {    
        $News = DB::table('news')->orderby('id_news','desc')->get();
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end.News',compact('brand','category','News'));
   }
   public function index_News_chitiet($id)
   {
        $New = DB::table('news')->where('id_news',$id)->first();
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
    return view('font-end.New_chitiet',compact('brand','category','New'));
   }
}
