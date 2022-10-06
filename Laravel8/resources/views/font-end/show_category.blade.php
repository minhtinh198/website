@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Category</a></li>
                </ul>
            </div>
                    
            <!-- Sidebar -->

            <div class="sidebar">
                @include('font-end.partials.sibar')
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <h5><b>Khoảng Giá</b></h5>
                    </div>
                    <ul class="sidebar_categories"> 
                        <li><a class="{{Request::get('price')==1 ? 'active' : ''}}" href="?price=1">0 - 250.000</a></li>
                        <li><a class="{{Request::get('price')==2 ? 'active' : ''}}" href="?price=2">250.000 - 500.000</a></li>
                        <li><a class="{{Request::get('price')==3 ? 'active' : ''}}" href="?price=3">500.000 - 750.000</a></li>
                        <li><a class="{{Request::get('price')==4 ? 'active' : ''}}" href="?price=4">Giá trên 750.000</a></li>
                    </ul>
                </div>
            </div>
           

            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">


                            <form action="" id="form_oder" method="get">
                                <div class="product_sorting_container product_sorting_container_top" >
                                            <select name="oderby" class="oderby">
                                                <option value="md">  Mặc định</option>
                                                <option value="min">  Giảm dần</option>
                                                <option value="max">  Tăng dần</option>
                                            </select>
                                </div>
                            </form>

                            <div class="product-grid">
                                @foreach ($show_category as $data)
                                    <div class="product-item accessories">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}"><img src="{{asset('public'.$data->img_product)}}" alt=""></a>
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}">{{$data->name_product}}</a></h6>
                                                <div class="product_price">{{number_format($data->price)}} vnđ</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Benefit -->

{{-- <div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>free shipping</h6>
                        <p>Suffered Alteration in Some Form</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>cach on delivery</h6>
                        <p>The Internet Tend To Repeat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>45 days return</h6>
                        <p>Making it Look Like Readable</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>opening all week</h6>
                        <p>8AM - 09PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('script')
    <script>
        $(function(){
            $('.oderby').change(function(){
                $("#form_oder").submit();
            })
        })
    </script>
@endsection