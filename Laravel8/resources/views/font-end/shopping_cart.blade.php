@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Shopping-Cart</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
@if(Session::get('cart'))
<div class="main">
    <div class="container">
      <div class="row margin-bottom-40">
        <div class="col-md-12 col-sm-12">
          <div class="goods-page">
            <div class="goods-data clearfix">
              <div class="table-wrapper-responsive">
               
                
                <form action="{{route('update_Cart')}}" method="POST">
                  @csrf
                  <table summary="Shopping cart">

                    <tr>
                      <th class="goods-page-image">Image</th>
                      <th class="goods-page-description">Sản phẩm</th>
                      <th class="goods-page-ref-no">Giá</th>
                      <th class="goods-page-quantity">Số lượng</th>
                      <th class="goods-page-price">Tổng</th>
                      <th class="goods-page-total" colspan="2"></th>
                    </tr>
                       @php
                           $total = 0;
                       @endphp
                            @foreach (Session::get('cart') as $key =>$cart)
                                @php
                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                    $total +=  $subtotal;
                                @endphp

                                  <tr class="tr">
                                    <td class="goods-page-image">
                                      <a href="javascript:;"><img src="{{asset('public'.$cart['product_image'])}}" alt="Berry Lace Dress"></a>
                                    </td>
                                    <td class="goods-page-description">
                                      
                                      <h3><a href="javascript:;">{{$cart['product_name']}}</a></h3>
                                     <p>
                                       <strong>Color : {{$cart['id_color']}}</strong>
                                    </p>
                                    <p>
                                      <strong>Size :  {{$cart['id_size']}} </strong>
                                    </p>
                                    </td>
                                    <td class="goods-page-ref-no">
                                      {{number_format( $cart['product_price'])}} vnđ
                                    </td>
                                    <td class="goods-page-quantity">
                                      <div class="product-quantity">
                                              <input type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                      </div>
                                    </td>
                                    <td class="goods-page-price">
                                      <strong><span></span> {{number_format( $subtotal )}} vnđ</strong>
                                    </td> 
                                    <td class="del-goods-col">
                                      <a class="del-goods" href="{{route('deleted_Cart',['session_id'=>$cart['session_id']])}}">&nbsp;x</a>
                                    </td>
                                  </tr>
                                
                              @endforeach
                             
                  </table>
                  <div>
                    <button class="btn btn-primary1" type="submit" name="update_qty">Update</button>
                  </div>
                </form>
               
              </div>
              <div class="shopping-total">
                <ul>
                 @if (Session::get('coupon'))
                        @foreach (Session::get('coupon') as $key =>$cou)
                              @if ($cou['lever'] == 2)
                                  @php
                                      $total_coupon = ($total*$cou['coupon_number'])/100;
                                  @endphp
                                  <li>
                                    <em>KM :</em>
                                    <strong class="price"><span></span>{{number_format($cou['coupon_number'])}}%</strong>
                                  </li>
                                  <li class="shopping-total-price">
                                    <em>Tổng</em>
                                    <strong class="price"><span></span>{{number_format($total_coupon)}} vnđ</strong>
                                  </li>
                              @elseif ($cou['lever'] == 1)
                                  <li>
                                    <em>KM :</em>
                                    <strong class="price"><span></span>{{number_format($cou['coupon_number'])}} vnđ</strong>
                                  </li>
                                  @php
                                      $total_coupon= $total -  $cou['coupon_number'];
                                  @endphp
                                  <li class="shopping-total-price">
                                    <em>Tổng</em>
                                    <strong class="price"><span></span>{{number_format($total_coupon)}} vnđ</strong>
                                  </li>
                              @endif
                        @endforeach
                @else
                    <li class="shopping-total-price">
                      <em>Tổng :</em>
                      <strong class="price"><span></span>{{number_format($total)}} vnđ</strong>
                     
                    </li>
                @endif
                </ul>
              </div>
            </div>
            @if(session()->has('success'))
              <div  class="alert col-sm-3 alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
            @if(Session::get('Login_user'))
                @foreach (Session::get('Login_user') as $key =>$data)  
                    <form action="{{route('check_coupon')}}" method="POST" autocomplete="off">
                      @csrf
                      <input type="hidden" name="id_customer" class="product_id" value="{{$data['id_Customer']}}">
                      <input class="btn btn-default" type="text" name="coupon" placeholder="Mã khuyến mãi"><i class="fa"></i>
                      <input class="btn btn-default1" type="submit" name="check_coupon" value="Nhập"><i class="fa"></i>
                    </form>
                  @endforeach
            @endif
              {{-- @if (Session::get('Login_user'))
                  <a href="{{route('Shopping_order')}}"><button class="btn btn-primary" type="buttton">Nhập thông tin </button></a>
              @else
                  <a href="{{route('Login')}}"> <button class="btn btn-primary" type="button">Nhập thông tin </button></a>
              @endif --}}
              <a href="{{route('Shopping_order')}}"><button class="btn btn-primary" type="buttton">Nhập thông tin </button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
      <div style="text-align: center">
        <h4>Giỏ Hàng Trống</h4>
      </div>
  @endif
  
  @endsection