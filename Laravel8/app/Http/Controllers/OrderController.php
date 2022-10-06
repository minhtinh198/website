<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    public function Order_index()
    {
        $order = DB::table('orders')->orderBy('id_order','desc')->get();
        return view('admin/order.index_order',compact('order'));
    }
    public function order_details($order_code)
    {
        $coupon = DB::table('orders')
        ->where('order_code',$order_code)
        ->join('coupon','orders.coupon_code','=','coupon.coupon_code')
        ->select('orders.*','coupon.*')
        ->first();

        
        
        $order_details= DB::table('order_details')->where('order_code',$order_code)->get();
        return view('admin/order.order_details',compact('order_details','coupon'));
    }
    public function order_delete($order_code)
    {
       DB::table('orders')->where('order_code',$order_code)->delete();
       DB::table('order_details')->where('order_code',$order_code)->delete();
       Session()->flash('success', 'Thành Công');
       return redirect()->back();
    }


    // tình trạng đơn hàng, 0: soạn hàng, 1: đang giao, 2: đã giao
    public function active_0($id)
    {
        DB::table('orders')->where('id_order',$id)->update(['lever'=>1]);
        return redirect()->back();
    }
    public function active_1($id)
    {
        DB::table('orders')->where('id_order',$id)->update(['lever'=>2]);
        return redirect()->back();
    }
    public function active_2($id)
    {
        DB::table('orders')->where('id_order',$id)->update(['lever'=>0]);
        return redirect()->back();
    }
    // lich sử đơn hàng
    public function view_history($id_customer)
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        //$history = DB::table('orders')->where('id_customer',$id_customer)->orderBy('id_order','desc')->first();  lấy 1 đơn hàng mới nhất
        $history = DB::table('orders')->where('id_customer',$id_customer)->orderBy('id_order','desc')->take(5)->get();
        return view('font-end.history_order',compact('category','brand','history'));
    }

    // người dùng xóa đơn hàng
    public function deleted_history($id)
    {
        DB::table('orders')->where('order_code',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->back();
    }
    //lich sử đơn hàng chi tiết của người dùng
    public function details_history($id)
    {
        $brand  = DB::table('brand')->get();
        $category = DB::table('category')->get();
        $data =DB::table('order_details')->where('order_code',$id)->get();
        return view('font-end.view_history_order',compact('data','category','brand'));
    }

    // in đơn hàng
     public function Print_Order($order_code)
     {
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->print_order_convert($order_code));
            return $pdf->stream();
     }
     public function print_order_convert($order_code)
     {
       $order = DB::table('orders')->where('order_code',$order_code)->get();
       $order_details = DB::table('order_details')->where('order_code',$order_code)->get();

        $output ='';

       
            $output.= '
                <style>
                    body{ 
                        font-family: DejaVu Sans ;
                        
                    }
                    
                    
                </style>

                <table>';
                   foreach($order as $key => $data){
                    $output.='  
                            <thead>
                                    <tr>
                                            <p>Khách Hàng :'.$data->name.' </p>
                                            <p> Email : '.$data->Email.' </p>
                                            <p> SĐT : '.$data->Phone.' </p>
                                            <p> Mã Khuyến mãi : '.$data->coupon_code.' </p>
                                            <p> Tổng Tiền : '.number_format($data->total).'&nbsp;vnđ'.' </p>
                                    </tr>
                            </thead>';
                
                     }
                     $output.='  
                        <thead >
                                <tr>
                                    <td ><b>Name</b></td>
                                    <td style="width:100px;"><b>Màu Sắc</b></td>
                                    <td style="width:70px"><b>Size</b></td>
                                    <td style="width:100px"><b>Số Lượng</b></td>
                                    <td style="width:100px"><b>Giá</b></td>
                                </tr>
                        </thead>';
                     foreach($order_details as $key => $order__details){
                        $output.= '
                                <tr>
                                    <td>'.$order__details->product_name.'</td>
                                    <td>'.$order__details->color.'</td>
                                    <td>'.$order__details->size.'</td>
                                    <td>'.$order__details->product_qty.'</td>
                                    <td>'.number_format($order__details->product_price). '&nbsp;vnđ'.'</td>
                                </tr>';

                         
                }
                
                    
        $output.='     </table>';
        
        return $output;
     }
}
