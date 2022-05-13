<div>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <h3 class="font-weight-bolder text-white mt-4">Dashboard</h3>
          </nav>
        </div>
      </nav>
      <!-- End Navbar -->
      
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Reservations</p>
                      <h5 class="font-weight-bolder">
                        {{ $pendings }}
                      </h5>
                      {{-- <a class="btn btn-primary d-grid gap-2" href="{{ route('admin.reservations') }}">Go to Reservations</a> --}}
                      {{-- <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                        since yesterday
                      </p> --}}
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                  {{-- <div class="col-12 mt-4 mb-0">
                    <a class="btn btn-primary btn-lg d-grid gap-2" href="{{ route('admin.reservations') }}">Go to Reservations</a>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Accepted reservations</p>
                      <h5 class="font-weight-bolder">
                        {{ $approved }}
                      </h5>
                      {{-- <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                        since last week
                      </p> --}}
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Total overall reservations</p>
                      <h5 class="font-weight-bolder">
                        {{ $overall }}
                      </h5>
                      {{-- <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                        since last week
                      </p> --}}
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row mt-4">
          <div class="col-lg- mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
              <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Sales overview</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-arrow-up text-success"></i>
                  <span class="font-weight-bold">4% more</span> in 2021
                </p>
              </div>
              <div class="card-body p-3">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
       
    </div>
</div>
