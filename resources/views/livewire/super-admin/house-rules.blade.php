<div>
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
       <div class="container-fluid py-1 px-3">
           <nav aria-label="breadcrumb">
           <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
               <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
               <li class="breadcrumb-item text-sm text-white active" aria-current="page">House-rules</li>
           </ol>
           <h5 class="font-weight-bolder text-white mb-0">List of Houserules</h5>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#houseruleModal">
                Add Houserule
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#assignHouserulesModal">
                    Assign Houserule
                </button>

                <ul class="nav nav-tabs mt-2 mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="houserules-tab" data-bs-toggle="tab" data-bs-target="#houserules" 
                        type="button" role="tab" aria-controls="home" aria-selected="true">
                        House-rules</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="assigned-tab" data-bs-toggle="tab" data-bs-target="#assigned" 
                        type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Assigned House-rules</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="houserules" role="tabpanel" aria-labelledby="houserules-tab">
                        @livewire('super-admin.table-components.house-rules-table')
                    </div>
                    <div class="tab-pane fade" id="assigned" role="tabpanel" aria-labelledby="assigned-tab">
                        @livewire('super-admin.table-components.assigned-houserules-table')
                    </div>
                </div>
           </div>
       </div>
   </div>

   @livewire('super-admin.modal-components.add-houserules')
   @livewire('super-admin.modal-components.assign-houserules')
   
</div>
