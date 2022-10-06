@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Tin Tức</a></li>
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
                            <td style="font-size: 30px">{{$New->Name_News}}</td>
                        </tr>
                        <tr>
                            <td ><img src="{{asset('public'.$New->img_news)}}" alt=""></td>
                        </tr>
                        <tr>
                            <td>{!!$New->content!!}</td>
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