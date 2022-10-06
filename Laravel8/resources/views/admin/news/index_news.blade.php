@extends('Layout.admin')


@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Tin Tức</li>
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
          <a href="{{route('add_News')}}"><button style="float: right;" type="button" class="btn btn-info float-right m-2">Add</button></a>
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
                            @foreach ( $News as $data)
                            <tr style="margin-top: 5px">
                                <td>{{ $loop->index + 1 }}</td>
                                <td><b>{{$data->Name_News}}</b></td>
                                <td>
                                <img style="height: 200px" src="{{asset('public'.$data->img_news)}}" alt="">
                                </td>
                                <td >
                                <a href="{{route('Update_News',['id_news'=>$data->id_news])}}"><button  type="button" class="btn btn-success"><i class="bi ri-pencil-fill"></i></button></a>
                                <a onclick="return confirm('Bạn có muốn xóa ')" href="{{route('deleted_News',['id_news'=>$data->id_news])}}"><button  type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
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

