{{-- <style>
    .sidebar_section .active {
        color: red;
    }
    .sidebar_categories .active{
        color: red;
    }
</style> --}}

<div class="sidebar_section">
    <div class="sidebar_title">
        <h5><b>Loại Sản Phẩm</b></h5>
    </div>
    <ul class="sidebar_categories">
        @foreach ($category as $data)
            <li><a href="{{route('show_category',['id_category'=>$data->id_category])}}">{{$data->name_category}}</a></li>
        @endforeach
    </ul>
</div>


<div class="sidebar_section">
    <div class="sidebar_title">
        <h5><b>Thương Hiệu</b></h5>
    </div>
    <ul class="sidebar_categories">
        @foreach ($brand as $data)
        <li><a href="{{route('show_brand',['id_brand'=>$data->id_brand])}}">{{$data->name_brand}}</a></li>
        @endforeach
    </ul>
</div>

