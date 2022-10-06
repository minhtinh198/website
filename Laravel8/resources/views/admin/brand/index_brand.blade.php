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
          <li class="breadcrumb-item active">Brand </li>
        </ol>
      </nav>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
    @endif
    <section class="section dashboard">
      <div class="row">
       <div class="col-md-12">
          <a href="{{route('Brand_create')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
       </div>

       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table"  >
                <thead >
                  <tr>
                    <th scope="col"></th>
                    <th scope="col" >Thương Hiệu</th>
                    <th scope="col">Ngày Thêm</th>
                    <th scope="col">Thao Tác</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($brand as $data)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$data->name_brand}}</td>
                    <td>{{$data->created_at}}</td>
                    <td >
                      <a href="{{route('Brand_Edit',['id_brand'=>$data->id_brand])}}"><button   type="button" class="btn btn-success"><i class="bi ri-pencil-fill"></i></button></a>
                      <a onclick="return confirm('Bạn có muốn xóa')" href="{{route('Brand_deleted',['id_brand'=>$data->id_brand])}}"><button  type="button" class="btn btn-danger"><i class="bi bi bi-trash"></i></i></button></a>
                    </td>
                  </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </section>
  </main>
@endsection

