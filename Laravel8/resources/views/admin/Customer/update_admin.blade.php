@extends('Layout.admin')

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Update Admin</li>
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
              <form action="{{route('Update_admin_post',['id_Customer'=>$admin->id_Customer])}}" method= "post" autocomplete="off"> 
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Admin</label>
                  <div class="col-sm-10">
                    <input type="text" name="admin_name" value="{{$admin->name_Customer}}" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="{{$admin->phone_Customer}}" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" value="{{$admin->Email_Customer}}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="password" class="form-control" placeholder="Nhập password mới" required>
                    </div>
                  </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <div class="text-center">
                <a href="{{route('index_admin')}}"> <button type="submit" class="btn btn-primary"><<</button></a>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection
