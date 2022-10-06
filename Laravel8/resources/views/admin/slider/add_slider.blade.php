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
          <li class="breadcrumb-item active">Slider Add</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="row">
         <div class="col-lg-9">
          <div class="card" >
               
            <div class="card-body">
              <h5 class="card-title"></h5>
                <form action="{{route('Slider_add')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" required >Tên Slider</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tenslider" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="img_slider"  required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" required >Nội dung</label>
                  <div class="col-sm-10">
                    <textarea name="mota_slider" id="" cols="75" rows="5" required></textarea>
                  </div>
                </div>

                <div class=" mb-30" >
                  <div class="col-sm-100" >
                    <button type="submit" class="btn btn-primary">Submit </button>
                  </div>
                </div>
              </form>
    
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
