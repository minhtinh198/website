@extends('Layout.admin')

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Brand add</li>
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
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form action="{{route('Brand_add')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-sm-10">
                     <b> <label for="inputEmail3"class="col-sm-2 col-form-label">Thương hiệu</label></b>
                        <input type="text" name="tenthuonghieu" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
              <a href="{{route('Brand_index')}}"><button type="submit" class="btn btn-primary"><<</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection