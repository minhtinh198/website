@extends('Layout.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Search</li>
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
              <table class="table" style="">
                <thead>
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th>Danh Mục</th>
                    <th>Thương Hiệu</th>
                    <th>Số Lượng</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($Search_product_admin as $data)
                <tr style="margin-top: 5px">
                  <td><b>{{$data->name_product}} </b></td>
                  <td>
                    <img style="height: 100px" src="{{asset('public'.$data->img_product)}}" alt="">
                  </td>
                  <td>{{number_format($data->price)}}đ</td>
                  <td><b>{{optional($data->category)->name_category}}</b></td>
                   <td><b>{{optional($data->brand)->name_brand}}</b></td>  
                   <td>{{$data->qty}}</td>
                  <td >
                    <a href="{{route('Product_Edit',['id_product'=>$data->id_product])}}"><button  type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button></a>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa Slider này ko?')" href="{{route('Product_deleted',['id_product'=>$data->id_product])}}"><button  type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
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

