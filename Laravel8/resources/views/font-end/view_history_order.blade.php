@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Đơn Hàng Chi Tiết</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="main">
    <div class="container">
      <div class="row margin-bottom-40">
        <div class="col-md-12 col-sm-12">
          <div class="goods-page">
            <div class="goods-data clearfix">
              <div class="table-wrapper-responsive">
                  <table summary="Shopping cart">
                    <tr>
                      <th class="goods-page-ref-no">Name</th>
                      <th class="goods-page-quantity">Color</th>
                      <th class="goods-page-price">Size</th>
                      <th class="goods-page-price">Số Lượng</th>
                      <th class="goods-page-price">Giá</th>
                    </tr>  
                    @foreach ($data as $data)
                        <tr>
                            <td>{{$data->product_name}}</td>
                            <td>{{$data->color}}</td>
                            <td>{{$data->size}}</td>
                            <td>{{$data->product_qty}}</td>
                            <td>{{number_format($data->product_price)}} vnđ</td>
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