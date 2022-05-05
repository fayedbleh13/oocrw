<div>
    
    <div class="row mb-4">
        <div class="col-md-4">
            
                
            <select wire.model="perPage" aria-label="perPage" name="datatable_length" class="form-control" style="width: 15%;">
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select> 
                    
            
        </div>
        <div class="col-md-4 offset-md-4">
            
            <input type="text" wire:model="search" class="form-control" placeholder="Search..." style="width: 65%; margin-left: 9.2em;">
            
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
        <table class="table align-items-center mb-0 table-hover table-bordered">
            <thead class="table-light">
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('firstname')" href="#" role="button" >Client Name
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'firstname'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('email')" href="#" role="button" >Email
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'email'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('status')" href="#" role="button" >Status
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'status'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('created_at')" href="#" role="button" >Date Added
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                <th class="text-center text-secondary font-weight-bolder opacity-7" style="color: rgb(78, 77, 77) !important;">Actions</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
                
                @foreach ($reserve as $rs)
                    <tr>
                    <td align="center">{{ $rs->firstname }} {{ $rs->lastname }}</td>
                    <td align="center">{{ $rs->email }}</td>
                    <td align="center">
                        @if ($rs->status == 0)
                            <span class="badge bg-gradient-success">New</span>
                        @endif
                    </td>
                    <td align="center">{{ $rs->created_at }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewReservationModal" wire:click="view({{ $rs->id }})">View</button> 
                        <button type="button" class="btn bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateReserveModal" wire:click="update({{ $rs->id }})">Update</button>
                    </td>
                @endforeach
                
                </tr>
            </tbody>
        </table>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- pagination here -->
                {{ $reserve->onEachSide(0)->links() }}
            </div>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Showing {{ $reserve->firstItem() }} to {{ $reserve->lastItem() }} out of {{ $reserve->total() }} results
            </div>
        </div>
        
    </div>
    
    @include('livewire.admin.modal-components.view-reservation')
    @include('livewire.admin.modal-components.update-reservation')
</div>
