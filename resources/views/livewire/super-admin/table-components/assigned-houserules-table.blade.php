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
                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('listings_id')" href="#" role="button" >Unit Name
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'listings_id'])
                    </a>
                </th>
                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    <a wire:click.prevent="sortBy('building_id')" href="#" role="button" >Building
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'building_id'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('house_rules')" href="#" role="button" >House-rules
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'house_rules'])
                    </a>
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    <a wire:click.prevent="sortBy('updated_at')" href="#" role="button" >Date Assigned
                        @include('livewire.super-admin.table-components._sort-icon', ['field' => 'updated_at'])
                    </a>
                </th>
                <th class="text-center text-secondary font-weight-bolder opacity-7" style="color: rgb(78, 77, 77) !important;">Actions</th>
            </tr>
            </thead>
            <tbody class="table-bordered">
                
                @foreach ($house_rules as $h )
                    <tr>
                        <td align="center">
                            {{ $h->listing->name }}
                        </td>
                        <td align="center">
                            {{ $h->building->name }}
                        </td>
                        <td align="center">
                            @foreach(json_decode($h->house_rules) as $tags)
                                <span class="badge bg-primary">{{ $tags }}</span>
                            @endforeach
                        </td>
                        
                        <td align="center">
                            {{ date_format($h->updated_at,'d M Y') }} {{ date('h:i A', strtotime($h->updated_at)) }}
                        </td>
                        
                        <td align="center">
                            <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAssignHouserules" wire:click="edit({{ $h->id }})">Edit</button> 
                        </td>
                    </tr>
                @endforeach
                
                </tr>
            </tbody>
        </table>
        </div>

        <div class="mt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- pagination here -->
                {{ $house_rules->onEachSide(0)->links() }}
            </div>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Showing {{ $house_rules->firstItem() }} to {{ $house_rules->lastItem() }} out of {{ $house_rules->total() }} results
            </div>
        </div>
        
    </div>
    
    @include('livewire.super-admin.modal-components.edit-houserules')
    @include('livewire.super-admin.modal-components.edit-assigned-houserules')
</div>
