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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('name')" href="#" role="button" >Building Name
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('slug')" href="#" role="button" >Building Slug
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
                @foreach ($buildings as $b)
                <tr>
                    <td align="center">{{ $b->name }}</td>
                    <td align="center">{{ $b->slug }}</td>
                    <td align="center">{{ $b->description }}</td>
                    <td align="center">{{ $b->created_at }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editbuildingModal" wire:click="edit({{ $b->id }})">Edit</button> 
                    </td>
                @endforeach
                    
                </tr>
            </tbody>
        </table>
        </div>

        <div class="row mt-3">

            <div class="col-6 text-muted ml-4">
                Showing {{ $buildings->firstItem() }} to {{ $buildings->lastItem() }} out of {{ $buildings->total() }} results
            </div>

            <div class="col-6">
                <!-- pagination here -->
                {{ $buildings->links() }}
            </div>

                
            
        </div>
        
    </div>
    
    @include('livewire.super-admin.modal-components.edit-building')
</div>
