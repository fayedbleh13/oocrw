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
               
                   {{-- @if (is_Null($amenities))
                    <tr>
                       <td colspan="5">No Records found</td>
                    </tr>
                   @else
                   @foreach ($amenities as $amenity )
                   <tr>
                    <td align="center">{{ $amenity->name }}</td>
                    <td align="center">{{ $amenity->slug }}</td>
                    <td align="center">{{ $amenity->description }}</td>
                    <td align="center">{{ $amenity->created_at }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAmenityModal" wire:click="edit({{ $amenity->id }})">Edit</button> 
                    </td>
                    @endforeach
                        
                    </tr> 
                   @endif --}}

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

        <div class="row mt-3">

            <div class="col-6 text-muted ml-4">
                Showing {{ $admen->firstItem() }} to {{ $admen->lastItem() }} out of {{ $admen->total() }} results
            </div>

            <div class="col-6">
                <!-- pagination here -->
                {{ $admen->links() }}
            </div>

                
            
        </div>
        
    </div>
    
    @include('livewire.super-admin.modal-components.edit-amenity')
</div>
