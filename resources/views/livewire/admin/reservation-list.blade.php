<div>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
       <div class="container-fluid py-1 px-3">
           <nav aria-label="breadcrumb">
           <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
               <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
               <li class="breadcrumb-item text-sm text-white active" aria-current="page">Reservations</li>
           </ol>
           <h5 class="font-weight-bolder text-white mb-0">List of Reservations</h5>
           </nav>
           
       </div>
   </nav>
   <!-- End Navbar -->

   <div class="container">
       <div class="card card-frame">
           
           @if(Session::has('msg'))
               <div class="alert alert-success mx-4 my-4" role="alert">
                   {{Session::get('msg')}}
               </div>
           @endif
               
           <div class="card-body">
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#new" aria-current="page" href="#">New Reservations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#approved" href="#">Approved Reservations</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                    @livewire('admin.table-components.reservations-table')
                </div>
                <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                    @livewire('admin.table-components.reservations-table2')
                </div>
            </div>
          
               
           </div>
       </div>
   </div>

</div>
