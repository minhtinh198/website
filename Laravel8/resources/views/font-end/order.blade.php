@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Thanh Toán</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
{{-- @if(Session::get('cart')) --}}
@if(session()->has('success'))
        <div class="alert alert-success col-sm-8" style="margin: auto">
                {{ session()->get('success') }}
        </div>
@endif
<div class="main">
    <div class="container">
      <div class="row margin-bottom-40">
        <div class="col-md-12 col-sm-12">
          <div class="goods-page">
            <div class="goods-data clearfix">
              <form action="{{route('Order')}}" method="post" autocomplete="off">
                @csrf
                @if (Session::get('cart'))
                    <div class="table-wrapper-responsive">
        
                      <div style="text-align: center">
                          <h4>Thông Tin Đơn Hàng</h4>
                      </div>
         
                          @if (Session::get('Login_user'))
                                @foreach (Session::get('Login_user') as $key =>$data)   
                                    <div >
                                      <input type="hidden" name="id_customer" class="product_id" value="{{$data['id_Customer']}}">
                                      <input class="newsletter_email5" type="text" name="name" placeholder="Họ Và Tên"    value="{{$data['name_Customer']}}"  required>
                                      <input class="newsletter_email6" type="text"  name="sdt" placeholder="Số Điện Thoại"   value="{{$data['phone_Customer']}}" required>
                                      <input class="newsletter_email7" type="text" name="tinhthanh" placeholder="Quận / huyện / Tỉnh / Thành"    class="tinh" required>
                                      <input class="newsletter_email8" type="text" name="email" placeholder="Email"    value="{{$data['Email_Customer']}}" required>
                                      <input class="newsletter_email9" type="text"  name="diachi" placeholder="Địa Chỉ"   required>
                                  </div>
                                  @endforeach
                          @else
                                  <div >
                                    <input class="newsletter_email5" type="text" name="name" placeholder="Họ Và Tên"     required>
                                    <input class="newsletter_email6" type="text"  name="sdt" placeholder="Số Điện Thoại"    required>
                                    <input class="newsletter_email7" type="text" name="tinhthanh" placeholder="Quận / huyện / Tỉnh / Thành"    class="tinh" required>
                                    <input class="newsletter_email8" type="email" name="email" placeholder="Email"    required>
                                    <input class="newsletter_email9" type="text"  name="diachi" placeholder="Địa Chỉ"   required>
                                </div>
                          @endif   
                    <div style="text-align: center;margin-top:20px">
                      <h4>Đơn Hàng</h4>
                    </div> 
                        <table class="tbldathang">
                              <tr class="tr1">
                                  <td class="td1"><b>SẢN PHẨM</b></td>
                                  <td class="td1"><b>THÀNH TIỀN</b></td>
                              </tr>
                              @php
                                $total = 0;
                            @endphp
                           
                                  @foreach (Session::get('cart') as $key =>$cart)
                                        @php
                                              $subtotal = $cart['product_price']*$cart['product_qty'];
                                              $total += $subtotal;
                                          @endphp
                                        <tr class="tr2">
                                            <td class="td1">{{$cart['product_name']}}-{{$cart['id_color']}}-{{$cart['id_size']}} x {{$cart['product_qty']}}</td>
                                            <td class="td1">{{number_format($subtotal)}} vnđ</td>
                                            <input type="hidden" name="total" value="{{$total}}">
                                        </tr>
                                  @endforeach
                                  
                            @if (Session::get('coupon'))
                                @foreach (Session::get('coupon') as $key =>$cou)
                                      @if ($cou['lever'] == 2)
                                          @php
                                              $total_coupon = ($total*$cou['coupon_number'])/100;
                                          @endphp
                                                <tr class="tr2">
                                                  <td class="td1">Khuyến mãi: </td>
                                                  <td class="td1">{{number_format($cou['coupon_number'])}}%</td>
                                                </tr>
                                                <tr class="tr1">
                                                  <td class="td1"><b>Tổng Tiền</b></td>
                                                  <td style="background: #fff"><b>{{number_format($total_coupon)}} vnđ</b></td>
                                                  <input type="hidden" name="total" value="{{$total_coupon}}">
                                                </tr>  
                                      @elseif ($cou['lever'] == 1)
                                              <tr class="tr2">
                                                <td class="td1">Khuyến mãi: </td>
                                                <td class="td1">{{number_format($cou['coupon_number'])}}vnđ</td>
                                              </tr>
                                          @php
                                              $total_coupon= $total -  $cou['coupon_number'];
                                          @endphp
                                          <tr class="tr1">
                                            <td class="td1"><b>Tổng Tiền</b></td>
                                            <td style="background: #fff"><b>{{number_format($total_coupon)}} vnđ</b></td>
                                            <input type="hidden" name="total" value="{{$total_coupon}}">
                                          </tr> 
                                      @endif
                                @endforeach
                           @else
                              <tr class="tr1">
                                <td class="td1"><b>Tổng Tiền</b></td>
                                <td style="background: #fff"><b>{{number_format($total)}} vnđ</b></td>
                                <input type="hidden" name="total" value="{{$total}}">
                              </tr> 
                           @endif
                        </table>
                    </div>
                    <div style="margin-top: 30px">
                      <input type="submit" class="btn btn-primary" value="Đặt Hàng" >
                   </div>
                @else
                    {{-- @if(session()->has('success'))
                        <div class="alert alert-success">
                          {{ session()->get('success') }}
                        </div>
                    @endif --}}
                    <div style="text-align: center">
                      <h4>Đơn Hàng Trống</h4>
                    </div>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection