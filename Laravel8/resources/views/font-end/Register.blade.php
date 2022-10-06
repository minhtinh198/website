@extends('font-end.home')
@section('content') 

<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Register</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
        <div class="alert alert-success " style="margin-left: 450px;width: 700px" > 
          {{ session()->get('success') }}
        </div>
@endif

<div class="col-lg-9">
   
    <form action="{{route('Customer_add')}}" method="post" autocomplete="off">
        @csrf
        
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="text" placeholder="Họ và tên" required="required" data-error="Valid email is required." name="name">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="email" placeholder="email" required="required" data-error="Valid email is required." name="email">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="password" placeholder="Password" required="required" data-error="Valid email is required." name="password">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="password" placeholder="Điện thoại" required="required" data-error="Valid email is required."name="phone">
        </div>
       
        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <button id="newsletter_submit3" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Đăng Ký</button>
        </div>
    </form>
    
</div>
<div style="margin-left: 1000px">
       <div style="float: left; margin-right:50px"> <a href="{{route('font_end')}}">Trang Chủ</a></div>
        <div style="float: left"><a href="Shopping_Cart">View Cart</a></div>
    </div>
@endsection