@extends('Layout.admin')


@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Slider</li>
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
          <a href="{{route('Slider_create')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
       </div>

       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table" style="">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $stt=1;
                  ?>
                  @foreach ( $Slider as $data)
                  <tr style="margin-top: 5px">
                    <td>{{ $loop->index + 1 }}</td>
                    <td><b>{{$data->name_slider}}</b></td>
                    <td>
                      <img style="height: 200px" src="{{asset('public'.$data->image_slider)}}" alt="">
                    </td>
                    <td >
                      <a href="{{route('Slider_Edit',['id_slider'=>$data->id_slider])}}"><button  type="button" class="btn btn-success"><i class="bi ri-pencil-fill"></i></button></a>
                      <a onclick="return confirm('Bạn có muốn xóa ')" href="{{route('Slider_deleted',['id_slider'=>$data->id_slider])}}"><button  type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                    </td>
                  </tr> 
                  <?php
                   $stt++;
                  ?>
                  @endforeach
                </tbody>
              </table>
      </div>
        </div>
      </div>
    </section>  
   
  </main>
@endsection

