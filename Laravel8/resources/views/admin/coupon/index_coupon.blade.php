@extends('Layout.admin')

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Coupon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
        @endif
    <section class="section dashboard">
      <div class="row">
        <div class="col-md-12">
           <a href="{{route('create_coupon')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
        </div>
          <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5> 
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Tên Mã KM</th>
                        <th scope="col">Ngày BĐ</th>
                        <th scope="col">Ngày KT</th>
                        <th scope="col">Mã KM</th>
                        <th scope="col">Điều Kiện</th>
                        <th scope="col">Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stt=1;
                      ?>
                  @foreach ($coupon as $data)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>{{$data->coupon_name}}</td>
                            <td>{{$data->coupon_start}}</td>
                            <td>{{$data->coupon_end}}</td>
                            <td>{{$data->coupon_code}}</td>
                            @if ($data->lever==1)
                                <td>Giảm theo tiền</td>
                            @else
                                <td>Giảm theo %</td>
                            @endif
                            <td>
                                <a href="{{route('deleted_coupon',['id_coupon'=>$data->id_coupon])}}"> <button  type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                <a href="{{route('coupon_Email',[
                                  
                                  'coupon_code'=>$data->coupon_code
                                  
                                ])}}"> <button  type="button" class="btn btn-success"><i >Gửi</i></button></a>
                            </td>
                        </tr>
                  @endforeach
                    </tbody>
                  </table>
                  <h5 class="card-title"></h5> 
                </div>
          </div>
      </div>
    </section>
  </main>
@endsection

