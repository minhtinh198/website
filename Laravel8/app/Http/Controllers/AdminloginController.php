<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use DB;
use App\Models\customer;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminloginController extends Controller
{
    public function index_Login()
    {
        return view('admin/login/login_admin');
    }
    public function Login(Request $request)
    {
        
        // $user = $request->email;
        // $pass = $request->password;
        // if(Auth::attempt(['Email_Customer'=>$user,'password_Customer'=>$pass]))
        // {   
        //     return   redirect()->route('Dashboard');
        // }else{
        //     session()->flash('success', 'Tài khoản hoặc mật khẩu không đúng');
        //     return  redirect()->route('Login_admin');
        // }
    
        $user = DB::table('customers')->where('Email_Customer','=',$request->email)
        ->where('lever','=',1)
        ->first();
        if($user)
        {
            if (md5($request->password)== $user->password_Customer) {
                session()->put('LoginUser',$user->Email_Customer);
                return  redirect()->route('Dashboard');
                
            }
            else
            {
                session()->flash('success', 'Mật khẩu không đúng');
                return  redirect()->route('Login_admin');
                
            }
           
        }
        else{
            session()->flash('success', 'Tài khoản không đúng');
            return  redirect()->route('Login_admin');
        }
    }
    public function Logout()
    {
        return  redirect()->route('Login_admin');
    }
    public function Dashboard()
    {
        $order =DB::table('orders')->sum('total');
        $custommer = DB::table('customers')->where('lever',0)->count('id_Customer');
        $orders =DB::table('orders')->count('id_order');
       return view('admin_layout',compact('custommer','order','orders')); 
        
    }
    public function index_admin()
    {
        $admin = DB::table('customers')->where('lever',1)->get();
       return view('admin/customer.index_admin',compact('admin'));
    }
    public function add_admin()
    {
        return view('admin/customer.add_admin');
    }
    public function add_admin_post(Request $request)
    {
        $request->validate([
            'email' => 'unique:customers,Email_Customer',
        ],[
            'email.unique' => 'Đã tồn tại !!!',
        ]);
        $data = new customer();
        $data->name_Customer = $request->admin_name;
        $data->Email_Customer = $request->email;
        $data->phone_Customer = $request->phone;
        $data->password_Customer = md5($request->password);
        $data->lever = 1;
        $data->save();

        session()->flash('success', 'Thành Công');
        return redirect()->route('index_admin');
    }

    public function Update_admin($id)
    {
        $admin = customer::where('id_Customer',$id)->first();
        return view('admin/customer.update_admin',compact('admin'));
    }
    public function Update_admin_post($id, Request $request)
    {
        $data = array();
        $data['name_Customer'] = $request->admin_name;
        $data['Email_Customer'] = $request->email;
        $data['phone_Customer'] = $request->phone;
        $data['password_Customer'] = md5($request->password);
        $data['lever'] = 1;
        DB::table('customers')->where('id_Customer',$id)->update($data);

        session()->flash('success', 'Thành Công');
        return redirect()->route('index_admin');
    }
    public function deleted_admin($id)
    {
        DB::table('customers')->where('id_Customer',$id)->delete();
        session()->flash('success', 'Thành Công');
        return redirect()->route('index_admin');
    }
}


