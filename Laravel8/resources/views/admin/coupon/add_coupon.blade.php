@extends('Layout.admin')

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add Coupon</li>
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
              <form action="{{route('Add_coupon')}}" method= "post" autocomplete="off"> 
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên mã KM</label>
                  <div class="col-sm-10">
                    <input type="text" name="coupon_name" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mã KM</label>
                  <div class="col-sm-10">
                    <input type="text" name="coupon_code" class="form-control" required>
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                  <div class="col-sm-10">
                    <input type="date" name="coupon_start" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                  <div class="col-sm-10">
                    <input type="date"  name="coupon_end" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Giá trị</label>
                  <div class="col-sm-10">
                    <input type="text"  name="coupon_number" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Điều kiện</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"  name="lever">
                      <option value="1">Theo giá</option>
                      <option value="2">Theo phần trăm</option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <div class="text-center">
                <a href=""> <button type="submit" class="btn btn-primary"><<</button></a>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection

