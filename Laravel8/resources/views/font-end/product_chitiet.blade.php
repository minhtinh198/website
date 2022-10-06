@extends('font-end.home')
@section('content') 
@foreach ($product as $data)

<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Product's</a></li>
                </ul>
            </div>

        </div>
    </div>


    <form class="form_chitiet" action="{{route('add_Cart')}}" method="POST">
        @csrf
        <input type="hidden"  value="{{$data->id_product}}" class="product_id_">
        <input type="hidden"  value="{{$data->name_product}}" class="product_name_">
        <input type="hidden"  value="{{$data->price}}" class="gia_">
        <input type="hidden"  value="{{$data->img_product}}" class="img_product_">
        <input type="hidden"  value="{{$data->qty}}" class="soluong_kho">
        
    <div class="row">
        
        <div class="col-lg-7">
            <div class="single_product_pics"  >
                <div class="col-lg-9 image_col order-lg-2 order-1"  >
                    <div class="single_product_image" >
                        <div class="single_product_image_background" style="background-image:url({{asset('public'.$data->img_product)}})">
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="single_product_thumbnails">
                    <ul>
                       @foreach ($product_chitiet as $item)
                       <li><img src="{{asset('public'.$item->img_product_img)}}" alt="" data-image="{{asset('public'.$item->img_product_img)}}"></li>
                       @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h3>{{$data->name_product}}</h3>
                </div>
                {{-- <div style="font-size: 17px">Thương Hiệu : <b>{{$data->name_brand}}</b></div>
                <div style="font-size: 17px">Danh Mục : <b>{{$data->name_category}}</b></div> --}}
                <div class=""><h4 style="color: red">{{number_format($data->price)}} vnđ</h4></div>
                {{-- <ul class="star_rating">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                </ul> --}}
                <div class="size_boder" > 
                </div>
                 <div class="product_color">
                    <h5 class="h_color">Màu sắc</h5>
                     <div class="size">
                         @foreach ($product_colors as $item)
                         <div class="pretty p-default p-curve" style="background: {{$item->value_color}}" >
                            <input type="radio" id="{{$item->name_color}}" class="color" data-id_color="{{$item->name_color}}" name="color" value="{{$item->name_color}}"/>
                            <div class="state p-warning-o" >
                              <label ></label>
                            </div>
                          </div>
                         @endforeach
                         
                     </div>
                 </div>      
                    <div class="size_boder1" > 
                    </div>
                    <div class="product_size" >
                            <h5 class="h_size">Size</h5>
                            <div class="size">
                                @foreach ($product_sizes as $item)
                                <div class="pretty p-default p-curve" style="margin: 10px">
                                    <input type="radio" data-id_size="{{$item->value}}"  class="size_id"   name="size" value="{{$item->value}}"/>
                                    <div class="state p-warning-o">
                                    <label >{{$item->value}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <span><b><h4>Số Lượng :</h4> </b>  </span>
                    <input type="number" name="number" min="1" class="qty_" value="1">
                </div>
                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <button type="button" id="add-to-cart" class="add_to_cart_button1 add-to-cart"  name="add-to-cart">Thêm Giỏ HÀNG</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endforeach  
<div class="tabs_section_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabs_container">
                    <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                        <li class="tab active" data-active-tab="tab_1"><span>Nội Dung</span></li>
                        <li class="tab" data-active-tab="tab_3"><span>Bình Luận</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Tab Description -->
                <div id="tab_1" class="tab_container active">
                    <div class="row">
                        <div class="col-lg-5 desc_col">
                            <div class="tab_text_block">
                                <p style="color: black">{!!$data->mota_product!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                                                
               

                <!-- Tab Additional Info -->
                <!-- Tab Reviews -->

                <div id="tab_3" class="tab_container">
                    <div class="row">

                        <!-- User Reviews -->

                        <div class="col-lg-6 reviews_col">
                            <div class="tab_title reviews_title">
                                <h4>Bình luận</h4>
                            </div>

                            <!-- User Review -->

                           @foreach ($review as $data)
                           <div class="user_review_container d-flex flex-column flex-sm-row">
                            <div class="user">
                                <div><img class="user_pic" src="{{asset('public/font-end/images/desc_3.jpg')}}" alt=""></div>
                                {{-- <div class="user_rating">
                                    <ul class="star_rating">
                                        @for ($i = 0; $i < 5; $i++)
                                             <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        @endfor
                                    </ul>
                                </div> --}}
                            </div>
                            <div class="review">
                                <div class="review_date">{{$data->created_at}}</div>
                                <div class="user_name">{{$data->name_review}}</div>
                                <p>{{$data->review}}</p>
                            </div>
                        </div>
                           @endforeach
                        </div>

                        <!-- Add Review -->

                        <div class="col-lg-6 add_review_col">
                            <div class="add_review">
                                @foreach ($product as $data)
                                        <form  action="{{route('Review')}}" method="POST" autocomplete="off">
                                            @csrf
                                            <div>
                                                <h1>Add bình luận</h1>
                                                <input type="hidden"  value="{{$data->id_product}}" name="product_id">
                                                <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
                                                <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                                            </div>
                                            <div>
                                                {{-- <h1>Your Rating:</h1>
                                                <ul class="user_star_rating">
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                </ul> --}}
                                                <textarea id="review_message" class="input_review" name="message" placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
                                            </div>
                                            <div class="text-left text-sm-right">
                                                <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                            </div>
                                        </form>
                                @endforeach  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <b style="font-size: 15px">Sản phẩm liên quan</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">
    
                            <!-- Slide 1 -->
                           
                            @foreach ($product_lienquan as $data)
                            <div class="owl-item product_slider_item">
                                <div class="product-item">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}"><img src="{{asset('public/'.$data->img_product)}}" alt=""></a> 
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html"></a></h6>
                                            <div class="product_price">gia<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                           
                        </div>
    
                        <!-- Slider Navigation -->
    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
 
@endsection