<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="assignHouserulesModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent="assignHouserules">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Assign house-rules to a specific unit</h5>
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
                                    <label for="exampleFormControlSelect2">House-rules</label>
                                    <div wire:ignore>
                                        <select multiple class="form-select" id="selectHouserules" wire:model="house_rules" data-placeholder="Select an house-rules that applies">
                                            @foreach($hrules as $id => $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                        @error('house_rules')
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
        $('#selectHouserules').select2({
            theme: 'bootstrap-5',
            allowClear: true,
            selectionCssClass: "select2--small",
            dropdownCssClass: "select2--small",
        });
        $('#selectHouserules').on('change', function (e) {
            var data = $('#selectHouserules').select2("val");
            @this.set('house_rules', data);
        });
    });  

</script>
@endpush