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
                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('listings_id')" href="#" role="button" >Unit Name
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'listings_id'])
                    </a>
                </th>
                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('building_id')" href="#" role="button" >Building
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'building_id'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('amenities')" href="#" role="button" >Assigned Amenities
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'amenities'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('updated_at')" href="#" role="button" >Date Assigned
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'updated_at'])
                    </a>
                </th>
                <th class="text-center text-secondary font-weight-bolder opacity-7" style="color: rgb(78, 77, 77) !important;">Actions</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
            
                   @foreach ($amenitya as $amen )
                    <tr>
                        <td align="center">
                            {{ $amen->listing->name }}
                        </td>
                        <td align="center">
                            {{ $amen->building->name }}
                        </td>
                        <td align="center">
                            @foreach(json_decode($amen->amenities) as $tags)
                                <span class="badge bg-primary">{{ $tags }}</span>
                            @endforeach
                        </td>
                        <td align="center">
                            {{ $amen->updated_at }}
                        </td>
                        <td align="center">
                            <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAssignAmenity" wire:click="edit({{ $amen->id }})">Edit</button> 
                        </td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- pagination here -->
                {{ $amenitya->onEachSide(0)->links() }}
            </div>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Showing {{ $amenitya->firstItem() }} to {{ $amenitya->lastItem() }} out of {{ $amenitya->total() }} results
            </div>
        </div>
        
    </div>
    
    @include('livewire.admin.modal-components.edit-amenity')
    @include('livewire.admin.modal-components.edit-assigned-amenities')
</div>
