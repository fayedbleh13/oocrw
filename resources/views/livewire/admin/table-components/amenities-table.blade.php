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
                    <a wire:click.prevent="sortBy('name')" href="#" role="button" >Amenity Name
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('slug')" href="#" role="button" >Amenity Slug
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'slug'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('description')" href="#" role="button" >Description
                        @include('livewire.admin.table-components._sort-icon', ['field' => 'description'])
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

                   @foreach ($amenitya as $amen )
                   <tr>
                    <td align="center">{{ $amen->name }}</td>
                    <td align="center">{{ $amen->slug }}</td>
                    <td align="center">{{ $amen->description }}</td>
                    <td align="center">{{ date_format($amen->created_at,'d M Y') }} {{ date('h:i A', strtotime($amen->created_at)) }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAmenityModal" wire:click="edit({{ $amen->id }})">Edit</button> 
                    </td>
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
</div>
