<div>
    <!-- Modal -->
    <div class="modal fade" id="condoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add a new Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shortDescription">Unit Name</label>
                                <input type="text" class="form-control" id="shortDescription" placeholder="Unit Title/Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Unit Slug">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shortDescription">Short Description</label>
                                <input type="text" class="form-control" id="shortDescription" placeholder="Short Description here...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" id="Description" placeholder="Description here..." rows="3"></textarea>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price here...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promoPrice">Promo Price</label>
                                <input type="text" class="form-control" id="promoPrice" placeholder="Promo Price here...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Building No.</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                      <option>Building #1</option>
                                      <option>Building #2</option>
                        
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Category</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                      <option>Studio type</option>
                                      <option>Single bedroom</option>
                                      <option>Two bedrooms</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
