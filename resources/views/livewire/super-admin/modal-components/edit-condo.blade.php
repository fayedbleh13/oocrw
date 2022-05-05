<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editCondoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Edit this Condo unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" wire:model="condo_id">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shortDescription">Unit Name</label>
                                    <input type="text" class="form-control" id="shortDescription" placeholder="Unit Title/Name" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Unit Slug" wire:model="slug" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shortDescription">Short Description</label>
                                    <input type="text" class="form-control" id="shortDescription" wire:model="short_description" placeholder="Short Description here...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" id="Description" wire:model="description" placeholder="Description here..." rows="3"></textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" wire:model="price" placeholder="Price here...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="promoPrice">Promo Price</label>
                                    <input type="text" class="form-control" id="promoPrice" wire:model="promo_price" placeholder="Promo Price here...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Building No.</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="building_id">
                                            @foreach($buildings as $b)
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Category</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="category_id">
                                            @foreach($categories as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Location</label>
                                        <select class="form-control" id="exampleFormControlSelect2" wire:model="location_id">
                                            @foreach($locations as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Re-upload Image</label>
                                    <input class="form-control" type="file" id="formFile" wire:model="newImg">
                                    @if($newImg)
                                        <div class="mt-4 text-center">
                                            <img class="img-thumbnail" src="{{$newImg->temporaryUrl()}}" width="120" alt="{{ $image }}">
                                            <p class="mt-2">Preview image above..</p>
                                        </div>
                                    @else
                                        <div class="mt-4 text-center">
                                            <img class="img-thumbnail" src="{{ asset('img/img') }}/{{ $image }}" width="120" alt="{{ $image }}">
                                            <p class="mt-2">Preview image above..</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Re-upload Images</label>
                                    <input class="form-control" type="file" id="formFile" wire:model="newimage_gallery" multiple>
                                    @if($newimage_gallery)
                                        <div class="mt-4 text-center">
                                            @foreach ($newimage_gallery as $newImgs)
                                                @if ($newImgs)
                                                    <img class="img-thumbnail" src="{{$newImgs->temporaryUrl()}}" width="120" alt="{{ $newImgs }}">
                                                @endif
                                            @endforeach
                                            <p class="mt-2">Preview image above..</p>
                                        </div>
                                    @else 
                                        @if ($image_gallery != null)
                                            <div class="mt-4 text-center">
                                                @foreach ($image_gallery as $image)
                                                    @if ($image)
                                                        <img class="img-thumbnail" src="{{ asset('img/img') }}/{{ $image }}" width="120" alt="{{ $image }}">
                                                    @endif
                                                @endforeach
                                                <p class="mt-2">Preview image above..</p>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="updateCondo()" class="btn bg-gradient-primary">Update</button>
                    </div>
                </div>
            
        </div>
    </div>

</div>
