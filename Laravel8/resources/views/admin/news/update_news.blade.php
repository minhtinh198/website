@extends('Layout.admin')

@section('title')
  <title>Admin</title>
@endsection




@section('content') 
<main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
         <div class="col-lg-9">
          <div class="card" >
               
            <div class="card-body">
              <h5 class="card-title"></h5>
                <form action="{{route('Update_News_post',['id_news'=>$data->id_news])}}" method="post" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" required >Tin Tức</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$data->Name_News}}"  name="tenNews" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file"  name="img_News"  >
                    <img src="{{asset('public'.$data->img_news)}}" height="100" width="100">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" required >Nội dung</label>
                  <div class="col-sm-10">
                    <textarea name="mota_News" id="" cols="75"  rows="5" required>{{$data->content}}</textarea>
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
