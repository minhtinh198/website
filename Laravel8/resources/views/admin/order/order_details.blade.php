@extends('Layout.admin')
@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
     
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Đơn Hàng</a></li>
          <li class="breadcrumb-item active">Chi Tiết</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if(session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    @endif
    <section class="section dashboard">
      <div class="row">
       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table" >
                <thead style="background: rgb(211, 214, 219)">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">ID_product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>
                    <th scope="col">SL</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thành Tiền</th>
                  </tr>
                </thead>

                <tbody>
                    @php
                      $total =0;
                   @endphp
                        @foreach($order_details as $data)
                              @php
                                $a=($data->product_price)*($data->product_qty);
                                $total +=$a;
                            @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$data->product_id}}</td>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->color}}</td> 
                                    <td>{{$data->size}}</td>
                                    <td>{{$data->product_qty}}</td>
                                    <td>{{number_format($data->product_price)}} vnđ</td>
                                    <td>{{number_format($a)}} vnđ</td>
                                </tr> 
                      @endforeach 
                      @if($coupon)
                            @if ($coupon->lever == 2)
                                <tr>
                                  <td colspan="6"></td>
                                  <td><b>Khuyến Mãi : </b></td>
                                  <td><b>{{number_format($coupon->coupon_number)}} %</b></td>
                                </tr>
                                <tr>
                                  <td colspan="6"></td>
                                  <td><b>Tổng Tiền :</b></td>
                                  <td><b>{{number_format($coupon->total)}}  vnđ</b></td>
                                </tr>
                            @else
                                  <tr>
                                    <td colspan="6"></td>
                                    <td><b>Khuyến Mãi : </b></td>
                                    <td><b>{{number_format($coupon->coupon_number)}} vnđ</b></td>
                                  </tr>
                                  <tr>
                                    <td colspan="6"></td>
                                    <td><b>Tổng Tiền :</b></td>
                                    <td><b>{{number_format($coupon->total)}}  vnđ</b></td>
                                  </tr>
                              @endif
                    @else
                    <tr>
                      <td colspan="6"></td>
                      <td><b>Khuyến Mãi : </b></td>
                      <td><b>Null</b></td>
                    </tr>
                    <tr>
                      <td colspan="6"></td>
                      <td><b>Tổng Tiền :</b></td>
                      <td><b>{{number_format($total)}}  vnđ</b></td>
                    </tr>
                @endif
                </tbody>
              </table>
                
            </div>
          </div>
      </div>
      
    </section>
    <div><a href="{{route('Print_Order',['order_code'=>$data->order_code])}}"><input type="button" value="In đơn hàng"></a></div>
  </main>
@endsection

