<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="assignAmenitiesModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent="assignAmenities">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Assign amenities to a specific unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    
                    <div class="modal-body">  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Buildings</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="selectedBuildings">
                                            <option value="">Select Building</option>
                                            @foreach($building as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedBuildings')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Unit listings</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="selectedUnits">
                                            @if ($units->count() == 0)
                                                <option value="">Choose a building first</option>
                                            @else
                                                <option value="">Select a unit</option>
                                                @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                        @error('selectedUnits')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Amenities</label>
                                    <div wire:ignore>
                                        <select multiple class="form-select" id="selectAmenity" wire:model="amenities" data-placeholder="Select an amenity that applies">
                                            @foreach($amenity as $id => $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                        @error('amenities')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Assign</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@push('js')

<script type="text/javascript">
    $(document).ready(function () {
        $('#selectAmenity').select2({
            theme: 'bootstrap-5',
            allowClear: true,
            selectionCssClass: "select2--small",
            dropdownCssClass: "select2--small",
        });
        $('#selectAmenity').on('change', function (e) {
            var data = $('#selectAmenity').select2("val");
            @this.set('amenities', data);
        });
    });  

</script>
@endpush