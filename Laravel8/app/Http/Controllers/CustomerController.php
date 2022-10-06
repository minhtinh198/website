<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    public function Customer_index()
    {
        $customer = DB::table('customers')->orderBy('id_Customer','desc')->where('lever',0)->get();
        return view('admin/Customer.index_Customer',compact('customer'));
    }
    public function deleted($id)
    {
        DB::table('customers')->where('id_Customer',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Customer_index');
    }
    // khách hàng sữa thông tin của mình
    public function index_khachhang($id)
    {
        $customer=DB::table('customers')->where('id_Customer',$id)->first();
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end.index_customer',compact('category','brand','customer'));  
    }

    public function edit_khachhang($id)
    {
        $Update_customer= DB::table('customers')->where('id_Customer',$id)->first();
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end.edit_customer',compact('brand','category','Update_customer'));
    }
    public function Update_khachhang($id,Request $request)
    {
        $data = array();
        $data['name_Customer']= $request->name;
        $data['Email_Customer']=$request->email;
        $data['phone_Customer']=$request->phone;
        $data['password_Customer'] = md5($request->password);
        $data['lever'] = $request->lever;
        DB::table('customers')->where('id_Customer',$id)->update($data);
        Session()->flash('success', 'Thành Công');
        return redirect()->back();
    }

    //khach hàng quên mật khẩu
    public function reset_password()
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end.Reset_pass',compact('brand','category'));
    }
    public function Recover_pass(Request $request)
    {
        $email = $request->email;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');  //lấy ra ngày tháng giờ hiện tại
        $title_mail = "Reset Mật Khẩu".' '.$now;
        $customer = customer::where('Email_Customer','=',$email)->get();
        foreach($customer as $key =>$value){
            $customer_id = $value->id_Customer;
        }
       
       
       if($customer)
       {    $count_customer = $customer->count();  // đếm email có tồn tại ko
            if($count_customer==0)            //==0 là chưa tồn tại
            {
                Session()->flash('success', 'Email không tồn tại');
                return redirect()->back();
            }else{
                $token_random = Str::random();
                DB::table('customers')->where('id_Customer',$customer_id)->where('lever',0)->update(['token'=>$token_random]);
                

                $to_mail = $email;         //$data là email
                $link = url('Admin/Customer/update_new_pass?email='.$to_mail.'&token='.$token_random);

                $data = array("name"=>$title_mail,"body"=>$link,'email'=>$email);

                Mail::send('font-end.mail_reset_pass',['data'=>$data], function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'],$title_mail);
                });
                Session()->flash('success', 'Thành Công');
                return redirect()->back();
            }
       }
        
    }

    public function update_new_pass()
    {   
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end.Update_new_pass',compact('category','brand'));
    }
    public function Rest_new_pass(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        $pass = $request->pasword;
        $token_random = Str::random();
        $customer = DB::table('customers')->where('Email_Customer',$email)->where('token',$token)->get();
        $count = $customer->count();
        if($count>0)
        {
            foreach($customer as $key => $value){
                $customer_id = $value->id_Customer;
            }
            DB::table('customers')->where('id_Customer',$customer_id)->where('lever',0)->update(['token'=>$token_random,'password_Customer'=>md5($pass)]);
            Session()->flash('success', 'Thành Công');
            return redirect()->back();
        }else{
            Session()->flash('success', 'Thất Bại');
            return redirect()->back();
        }
    }
}
