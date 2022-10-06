<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('Dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
{{-- 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Thống kê</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav --> --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Category_index')}}">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Loại Sản phẩm</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Brand_index')}}">
          <i class="bi bi-gem"></i>
          <span>Thương Hiệu</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Product_index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Sản phẩm</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Customer_index')}}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('index_admin')}}">
          <i class="ri-admin-fill"></i>
          <span>Admin</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Slider_index')}}">
          <i class="bi bi-journals"></i>
          <span>Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Color_index')}}">
          <i class="bi bi-card-list"></i>
          <span>Mã màu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Coupon_index')}}">
          <i class="bi bi-layers"></i>
          <span>Khuyến mãi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Order_index')}}">
          <i class="bx bi-cart4"></i>
          <span>Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Review_index')}}">
          <i class="bi bi-chat-dots"></i>
          <span>Bình luận</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('index_News_admin')}}">
          <i class="ri-24-hours-fill"></i>
          <span>Tin Tức</span>
        </a>
      </li>
    </ul>
  </aside>