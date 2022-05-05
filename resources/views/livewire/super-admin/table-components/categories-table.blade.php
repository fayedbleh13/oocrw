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
                    <a wire:click.prevent="sortBy('name')" href="#" role="button" >Category Name
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('slug')" href="#" role="button" >Category Slug
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'slug'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('created_at')" href="#" role="button" >Date Added
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                <th class="text-center text-secondary font-weight-bolder opacity-7" style="color: rgb(78, 77, 77) !important;">Actions</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
                @foreach ($cat as $c)
                    
                
                <tr>
                    <td align="center">{{ $c->name }}</td>
                    <td align="center">{{ $c->slug }}</td>
                    <td align="center">{{ date_format($l->created_at,'d M Y') }} {{ date('h:i A', strtotime($l->created_at)) }}</td>
                    <td align="center">
                        <button type="button" class="btn bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewCategoryModal" wire:click="view({{ $c->id }})">View</button>
                        <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal" wire:click="edit({{ $c->id }})">Edit</button> 
                    </td>
                @endforeach
                    
                </tr>
            </tbody>
        </table>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- pagination here -->
                {{ $cat->onEachSide(0)->links() }}
            </div>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Showing {{ $cat->firstItem() }} to {{ $cat->lastItem() }} out of {{ $cat->total() }} results
            </div>
        </div>
        
    </div>
    @include('livewire.super-admin.modal-components.view-category')
    @include('livewire.super-admin.modal-components.edit-category')
</div>
