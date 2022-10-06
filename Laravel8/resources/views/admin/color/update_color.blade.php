@extends('Layout.admin')

@section('title')
  <title>Admin</title>
@endsection




@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Color</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
              
              @foreach ($color as $data)
              <form action="{{route('Color_Update',$data->id_color)}}" method= "post" autocomplete="off"> 
                @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3" class="col-form-label">Tên Màu</label>
                    <input type="text" name="namecolor" value={{$data->name_color}} class="form-control" id="inputText" required="required">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-sm-10">
                  <label for="inputEmail3" class="col-form-label">Mã màu</label>
                  <input type="color" name="color" value="{{$data->value_color}}" class="form-control form-control-color" id="exampleColorInput"  title="Choose your color">
                  </div>
                </div> 
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
               <div class="text-center">
                <a href="{{route('Color_index')}}"> <button type="submit" class="btn btn-primary"><<</button></a>
               </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
