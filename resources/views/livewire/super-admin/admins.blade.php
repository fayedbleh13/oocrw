<div>
    <div class="container">
        <div class="card card-frame">
            <div class="card-body">
                <button class="btn btn-primary"  wire:click="$emit('openModal', 'super-admin.add-admin')">
                    Add Admin
                </button>
                <livewire:super-admin.admins-table/>
            </div>
          </div>
        
    </div>
    
</div>
