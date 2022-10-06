@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Lịch Sử Đơn Hàng</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
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
              <div class="table-wrapper-responsive">
                  <table summary="Shopping cart">
                    <tr>
                      <th class="goods-page-description">Name</th>
                      <th class="goods-page-ref-no">Email</th>
                      <th class="goods-page-quantity">Ngày Đặt</th>
                      <th class="goods-page-price">Tổng Tiền</th>
                      <th class="goods-page-price">Trạng Thái</th>
                      <th class="goods-page-price">Thao Tác</th>
                    </tr>  
                    @foreach ($history as $history)
                    <tr>
                        <td>{{$history->name}}</td>
                        <td>{{$history->Email}}</td>
                        <td>{{$history->created_at}}</td>
                        <td>{{number_format($history->total)}} vnđ</td>
                            <?php
                                if($history->lever == 0){
                                ?>
                                        <td style="color: red">
                                            Đang Soạn Hàng
                                        </td>
                                        <td>
                                            <a href="{{route('deleted_history',['order_code'=>$history->order_code])}}"><input type="button" value="Hủy"></a>
                                           <a href="{{route('details_history',['order_code'=>$history->order_code])}}"> <input type="button" value="Thông Tin"></a>
                                        </td>
                                <?php
                                }elseif($history->lever == 1){
                                    ?>
                                        <td >
                                            <b>Đang Giao Hàng</b>
                                        </td>
                                        <td>
                                            <a href="{{route('details_history',['order_code'=>$history->order_code])}}"> <input type="button" value="Thông Tin"></a>
                                        </td>
                                    <?php
                                }else{
                                    ?>
                                        <td style="color: blue">
                                            <b>Đã Giao Hàng</b>
                                        </td>
                                        <td>
                                            <a href="{{route('details_history',['order_code'=>$history->order_code])}}"> <input type="button" value="Thông Tin"></a>
                                        </td>
                                    <?php
                                }
                            ?>
                    
                       
                    </tr> 
                    @endforeach              
                  </table>     
              </div>
              
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection