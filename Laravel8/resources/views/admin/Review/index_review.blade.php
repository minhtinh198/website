@extends('Layout.admin')
@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
     
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Review</li>
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
                    <th scope="col">ID_Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Bình luận</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                   
                  </tr>
                </thead>

                <tbody>
                    @foreach ($review as $item)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td >{{$item->id_product}}</td>
                            <td >{{$item->name_review}}</td>
                            <td>{{$item->email_review}}</td>
                            <td class="a" style="width: 400px">{{$item->review}}</td>
                           <?php
                            if($item->status == 0){
                           ?>
                                <td>
                                    <a href="{{route('Unactive',['id_review'=>$item->id_review])}}"><button type="button" class="btn btn-success">Ẩn</button></a>
                                </td>
                           <?php
                            }else{
                           ?>
                                <td>
                                    <a href="{{route('active',['id_review'=>$item->id_review])}}"><button  type="button" class="btn btn-success">hiện</button></a>
                                </td>
                           <?php
                            }
                           ?>
                            <td >
                            <a onclick="return confirm('Bạn có muốn xóa')" href="{{route('detele_review',['id_review'=>$item->id_review])}}"><button  type="button" class="btn btn-danger"><i class="bi bi bi-trash"></i></button></a>
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

