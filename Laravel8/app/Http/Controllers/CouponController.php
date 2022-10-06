<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
{
    public function Coupon_index()
    {
        $coupon=DB::table('coupon')->get();
        return view('admin/coupon.index_coupon',compact('coupon'));
    }
    public function create_coupon()
    {
        return view('admin/coupon.add_coupon');
    }
    public function Add_coupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'unique:coupon,coupon_code',
        ],[
             'coupon_code.unique' => 'Mã màu đã tồn Tại !!!',
        ]);
        $coupon= array();
        $coupon['coupon_name'] =$request->coupon_name;
        $coupon['coupon_code'] =$request->coupon_code;
        $coupon['coupon_number'] =$request->coupon_number;
        $coupon['lever']=$request->lever;
        $coupon['coupon_start']=$request->coupon_start;
        $coupon['coupon_end']=$request->coupon_end;
        DB::table('coupon')->insert($coupon);
        Session()->flash('success', 'Thành Công');
        return redirect()->route('Coupon_index');
    }

    public function deleted_coupon($id)
    {
        DB::table('coupon')->where('id_coupon',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->back();
    }

    public function coupon_Email($coupon_code)   //gửi mã khuyến mãi cho khách hàng
    {
            $customer = DB::table('customers')->where('lever',0)->get();
            $coupon = DB::table('coupon')->where('coupon_code',$coupon_code)->first();
            

            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');  //lấy ra ngày tháng giờ hiện tại
    
            $title_mail = "Mã khuyến mãi".' '.$now;

            $coupon= array(
                'coupon_start'=>$coupon->coupon_start,
                'coupon_end'=>$coupon->coupon_end,
                'coupon_code'=>$coupon->coupon_code,
                'coupon_number'=>$coupon->coupon_number,
                'lever'=>$coupon->lever,
            );
            $data =[];
            foreach($customer as $item)
            {
                $data['email'][] = $item->Email_Customer;
            }
           
            Mail::send('admin/send_mail.coupon_mail',['coupon'=>$coupon], function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            Session()->flash('success', 'Thành Công');
            return redirect()->back();
    }
}
