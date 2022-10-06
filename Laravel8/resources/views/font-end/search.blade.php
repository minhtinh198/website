@extends('font-end.home')
@section('content') 
<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Search</a></li>
                </ul>
            </div>

            <!-- Sidebar -->

            <div class="sidebar">
                @include('font-end.partials.sibar')
            </div>
           

            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">
                            <div class="product-grid">

                                <!-- Product 1 -->
                                @foreach ($Search_product as $data)
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

                            <!-- Product Sorting -->

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Benefit -->


@endsection