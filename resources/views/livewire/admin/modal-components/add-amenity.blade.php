<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="amenityModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent="addAmenity">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Add a new Amenity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="FormControlName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="FormControlName" placeholder="Name" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="FormControlName" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="FormControlSlug" placeholder="Slug" wire:model="slug" wire:keyup="generateSlug">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="FormControlTextarea1" class="form-label">Description</label>
                                    <textarea class="form-control" id="FormControlTextarea1" wire:model="description" rows="3"></textarea>
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
