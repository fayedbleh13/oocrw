<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="updateReserveModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Reservation Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" wire:model="reserve_id">
                <input type="hidden" wire:model="reciever">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status">Reservation Status</label>
                            <select class="form-control" id="status" wire:model="status">
                                <option value="0">New</option>
                                <option value="1">Approved</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="number">Mobile Number</label>
                            <input type="text" class="form-control" id="number" wire:model="number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" wire:model="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea rows="3" class="form-control" wire:model="message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="updateStatus()" class="btn bg-gradient-primary">Update</button>
            </div>
          </div>
        </div>
    </div>
    {{-- <div wire:ignore.self class="modal fade" id="updateReserveModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Update Reservation Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" wire:model="reserve_id">
                    <input type="hidden" wire:model="reciever">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Reservation Status</label>
                                <select class="form-control" id="status" wire:model="status">
                                    <option value="0">New</option>
                                    <option value="1">Approved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number">Mobile Number</label>
                                <input type="text" class="form-control" id="number" wire:model="number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" wire:model="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" id="message" wire:model="message">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="updateStatus()" class="btn bg-gradient-primary">Update</button>
                </div>
            </div>
            
        </div>
    </div> --}}

</div>
