@extends('Layout.admin')
@section('content') 
<main id="main" class="main">
    <section class="section dashboard" style="margin-top: 200px">
      <div class="row">

          <div class="col-lg-8">
            <div class="row">

            
                <div class="col-xxl-3 col-md-6">
                  <div class="card info-card sales-card">
                    <div class="card-body">
                      <h5 class="card-title">Đơn Hàng<span></span></h5>
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{$orders}}</h6>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
              

              <!-- Revenue Card -->
             
              <div class="col-xxl-5 col-md-6">
                <div class="card info-card revenue-card">

                  
                  
                  <div class="card-body">
                    <h5 class="card-title">Danh Thu<span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{number_format($order)}} vnđ </h6> 
                        

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->
           

              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

               

                  <div class="card-body">
                    <h5 class="card-title">Customers <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$custommer}}</h6>
                        

                      </div>
                    </div>

                  </div>
                </div>
              </div><!-- End Customers Card -->
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection
