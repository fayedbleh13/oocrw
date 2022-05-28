<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title w-100 text-center" id="ModalLabel">Reservation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
                </div>
            
                <div class="modal-body">
                    
                    <div class="container">
                        @if(!empty($successMsg))
                        <div class="alert alert-success">
                            {{ $successMsg }}
                        </div>
                        @endif
                        <div class="stepwizard mt-4">
                            <div class="stepwizard-row setup-panel">
                                <div class="multi-wizard-step">
                                    <a href="#step-1" type="button"
                                        class="btn {{ $currentStep != 1 ? 'btn-round-default' : 'btn-round' }}"></a>
                                    @if ($currentStep == 1)
                                    <p>Check-in/out</p>
                                    @else
                                    <p style="color: rgb(184, 183, 183); ">Check-in/out</p>
                                    @endif
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-2" type="button"
                                        class="btn {{ $currentStep != 2 ? 'btn-round-default' : 'btn-round' }}"></a>
                                    @if ($currentStep == 2)
                                        <p>Your Information</p>
                                    @else
                                    <p style="color: rgb(184, 183, 183); ">Your Information</p>
                                    @endif
                                    
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-3" type="button"
                                        class="btn {{ $currentStep != 3 ? 'btn-round-default' : 'btn-round' }}"
                                        disabled="disabled"></a>
                                    @if ($currentStep == 3 )
                                        <p>Documents</p>
                                    @else
                                    <p style="color: rgb(184, 183, 183); ">Documents</p>
                                    @endif
                                    
                                </div>
                                <div class="multi-wizard-step">
                                    <a href="#step-4" type="button"
                                        class="btn {{ $currentStep != 4 ? 'btn-round-default' : 'btn-round' }}"
                                        disabled="disabled"></a>
                                    @if ($currentStep == 4 )
                                        <p>Confirmation</p>
                                    @else
                                    <p style="color: rgb(184, 183, 183); ">Confirmation</p>
                                    @endif
                                    
                                </div>
                            </div>    
                        </div>
                        <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
                            <div class="col-md-12">
                                <h3> Check-in and Check-out</h3>
                                <p class="text-muted">
                                    Choose your check-in date and check-out date to determine your stay.
                                </p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="check-in">Check-in Date</label>
                                            <input wire:model="check_in" class="form-control" id="check_in" placeholder="Check in" aria-label="check-in">
                                            @error('check_in') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="check-out">Check-out Date</label>
                                            <input wire:model="check_out" class="form-control" id="check_out" placeholder="Check out" aria-label="check-out">
                                            @error('check_out') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="check-out">Number of persons</label>
                                            <select class="form-control" id="exampleFormControlSelect2" wire:model="num_persons">
                                                <option value="">Select the number of persons</option>
                                                <option value="0">1 person</option>
                                                <option value="1">2 persons</option>
                                                <option value="2">3 persons</option>
                                                <option value="3">4 persons</option>
                                            </select>
                                            @error('num_persons') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                                    type="button">Next</button>
                            </div>
                        </div>
                        <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
                            <div class="col-md-12">
                                <h3> Your Information</h3>
                                <p class="text-muted">
                                    Fill up the information below.
                                </p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="firstname">First name</label>
                                            <input type="text" wire:model="firstname" class="form-control" placeholder="First name" aria-label="First name">
                                            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="lastname">Last name</label>
                                            <input type="text" wire:model="lastname" class="form-control" placeholder="Last name" aria-label="Last name">
                                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="initial">Middle initial</label>
                                            <input type="text" wire:model="initials" class="form-control" placeholder="Initials" aria-label="Initials">
                                            @error('initials') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" wire:model="email" class="form-control" placeholder="Email" aria-label="Email">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobilenumber">Mobile Number</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><img src="{{ asset('img/ph_flag.png') }}" alt=""> +63</span>
                                                <input type="text" wire:model="number" class="form-control" placeholder="Mobile Number" aria-label="Mobile Number">
                                            </div>
                                            @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Gender</label>
                                            <select class="form-control" id="exampleFormControlSelect2" wire:model="gender">
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birtdate">Date of Birth</label>
                                            <input type="date" wire:model="birthdate" class="form-control datepicker">
                                            @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Civil Status</label>
                                            <select class="form-control" id="exampleFormControlSelect2" wire:model="civil_status">
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Widowed</option>
                                                <option value="4">Separated</option>
                                            </select>
                                            @error('civil_status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="citizenship">Citizenship</label>
                                            <input type="text" wire:model="citizenship" class="form-control" placeholder="Citizenship">
                                            @error('citizenship') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" wire:model="occupation" class="form-control" placeholder="Occupation">
                                            @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="secondStepSubmit"
                                    type="button">Next
                                </button>
                                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
                            </div>
                        </div>
                        <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
                            <div class="col-md-12">
                                <h3> Documents</h3>
                                <p class="text-muted">
                                    Upload your id for a verification. (Note: Valid ID should be a government issued ID, like the Driver's license. Passport, SSS, UMID and should be in a PDF format.)
                                </p>
                                <div class="form-group">
                                    <label for="description">Valid ID</label><br />
                                    <input class="form-control" wire:model="id_upload" type="file" id="formFile">
                                    @error('id_upload') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                    wire:click="thirdStepSubmit">Next</button>
                                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
                            </div>
                        </div>
                        <div class="row setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" id="step-4">
                            <div class="col-md-12">
                                <h3> Confirmation</h3>
                                <p class="text-muted">
                                    Double check if all information are correct and also the total payment.
                                </p>
                                <table class="table">
                                    <tr>
                                        <td>First Name:</td>
                                        <td><strong>{{$firstname}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td><strong>{{$lastname}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Middle Initial:</td>
                                        <td><strong>{{$initials}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><strong>{{$email}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td><strong>{{$number}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        @if ($gender == 0)
                                        <td><strong>Male</strong></td>
                                        @elseif ($gender == 1)
                                        <td><strong>Female</strong></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Civil Status:</td>
                                        @if ($civil_status == 1)
                                        <td><strong>Single</strong></td>
                                        @elseif ($civil_status == 2)
                                        <td><strong>Married</strong></td>
                                        @elseif ($civil_status == 3)
                                        <td><strong>Widowed</strong></td>
                                        @elseif ($civil_status == 4)
                                        <td><strong>Separated</strong></td>
                                        @endif
                                        
                                    </tr>
                                    <tr>
                                        <td>Citizenship:</td>
                                        <td><strong>{{$citizenship}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Occupation:</td>
                                        <td><strong>{{$occupation}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Check-in date:</td>
                                        <td><strong>{{$check_in}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Check-out date:</td>
                                        <td><strong>{{$check_out}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Total days to be reserved:</td>
                                        <td><strong>{{$days}} Days</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Total to be paid</td>
                                        <td><strong>₱ {{$total}}</strong></td>
                                    </tr>
                                </table>
                                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div> --}}
            </div>

        </div>
    </div>

    @push('js_dates')
        <?php    
            echo "<script>
                flatpickr('#check_in', {
                    minDate: 'today',
                    dateFormat: 'Y-m-d',
                    disable: [";
                        foreach ($reserved_dates as $rd) {
                            echo "
                            {
                            from: '".$rd->check_in."',
                            to: '".$rd->check_out."'
                            },
                            ";
                        }
                    echo "],
                    
                });

                flatpickr('#check_out', {
                    minDate: 'today',
                    dateFormat: 'Y-m-d',
                    disable: [";
                        foreach ($reserved_dates as $rd) {
                            echo "
                            {
                            from: '".$rd->check_in."',
                            to: '".$rd->check_out."'
                            },
                            ";
                        }
                    echo "],
                    
                });
                
            </script>"; 
        ?>
    @endpush
</div>