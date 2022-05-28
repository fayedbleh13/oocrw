<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="viewReservationModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel" >View this Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">		
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="check-in">Check-in Date</label>
                                <input type="date" wire:model="check_in" class="form-control" placeholder="Check in" aria-label="check-in" readonly disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="check-out">Check-out Date</label>
                                <input type="date" wire:model="check_out" class="form-control" placeholder="Check out" aria-label="check-out" readonly disabled>
                            </div>
                        </div>
                    </div>
                                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="hidden" wire:model="reserve_id">
                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" wire:model="firstname" class="form-control" placeholder="First name" aria-label="First name" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="lastname">Last name</label>
                                        <input type="text" wire:model="lastname" class="form-control" placeholder="Last name" aria-label="Last name" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="initial">Middle initial</label>
                                        <input type="text" wire:model="initials" class="form-control" placeholder="Initials" aria-label="Initials" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" wire:model="email" class="form-control" placeholder="Email" aria-label="Email" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobilenumber">Mobile Number</label>
                                        <input type="text" wire:model="number" class="form-control" placeholder="Mobile Number" aria-label="Mobile Number" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Gender</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="gender" readonly disabled>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birtdate">Date of Birth</label>
                                        <input type="date" wire:model="birthdate" class="form-control" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Civil Status</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="civil_status" readonly disabled>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                            <option value="3">Widowed</option>
                                            <option value="4">Separated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="citizenship">Citizenship</label>
                                        <input type="text" wire:model="citizenship" class="form-control" placeholder="Citizenship" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" wire:model="occupation" class="form-control" placeholder="Occupation" readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="total">Total payment</label>
                                        <input type="text" value="₱ {{ $this->total }}"class="form-control" placeholder="Total payment" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        @if ($this->status == 0)

                                        <input type="text" value="New" class="form-control" placeholder="Status" readonly disabled>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Number of persons</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="num_persons" readonly disabled>
                                            <option value="">Select the number of persons</option>
                                            <option value="0">1 person</option>
                                            <option value="1">2 persons</option>
                                            <option value="2">3 persons</option>
                                            <option value="3">4 persons</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="mt-2 mb-3">Download the uploaded ID from the client below</h6>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" wire:click="id_download()" class="btn btn-primary">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>  
</div>
