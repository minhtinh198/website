<!-- Header -->

<header class="header trans_300">

    <!-- Top Navigation -->
    
    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">Hotline : 0869002778</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">
                            @if (Session::get('Login_user'))
                                @foreach (Session::get('Login_user') as $key =>$val)
                                        <li class="account">
                                            <a href="">
                                                {{$val['Email_Customer']}}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="account_selection">
                                                <li><a href="{{route('Logout_font_end',['session_id'=>$val['session_id']])}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign Out</a></li>
                                            </ul>
                                        </li>
                                @endforeach   
                             @else
                                    <li class="account">
                                        <a href="">
                                                My Account 
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <li><a href="{{route('Login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                            <li><a href="{{route('Register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                        </ul>
                                    </li>
                             @endif
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    
    
    
    <!-- Main Navigation -->
   
    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">colo<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{route('font_end')}}">home</a></li>
                            <li class="language1">
                                <a href="">
                                    Shop
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="language1_selection" >
                                   @foreach ($category as $item)
                                   <li ><a href="{{route('show_category',['id_category'=>$item->id_category])}}" >{{$item->name_category}}</a></li>
                                   @endforeach
                                </ul>
                            </li >
                            <li class="language1">
                                <a href="#">
                                    Thương hiệu
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="language1_selection" >
                                    @foreach ($brand as $item)
                                    <li ><a href="{{route('show_brand',['id_brand'=>$item->id_brand])}}" >{{$item->name_brand}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </li >
                            <li><a href="{{route('index_News')}}">Tin Tức</a></li>
                            @if (Session::get('Login_user'))
                                @foreach (Session::get('Login_user') as $key =>$data)
                                    <li><a href="{{route('view_history',['id_customer'=>$data['id_Customer']])}}">Đơn Hàng</a></li>
                                @endforeach
                            @endif
                        </ul>
                            <form action="{{route('Search')}}" method="POST" autocomplete="off">
                                @csrf
                                <ul class="navbar_user">
                                    <li> <input type="text" placeholder="Search" name="Search" class="form-control" required></li>
                                    <input type="submit" value="Search">
                                </ul>
                            </form>
                            @if (Session::get('Login_user'))
                                    @foreach (Session::get('Login_user') as $key =>$data)
                                        <ul class="navbar_user">
                                            <li><a href="{{route('index_khachhang',['id_Customer'=>$data['id_Customer']])}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                        </ul>
                                    @endforeach
                            @else
                                    <ul class="navbar_user">
                                        <li><a href="{{route('Login')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                    </ul>
                            @endif
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                    <a href=""> 
                        
                        <div class="top-cart-block" >
                            <a href="{{route('Shopping_Cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <span id="checkout_items" class="checkout_items">
                                @if(Session::get('cart'))
                                    {{count(Session::get('cart'))}}
                                @else
                                    0
                                @endif
                            </span>
                            @if(Session::get('cart'))
                            <div class="top-cart-content-wrapper">
                                <div class="top-cart-content" >
                                  <ul class="scroller" >   
                                            @foreach (Session::get('cart') as $key =>$cart)
                                            @php
                                                $subtotal = $cart['product_price']*$cart['product_qty'];
                                            @endphp
                                                    <li>
                                                    <img src="{{asset('public'.$cart['product_image'])}}" alt="Rolex Classic Watch" width="37" height="34">
                                                    <span class="cart-content-count">x {{$cart['product_qty']}}</span>
                                                    <strong>{{$cart['product_name']}}</strong>
                                                    <em>{{number_format( $subtotal)}}đ</em>
                                                    </li>
                                            @endforeach
                                  </ul>
                            
                                  <div class="text-right">
                                    <a href="{{route('Shopping_Cart')}}" class="btn btn-primary">View Cart</a>
                                  </div>
                                </div>
                              </div> 
                              @endif
                        </div>
                       
                    </a>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</header>



