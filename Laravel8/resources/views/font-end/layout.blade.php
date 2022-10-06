@extends('font-end.home')
@section('content') 

@foreach ($Slider as $Slider)
<div class="main_slider" style="background-image:url({{asset('public'.$Slider->image_slider)}})">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>{{$Slider->name_slider}}</h6>
                    <h1>{{$Slider->mota_slider}}</h1>
                    <div class="red_button shop_now_button"><a href="#">shop now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
    <!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url({{asset('public/font-end/images/banner_1.jpg')}})">
						<div class="banner_category">
							<a href="#">women's</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url({{asset('public/font-end/images/banner_2.jpg')}})">
						<div class="banner_category">
							<a href="#">accessories's</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url({{asset('public/font-end/images/banner_3.jpg')}})">
						<div class="banner_category">
							<a href="#">men's</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->
	
	
	<div class="new_arrivals">
		<div class="container">
			{{-- <div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div> --}}
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col" >
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }' style="height: 450px">   
									@foreach ($product as $data)
										<div class="product-item accessories" >
											<div class="product discount product_filter">
												<div class="product_image">
													<a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}"><img src="{{asset('public/'.$data->img_product)}}" alt="" ></a>
												</div>
												<div class="favorite favorite_left"></div>
												<div class="product_info">
													<h6 class="product_name"><a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}">{{$data->name_product}}</a></h6>
													<div class="product_price">{{number_format($data->price)}} vnđ</div>
												</div>
											</div>
										</div>
									@endforeach
						</form>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div style="margin-left: 700px;margin-top: 15px">
		{{$product->links()}}
	</div>
	
	<!-- Deal of the week -->
	
	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
                        <img src="{{asset('public/font-end/images/deal_ofthe_week.png')}}" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">
							<!-- Slide 1 -->
							@foreach ($product as $data)
							<div class="owl-item product_slider_item" >
								<div class="product-item" >
									<div class="product discount">
										<div class="product_image">
                                           <a href="{{route('product_chitiet',['id_product'=>$data->id_product])}}"><img src="{{asset('public/'.$data->img_product)}}" alt=""></a> 
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>new</span></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
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
							<h6><b>Vận chuyển</b></h6>
							<p>Đồng giá 25k toàn quốc</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6><b>thanh toán</b></h6>
							<p>Thanh toán khi nhận hàng</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6><b>hệ thống cửa hàng</b></h6>
							<p>10 cửa hàng trên toàn hệ thống</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6><b>6 ngày đổi sản phẩm </b></h6>
							<p>Đổi trả sản phẩm trong 6 ngày</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Blogs -->

	{{-- <div class="blogs">
		<div class="container">
			<div class="row blogs_container">
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('public/font-end/images/blog_1.jpg')}})"></div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('public/font-end/images/blog_2.jpg')}})"></div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('public/font-end/images/blog_3.jpg')}})"></div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Newsletter -->
	<!-- Footer -->
	{{-- <div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Tên: Phạm Minh Tính</h4>
						<h4>Lớp: D16_TH03</h4>
						<h4>MSSV: DH51601533 </h4>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> --}}
@endsection