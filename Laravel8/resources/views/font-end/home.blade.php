<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('public/font-end/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    {{-- sản phẩm --}}
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/main5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/responsive1.css')}}">
    {{-- sản phẩm chi tiết --}}
<link rel="stylesheet" href="{{asset('public/font-end/plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/single_styles7a.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/single_responsive.css')}}">
    {{-- category --}}
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/category6.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/categories_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/bootstrap4/button1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-end/styles/sweetalert.css')}}">

</head>

<body>

<div class="super_container">

	@include('font-end.partials.header')
    @yield('content')
	@include('font-end.partials.footer')

</div>


<script src="{{asset('public/font-end/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/font-end/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/font-end/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/font-end/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/font-end/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/font-end/plugins/easing/easing.js')}}"></script>
<script src="{{asset('public/font-end/js/custom.js')}}"></script>
@yield('script')
<script src="{{asset('public/font-end/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('public/font-end/js/single_custom.js')}}"></script>
<script src="{{asset('public/font-end/js/categories_custom.js')}}"></script>
<script src="{{asset('public/font-end/js/sweetalert.min.js')}}"></script>

{{-- phần alert --}}
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>




<script>
    $(document).ready(function(){                         
        var product_id  = $('.product_id_').val();
        var product_name  = $('.product_name_').val();
        var img_product  = $('.img_product_').val();
        
        var gia  = $('.gia_').val();

        
        var id_color = $('.color').val() ;
         $('.color').click(function(){ 
            id_color  =  $(this).data('id_color'); 
        }) ; 

        var id_size = $('.size_id').val() ;
        $('.size_id').click(function(){ 
                id_size  =  $(this).data('id_size');      
        }) ;   
       
        $('.add-to-cart').click(function(){  
                        var soluongkho  = $('.soluong_kho').val();
                        var qty  = $('.qty_').val();       //nằm trong để lấy dc value khi thay đổi
                        var _token = $('input[name="_token"]').val(); 
                        if(parseInt(qty)>parseInt(soluongkho))
                        {
                            alert('số lượng không tồn tại');
                        
                        }else{
                             $.ajax({
                                        url : '{{route('add_Cart')}}',
                                        method: 'POST',
                                        data:{product_id:product_id,product_name:product_name,gia:gia,qty:qty,img_product:img_product,id_color:id_color,id_size:id_size,_token:_token},
                                        success:function(data){
                                            alertify.success('Thêm sản phẩm thành công');
                                            location.reload();    //tự load lại trang
                                        }
                                }) ;
                        }
                       
                                       
        }) ;     
        
         
                                      
    });

</script>

</body>

</html>
