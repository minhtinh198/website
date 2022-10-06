@extends('Layout.admin')

@section('content') 
<main id="main" class="main">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Product Add</li>
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
         <div class="col-lg-9">
          <div class="card" >
               
            <div class="card-body">
              <h5 class="card-title"></h5>
                <form action="{{route('Product_add')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Tên sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tensp" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" >Giá</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" class="form-control" name="gia" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" >Số Lượng</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" class="form-control" name="soluong" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="hinhanh" required >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Hình ảnh chi tiết</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="hinhanhchitiet[]"  multiple="multiple" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0" >Màu</legend>
                  <div class="col-sm-10">
                    @foreach ($color as $data)
                    <div class="form-check" >   
                        <input  type="checkbox" name="color[]" value="{{$data->id_color}}">
                      <input type="button" class="form-control form-control-color" style="background: {{$data->value_color}}" > 
                    </div>
                    @endforeach   
                  </div>
                </div>

                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0" >Size</legend>
                  <div class="col-sm-10">
                    @foreach ($size as $data)
                    <div class="form-check" >   
                        <input  type="checkbox" name="size[]" value="{{$data->id_size}}" >
                      <input type="button" class="form-control form-control-color" value="{{$data->value}}"> 
                    </div>
                    @endforeach   
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" >Loại sản phẩm</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="loaisanpham">
                      @foreach ($category as $data)
                      <option value="{{$data->id_category}}">{{$data->name_category}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Thương Hiệu </label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="thuonghieu">
                        @foreach ($brand as $data)
                        <option value="{{$data->id_brand}}">{{$data->name_brand}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" >Nội dung</label>
                  <div class="col-sm-10">
                    <textarea name="noidung" id="" cols="75" rows="5" required></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Tình Trạng</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status">
                      <option value="1">Hiện</option>
                      <option value="0">Ẩn</option>
                    </select>
                  </div>
                </div>
               
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               
              </form>
              <div class="col-sm-10">
                <a href="{{route('Product_index')}}"><button type="submit" class="btn btn-primary"><<</button></a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
