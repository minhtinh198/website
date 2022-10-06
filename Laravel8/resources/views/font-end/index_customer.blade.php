@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Thông Tin Khách Hàng</a></li>
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
                  <table summary="Shopping cart" style="width: 900px; margin:auto">
                    <tr>
                      <th class="goods-page-ref-no">Name</th>
                      <th class="goods-page-quantity">Email</th>
                      <th class="goods-page-price">Phone</th>
                      <th class="goods-page-price">Thao Tác</th>
                    </tr>  
                    <tr>
                        <td>{{$customer->name_Customer}}</td>
                        <td>{{$customer->Email_Customer}}</td>
                        <td>{{$customer->phone_Customer}}</td>
                        <td>
                            <a href="{{route('edit_khachhang',['id_Customer'=>$customer->id_Customer])}}"><input type="button" value="Sữa"></a>
                        </td>
                    </tr>
                               
                  </table>     
              </div>
              
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection