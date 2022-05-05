<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="viewCondoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel" >View this Condo Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                
                    <div class="modal-body">
						
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Condo Title</label>
                                <input type="text" class="form-control" placeholder="Product name" wire:model="name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Condo slug</label>
                                <input type="text" class="form-control" placeholder="Product slug" wire:model="slug" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Short description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="short_description" readonly></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Description</label>
                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="3" wire:model="description"></textarea>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col form-group">
                                <label>Price</label>
                                <input readonly type="text" class="form-control" placeholder="Regular price" wire:model="price">
                            </div>

                            <div class="col form-group">
                                <label>Promo price</label>
                                <input readonly type="text" class="form-control" placeholder="Sales price" wire:model="promo_price">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Featured?</label>
                                <select readonly class="form-control" wire:model="featured" disabled>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-6 form-group">
                                <label>Buildings</label>
                                <select class="form-control" wire:model="building_id" readonly disabled>
                                    @foreach($buildings as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Category</label>
                                <select class="form-control" wire:model="category_id" readonly disabled>
                                    @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Location</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="location_id" readonly disabled>
                                            @foreach($locations as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                            @endforeach
                                        </select>
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
