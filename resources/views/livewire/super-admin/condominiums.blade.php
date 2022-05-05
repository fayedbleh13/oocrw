<div>
     <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Condo Listings</li>
            </ol>
            <h5 class="font-weight-bolder text-white mb-0">List of Condo Units</h5>
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
                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#condoModal">
                Add Condo
                </button>

                @livewire('super-admin.table-components.listings-table')
            </div>
        </div>
    </div>

    @livewire('super-admin.modal-components.add-condo')
</div>
