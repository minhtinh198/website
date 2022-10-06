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
          <li class="breadcrumb-item active">Brand Update</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif
    <section class="section dashboard">
      <div class="row">
         <div class="col-lg-8">
          <div class="card">
          @foreach($brand as $data)
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form action="{{route('Brand_Update',['id_brand'=>$data->id_brand])}}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3"class="col-sm-2 col-form-label">Thương hiệu</label>
                    <input type="text" name="tenthuonghieu" class="form-control" value="{{$data->name_brand}}">  
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <div class="text-center">
                <a href="{{route('Brand_index')}}"> <button type="submit" class="btn btn-primary"><<</button></a>
               </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection