<div>
    
    <div class="row mb-4">
        <div class="col-md-4">
            
                
            <select wire.model="perPage" aria-label="perPage" name="datatable_length" aria-controls="datatable" class="form-control" style="width: 15%;">
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
                    <a wire:click.prevent="sortBy('name')" href="#" role="button" >Admin Name
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('email')" href="#" role="button" >Admin email
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'email'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('user_type')" href="#" role="button" >Position
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'user_type'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('created_at')" href="#" role="button" >Date Created
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
            </tr>
            </thead>
            <tbody class="table-bordered">

                   @foreach ($admen as $admin )
                   <tr>
                    <td class="text-center">{{ $admin->name }}</td>
                    <td class="text-center">{{ $admin->email }}</td>
                    <td class="text-center">
                        @if ($admin->user_type == 'ADM')
                            <span>Admin</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $admin->created_at }}</td>
                  
                    @endforeach
                
            </tbody>
        </table>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- pagination here -->
                {{ $admen->onEachSide(0)->links() }}
            </div>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Showing {{ $admen->firstItem() }} to {{ $admen->lastItem() }} out of {{ $admen->total() }} results
            </div>
        </div>
        
    </div>
    
    @include('livewire.super-admin.modal-components.edit-amenity')
</div>
