@extends('Layout.admin')
@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
     
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Order</li>
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
       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table" >
                <thead style="background: rgb(211, 214, 219)">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Tỉnh Thành</th>
                    <th scope="col">Mã KM</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Tình Trạng</th>
                    <th scope="col">Thao Tác</th>
                  </tr>
                </thead>

                <tbody>
                @foreach($order as $data)
                  <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->Phone}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>{{$data->dia_chi}}</td>
                    <td>{{$data->Tinh_thanh}}</td>
                    <td>{{$data->coupon_code}}</td>
                    <td>{{number_format($data->total)}} vnđ</td>
                    
                      <?php
                            if($data->lever == 0){
                              ?>
                                    <td>
                                        <a href="{{route('active_0',['id_order'=>$data->id_order])}}">Soạn Hàng</a>
                                    </td>
                              <?php
                            }elseif($data->lever == 1){
                                ?>
                                      <td>
                                          <a href="{{route('active_1',['id_order'=>$data->id_order])}}">Đang Giao</button></a>
                                      </td>
                                <?php
                            }else{
                                  ?>
                                    <td>
                                        <a href="{{route('active_2',['id_order'=>$data->id_order])}}">Đã giao</button></a>
                                    </td>
                                  <?php
                            }
                           ?>
                    
                    <td >
                      <a href="{{route('order_details',['order_code'=>$data->order_code])}}"><button  type="button" class="btn btn-success"><i class="bi ri-pencil-fill"></i></button></a>
                      <a onclick="return confirm('Bạn có muốn xóa')" href="{{route('order_delete',['order_code'=>$data->order_code])}}"><button  type="button" class="btn btn-danger"><i class="bi bi bi-trash"></i></button></a>
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

