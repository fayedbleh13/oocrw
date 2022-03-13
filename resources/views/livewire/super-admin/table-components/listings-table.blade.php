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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('name')" href="#" role="button" >House-rule Name
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('slug')" href="#" role="button" >House-rule Slug
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'slug'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('description')" href="#" role="button" >Description
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'description'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('created_at')" href="#" role="button" >Date Added
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                <th class="text-secondary opacity-7">Actions</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
                
                    @foreach ($listings as $unit)
                    <tr>
                    <td align="center">{{ $unit->name }}</td>
                    <td align="center">{{ $unit->slug }}</td>
                    <td align="center">{{ $unit->description }}</td>
                    <td align="center">{{ $unit->created_at }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCondoModal" wire:click="edit({{ $unit->id }})">Edit</button> 
                    </td>
                @endforeach
                
                </tr>
            </tbody>
        </table>
        </div>

        <div class="row mt-3">

            <div class="col-6 text-muted ml-4">
                Showing {{ $listings->firstItem() }} to {{ $listings->lastItem() }} out of {{ $listings->total() }} results
            </div>

            <div class="col-6">
                <!-- pagination here -->
                {{ $listings->links() }}
            </div>

                
            
        </div>
        
    </div>
    
    @include('livewire.super-admin.modal-components.edit-condo')
</div>
