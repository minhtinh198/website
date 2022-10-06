@extends('Layout.admin')


@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Update Category</li>
        </ol>
      </nav>
    </div>
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
          @foreach($category as $data)
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form action="{{route('Category_Update',['id_category'=>$data->id_category])}}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3"class="col-form-label">Loại sản phẩm</label>
                    <input type="text" name="tenloaisanpham" class="form-control" value="{{$data->name_category}}" required>  
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <div class="text-center">
                <a href="{{route('Category_index')}}"> <button type="submit" class="btn btn-primary"><<</button></a>
               </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection