<!--
=========================================================
* Argon Dashboard 2 - v2.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        Super Admin
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/c697883dae.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('css/main2.css') }}" rel="stylesheet" />
    
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Styles -->
    @livewireStyles
    @powerGridStyles
</head>

<div class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
            <span class="ms-1 font-weight-bold">Super Admin Dashboard</span>
        </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('super-admin.dashboard') }}" {{ request()->routeIs('super-admin.dashboard') ? 'active' : '' }}>
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-desktop text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.admins') }}" {{ request()->routeIs('super-admin.admins') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admins</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.locations') }}" {{ request()->routeIs('super-admin.locations') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-location-dot text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Locations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.building') }}" {{ request()->routeIs('super-admin.building') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-building text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Buildings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.category') }}" {{ request()->routeIs('super-admin.category') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-bed text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.house-rules') }}" {{ request()->routeIs('super-admin.category') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-list-check text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">House-rules</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.amenities') }}" {{ request()->routeIs('super-admin.category') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Amenities</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('super-admin.condo') }}" {{ request()->routeIs('super-admin.condo') ? 'active' : '' }}>
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-table-list text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Condo Listings</span>
                </a>
            </li>
            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="../pages/profile.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sign-out-alt text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>
          
        </ul>
        </div>
        <hr class="mt-4 horizontal dark mt-0">
        <div class="sidenav-footer mx-3">
            <div class="card card-plain shadow-none mt-5" id="sidenavCard">
              <img class="w-70 mx-auto" src="{{ asset('img/OneOasis_CDO_logo.jpg') }}" alt="sidebar_illustration" height="100">
            </div>
        </div>
    </aside>
  <main class="main-content position-relative border-radius-lg ">
       

        {{ $slot }}

        <!-- footer starts here -->
        <div class="container-fluid py-4">
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                        document.write(new Date().getFullYear())
                        </script>,
                        One Oasis
                    </div>
                    </div>

                </div>
                </div>
            </footer>
        </div>
        <!-- footer ends here -->
  </main>
   
    <!--   Core JS Files   -->
    <script src="{{ asset('colorlib-wizard-30/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>

   
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");
    
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    
        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
          type: "line",
          data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#5e72e4",
              backgroundColor: gradientStroke1,
              borderWidth: 3,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6
    
            }],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  padding: 10,
                  color: '#fbfbfb',
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  color: '#ccc',
                  padding: 20,
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
            },
          },
        });
    </script>

    <script>
        window.addEventListener('closeModal', event => {
            $("#buildingModal").modal('hide');
        })

        window.addEventListener('show-edit-building-modal', event => {
            $("#editBuildingModal").modal('show');
        })
    </script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.0') }}"></script>

    <!-- Scripts -->
    @stack('js')
    @livewire('livewire-ui-modal')
    @livewireScripts
    @powerGridScripts
    
</body>

</html>