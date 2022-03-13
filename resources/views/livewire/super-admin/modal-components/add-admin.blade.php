<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent="addAdmin">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Add a new Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="row">
                            
                                <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" wire:model="name">
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="email" class="form-control" wire:model="email" placeholder="Name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="password" class="form-control" wire:model="password" placeholder="Password">
                                    </div>
                                </div>
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>