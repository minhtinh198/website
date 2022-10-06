@extends('font-end.home')
@section('content') 

<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Edit Customer</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif --}}
@if(session()->has('success'))
        <div class="alert alert-success " style="margin-left: 475px;width: 700px" > 
          {{ session()->get('success') }}
        </div>
@endif

<div class="col-lg-9">
   
    <form action="{{route('Update_khachhang',['id_Customer'=>$Update_customer->id_Customer])}}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="lever" value="{{$Update_customer->lever}}">
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="text" placeholder="Họ và tên" value="{{$Update_customer->name_Customer}}" required="required" data-error="Valid email is required." name="name">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="email" placeholder="email" value="{{$Update_customer->Email_Customer}}" required="required" data-error="Valid email is required." name="email">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="password" placeholder="Nhập password mới" required="required" data-error="Valid email is required." name="password">
        </div>
        <div class="newsletter_form1 d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="text" placeholder="Điện thoại" value="{{$Update_customer->phone_Customer}}" required="required" data-error="Valid email is required."name="phone">
        </div>
       
        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <button id="newsletter_submit3" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Sữa</button>
        </div>
    </form>
    
</div>
<div style="margin-left: 1000px">
       <div style="float: left; margin-right:50px"> <a href="{{route('font_end')}}">Trang Chủ</a></div>
        <div style="float: left"><a href="Shopping_Cart">View Cart</a></div>
    </div>
@endsection