<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="condoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add a new Condo Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shortDescription">Unit Name</label>
                                <input type="text" class="form-control" id="shortDescription" placeholder="Unit Title/Name" wire:model="name" wire:keyup="generateSlug">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Unit Slug" wire:model="slug" >
                                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shortDescription">Short Description</label>
                                <input type="text" class="form-control" id="shortDescription" wire:model="short_description" placeholder="Short Description here...">
                                @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" id="Description" wire:model="description" placeholder="Description here..." rows="3"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" wire:model="price" placeholder="Price here...">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promoPrice">Promo Price</label>
                                <input type="text" class="form-control" id="promoPrice" wire:model="promo_price" placeholder="Promo Price here...">
                                @error('promo_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Building No.</label>
                                    <select class="form-control" id="exampleFormControlSelect2" wire:model="building_id">
                                        <option value="">Select Building</option>
                                        @foreach($buildings as $b)
                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('building_id') <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Category</label>
                                    <select class="form-control" id="exampleFormControlSelect2" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
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
                                        <option value="">Select Location</option>
                                        @foreach($locations as $l)
                                        <option value="{{$l->id}}">{{$l->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id') <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload Featured Image</label>
                                <input class="form-control" type="file" id="uploads{{ $iteration }}" wire:model="image">
                                @if($image)
                                <div class="mt-4 text-center">
                                    <img class="img-thumbnail" src="{{$image->temporaryUrl()}}" width="120" alt="{{ $image }}">
                                    <p class="mt-2">Preview image above..</p>
                                </div>
                                @endif
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload Image Gallery</label>
                                <input class="form-control" type="file" id="upload{{ $iteration }}" wire:model="image_gallery" multiple>
                                @if($image_gallery)
                                <div class="mt-4 text-center">
                                    @foreach ($image_gallery as $images)
                                        <img class="img-thumbnail" src="{{$images->temporaryUrl()}}" width="120" alt="{{ $images }}">
                                    @endforeach
                                    <p class="mt-2">Preview images above..</p>
                                </div>
                                @error('image_gallery') <span class="text-danger">{{ $message }}</span> @enderror
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" wire:click.prevent="closeReset()" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="addCondo()" class="btn bg-gradient-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
