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
          <li class="breadcrumb-item active">Customer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
        @endif
    <section class="section dashboard">
      {{-- <div class="row">
       <div class="col-md-12">
          <a href="{{route('Customer_Email')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
       </div> --}}
       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $stt=1;
                   ?>
                 @foreach ($customer as $data)
                 <tr>
                  <th >{{ $loop->index + 1 }}</th>
                  <td>{{$data->name_Customer}}</td>
                  <td>{{$data->Email_Customer}}</td>
                  <td>{{$data->phone_Customer}}</td>
                  <td >
                   <a onclick="return confirm('Bạn có muốn xóa ')" href="{{route('deleted',['id_Customer'=>$data->id_Customer])}}"> <button  type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
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

