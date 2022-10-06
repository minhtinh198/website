<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\order;
use App\Models\Coupon;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Session;
use DB;
use LDAP\Result;
use PhpParser\Node\Stmt\TryCatch;
use Mail;

class CartController extends Controller
{
    public function Shopping_Cart( Request $request)
    {
       
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/shopping_cart',compact('category','brand'));
    }

    public function add_Cart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');

        if($cart==true){                    //kiểm tra cart tồn tại chưa
            $is_avaiable = 0;
            foreach($cart as $key => $val){             
                if($val['product_id']==$data['product_id'] && $val['id_color']==$data['id_color'] && $val['id_size']==$data['id_size']  ){      // so sánh id product trong cart có tồn tại ko       
                    $cart[$key]['product_qty'] += $data['qty'];
                    $is_avaiable++;
                }   
                Session::put('cart',$cart);   
            }
            if($is_avaiable == 0){        // nếu không tạo ra cart mới
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['product_name'],
                'product_id' => $data['product_id'],
                'product_image' => $data['img_product'],
                'product_qty' => $data['qty'],
                'product_price' => $data['gia'],
                'id_color' => $data['id_color'],
                'id_size' => $data['id_size'],
                );
                Session::put('cart',$cart);
            }
        }else{                  // nếu chưa tạo ra cart mới
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['product_name'],
                'product_id' => $data['product_id'],
                'product_image' => $data['img_product'],
                'product_qty' => $data['qty'],
                'product_price' => $data['gia'],
                'id_color' => $data['id_color'],
                'id_size' => $data['id_size'],
                );
            Session::put('cart',$cart);
        }
       
        Session::save();
    }

    public function deleted_Cart($session_id)
    {
        $cart = Session::get('cart');
        if($cart == true)
        {
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->route('Shopping_Cart');
        }else{
            return redirect()->route('Shopping_Cart');
        }
    }

    public function update_Cart(Request $request)
    { 
       $data = $request->all();
       $cart = Session::get('cart');
       if($cart== true){
           foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session =>$val){
                    if($val['session_id']== $key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
           }
            Session::put('cart',$cart);    
            return redirect()->route('Shopping_Cart');
       }else{
            return redirect()->route('Shopping_Cart');
       }
    }
    public function check_coupon(Request $request)
    {
        $data= $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
       
        if(Session::get('Login_user')){
            foreach(Session::get('Login_user') as $key =>$val){
                $id_customer = $request->id_customer;     
            }
            $coupon= DB::table('coupon')
            ->where('coupon_code',$data['coupon'])
            ->where('coupon_end','>=',$now)
            ->where('coupon_id_customer','LIKE','%'.$id_customer.'%')
            ->first();
            if($coupon){                                           // kiểm tra mã đã dc sử dụng chưa
                Session()->flash('success', 'Đã sử dụng !!!');
                return redirect()->back();
            }else{
                $coupon_login= DB::table('coupon')
                ->where('coupon_code',$data['coupon'])
                ->where('coupon_end','>=',$now)
                ->first(); 
                if($coupon_login){                  //kiểm tra mã có còn hạng sử dụng
                    $count_coupon = 1;              //đếm  $coupon->count()
                        if($count_coupon>0){                        //nếu đúng
                            $coupon_session = Session::get('coupon');
                            if($count_coupon==true){
                                $is_avaiable = 0;
                                if($is_avaiable == 0){          //tồn tại session coupon
                                        $cou[] = array(
                                            'coupon_code' =>$coupon_login->coupon_code,
                                                'lever' =>$coupon_login->lever,
                                            'coupon_number' =>$coupon_login->coupon_number,
                                        );
                                        Session::put('coupon',$cou);
                                }
                            }else{
                                $cou[] = array(
                                    'coupon_code' =>$coupon_login->coupon_code,
                                    'lever' =>$coupon_login->lever,
                                    'coupon_number' =>$coupon_login->coupon_number,
                                );
                                Session::put('coupon',$cou);
                            }
                            session::save();
                            return redirect()->back();
                        }
                }else
                {
                    Session()->flash('success', 'Hết hạn');
                    return redirect()->back();
                }
                
            }
        }
        
    }

    /////////////////////////////////Order//////////////////////////
    public function Shopping_order()
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        return view('font-end/order',compact('category','brand'));
    }


    public function Order(Request $request)
    {  
        $order_code = substr(md5(microtime()),rand(0,26),5);
        try {
            DB::beginTransaction();
                if(Session::get('coupon')){
                    foreach (Session::get('coupon') as $key =>$cou){
                            $coupon_code = $cou['coupon_code'];
                            $lever = $cou['lever'];
                            $coupon_number = $cou['coupon_number'];
                    }
                }else{
                    $coupon_code ="Null";
                    $lever= "Null";
                    $coupon_number="Null";
                }

                if(Session::get('Login_user') == true){
                    foreach(Session::get('Login_user') as $key =>$val){
                        $id_customer = $request->id_customer;
                        $order = new order;
                        $order->name= $request->name;
                        $order->Email= $request->email;
                        $order->Phone= $request->sdt;
                        $order->dia_chi =   $request->diachi;
                        $order->Tinh_thanh = $request->tinhthanh;
                        $order->order_code = $order_code;
                        $order->coupon_code = $coupon_code;
                        $order->total = $request->total;
                        $order->id_customer= $id_customer;
                        $order->lever = '0';
                        $order->save();      
                    }
                }else{
                    $order = new order;
                    $order->name= $request->name;
                    $order->Email= $request->email;
                    $order->Phone= $request->sdt;
                    $order->dia_chi =   $request->diachi;
                    $order->Tinh_thanh = $request->tinhthanh;
                    $order->order_code = $order_code;
                    $order->coupon_code = $coupon_code;
                    $order->total = $request->total;
                    $order->lever = '0';
                    $order->id_customer= "Null";
                    $order->save(); 
                }
                if(Session::get('cart')==true){
                    foreach(Session::get('cart') as $key => $cart){
                        $OrderDetails = new OrderDetails;
                        $OrderDetails->order_code =  $order_code;
                        $OrderDetails->product_id = $cart['product_id'];
                        $OrderDetails->product_name = $cart['product_name'];
                        $OrderDetails->color = $cart['id_color'];
                        $OrderDetails->size = $cart['id_size'];
                        $OrderDetails->product_price = $cart['product_price'];
                        $OrderDetails->product_qty = $cart['product_qty'];
                        $OrderDetails->save();
                    }
                } 

                //lấy id của khách đạt hàng lưu vào couppon để kiểm tra khách hàng xài mã khuyến mãi chưa
                    if(Session::get('coupon')){
                        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
                        $coupon->coupon_id_customer=$id_customer.','.$coupon->coupon_id_customer;
                        $coupon->save();
                    }
                //send mail 
                    $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');  //lấy ra ngày tháng giờ hiện tại
                    $title_mail = $title_mail = "Thông Tin Đơn Hàng".' '.$now;
                    $email = $request->email;
                    $customer = DB::table('customers')->where('Email_Customer',$email)->first();
                    $data['email'][] = $customer->Email_Customer;

                    $mail_array =[
                        'name_Customer' => $customer->name_Customer,
                        'Email_Customer'=>$customer->Email_Customer,
                        'phone_Customer' =>$customer->phone_Customer,
                    ];
                    $coupon_array = array(                              // lấy mã khuyến mãi
                        'coupon_code' => $coupon_code,
                        'lever' => $lever,
                        'coupon_number'=>$coupon_number,
                    );
                    if(Session::get('cart')==true){                    // lấy cart
                        foreach(Session::get('cart') as $key => $cart_mail){
                            $cart_array[]=array(
                                'product_name'  =>$cart_mail['product_name'],
                                'product_price' =>$cart_mail['product_price'],
                                'product_qty'   =>$cart_mail['product_qty'],
                            );
                        }
                    }


                    Mail::send('font-end.order_mail',['coupon'=>$coupon_array,'cart_array'=>$cart_array,'mail_array'=>$mail_array], function($message) use ($title_mail,$data){
                        $message->to($data['email'])->subject($title_mail);
                        $message->from($data['email'],$title_mail);
                    });
                Session::forget('coupon');
                Session::forget('cart');
            DB::commit();
            Session()->flash('success', 'Thành Công');
            return redirect()->back();
        }catch(\Exception $exception){
            DB::rollBack();
            //Log::error('Message: '. $exception->getMessage(). ' ---Line : ' .$exception->getLine()); 
            Session()->flash('success', 'Thất bại');
            return redirect()->back();
        }
    }
}
