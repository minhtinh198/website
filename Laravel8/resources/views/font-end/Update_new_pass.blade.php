@extends('font-end.home')
@section('content') 

<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{route('font_end')}}">Home</a></li>
                    <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Reset Password</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div >
    @if(session()->has('success'))
    <div class="alert alert-success " style="width: 700px; margin-left:450px">
      {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="col-lg-9">
    @php
        $token = $_GET['token'];
        $email = $_GET['email'];
    @endphp
    <form action="{{route('Rest_new_pass')}}" method="post" >
        @csrf
        <input type="hidden" name="email" value="{{$email}}">
        <input type="hidden" name="token" value="{{ $token}}">
        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <input class="newsletter_email1" type="text" name="pasword" placeholder="Nhập Password" required="required" data-error="Valid email is required.">
        </div>
        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Submit</button>
        </div>
    </form>
</div>
<div style="margin-left: 1000px">
    <div style="float: left; margin-right:50px"> <a href="{{route('font_end')}}">Trang Chủ</a></div>
     <div style="float: left"><a href="">Giỏ hàng</div>
 </div>
@endsection