@extends('Layout.admin')

@section('title')
  <title>Admin</title>
@endsection




@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Color</a></li>
          <li class="breadcrumb-item active">Add Color</li>
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
          <div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form action="{{route('Color_add')}}" method= "post" autocomplete="off"> 
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3" class="col-form-label">Tên Màu</label>
                    <input type="text" name="namecolor" class="form-control" id="inputText" required="required">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3" class="col-form-label">Mã màu</label>
                  <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput"  title="Choose your color">
                  </div>
                </div> 
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <div class="text-center">
               <a href="{{route('Color_index')}}"> <button type="submit" class="btn btn-primary"><<</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
