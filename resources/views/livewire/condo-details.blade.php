<div>
    <div class="container mt-5 mb-5">
        <h2 class="featurette-heading fw-bold">{{ $condo->name }}</h2>
        <p class="text-muted">{{ $condo->building->name }} - {{ $condo->location->description }}</p>

        {{-- image gallery here --}}
        <div class="row">
            <div class="col-lg-6 px-1">
                <div>
                    <img src="{{ asset('img/img/' . $condo->image) }}" class="bd-placeholder-img" 
                    width="100%" height="404" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    @php
                        $images = explode(',',$condo->image_gallery);
                    @endphp
                    @foreach ($images as $image_gallery)
                        @if ($image_gallery)
                            <div class="col-md-6 px-0 py-0">
                                <div>
                                    <img src="{{ asset('img/img/' . $image_gallery) }}" class="mb-1 mr-1 bd-placeholder-img card-img-top custom-image_gallery2"
                                     width="100" height="200" serveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        {{-- end of image gallery here --}}

        <div class="row">
            <div class="col-lg-8 mt-4 px-0  ">
                <div class="container">
                    <div>
                        <div class="mb-4">
                            <h4 class="fw-bold">Description</h4>  
                        </div>

                        <h5>Welcome to your second home!</h5>

                        <p> 
                            {{ $condo->short_description }}
                        </p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#moreDetailsModal" class="fw-bold text-decoration-none fs-5" style="color: black;">Show more <i class="fa-solid fa-angle-right"></i></a>    
                    </div>
                    
                    <hr class="mt-4 mb-4">

                    <div class="mb-4">
                        <h4 class="fw-bold">What this unit provides</h4>  
                    </div>

                    <div class="row">
                        @if ($amenity != null)
                            @foreach(json_decode($amenity->amenities) as $tags)
                            <div class="col-md-6">
                                <span class="badge bg-primary mb-2"><i class="bi-check">{{ $tags }}</i></span>
                            </div>
                            @endforeach   
                        @endif
                    </div>  
                    
                    
                    <hr class="mt-4 mb-4">

                    <div class="mb-4">
                        <h4 class="fw-bold">House-rules</h4>  
                    </div>

                    <div class="row">
                        @if ($houserule != null)
                            @foreach(json_decode($houserule->house_rules) as $tags)
                            <div class="col-md-6">
                                <span class="badge bg-primary mb-2"><i class="bi-check">{{ $tags }}</i></span>
                            </div>
                            @endforeach
                        @endif
                    </div>  
                </div>
            </div>
            <div class="col-lg-4 px-0">
                <div class="card card-reservation mt-4 mb-5 border shadow" style="width: 26rem;">
                    <div class="card-body">
                    <h3 class="card-title fw-bold mt-3">₱ {{ $condo->price }} <span class="fs-6  text-muted">per day</span></h3>
                    <div class="d-grid gap-2 mt-3 ">
                        <button href="#" class="btn btn-primary btn-lg rounded-pill btn-custom btn-block fw-bold" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>
                    </div>
                    <div class="mt-2">
                        <p class="text-muted" style="text-align: center;">You won't be charged yet</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-4 mb-4">

        
        <div class="mb-4">
            <h4 class="fw-bold">Things to know</h4>  
        </div>
        <div class="row">
            <div class="col-md-4">
                <h6 class="fw-bold">Health and Safety</h6>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold">Cancelation policy</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h6>Committed to the company's enhanced cleaning process. <a href="#" class="fw-bold text-decoration-underline " style="color: black;">Show more <i class="fa-solid fa-angle-right"></i></a></h6>
                
            </div>
            <div class="col-md-4">
                <h6>Free cancellation for 48 hours <a href="#" class="fw-bold text-decoration-underline " style="color: black;">Show more <i class="fa-solid fa-angle-right"></i></a></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h6>Company's social-distancing and other COVID-19-related guidelines apply</h6>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    
    </div>

    <!-- Modal -->
    <div class="modal fade" id="moreDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-3" id="exampleModalLabel">About this unit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="lead">{{ $condo->short_description }}</p>
                <p class="lead text-break d-flex justify-content-center">{{ $condo->description }}</p>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    @livewire('modal-components.reservation-wizard-modal')
</div>
