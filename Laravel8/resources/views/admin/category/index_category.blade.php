@extends('Layout.admin')
@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
     
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
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
          <a href="{{route('Category_create')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
       </div>
       <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5> 
              <table class="table" >
                <thead style="background: rgb(211, 214, 219)">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Ngày Thêm</th>
                    <th scope="col">Thao Tác</th>
                  </tr>
                </thead>

                <tbody>
                @foreach($category as $data)
                  <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td>{{$data->name_category}}</td>
                    <td>{{$data->created_at}}</td>
                    <td >
                      <a href="{{route('Category_Edit',['id_category'=>$data->id_category])}}"><button  type="button" class="btn btn-success"><i class="bi ri-pencil-fill"></i></button></a>
                      <a onclick="return confirm('Bạn có muốn xóa')" href="{{route('Category_deleted',['id_category'=>$data->id_category])}}"><button  type="button" class="btn btn-danger"><i class="bi bi bi-trash"></i></button></a>
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

