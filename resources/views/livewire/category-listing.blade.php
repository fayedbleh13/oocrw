<div>
    <div class="container-lg mt-3 mb-5">
        <header class="mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
                <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    @foreach ($category as $type)
                        <a type="button" style="display: inline;" href="{{ route('guest.category',['category_slug' => $type->slug]) }}" class="btn mr-4 {{ 'guest.category' == request()->path() ? 'bg-gradient-default' : '' }}" style="color: black;">{{ $type->name }}</a>
                    @endforeach
                </div>
        
                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary rounded-pill btn-custom2" data-bs-toggle="modal" data-bs-target="#filterModal">
                        Filters
                    </button>
                </div>
                
            </div>
        </header>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($listing as $unit)
            <div class="col-md-3">
                <div class="card h-100 shadow">
                <a href="{{ route('guest.condo-details',['condo_slug'=>$unit->slug]) }}" class="text-decoration-none">
                    <img src="{{ asset('img/img/' . $unit->image) }}" class="bd-placeholder-img card-img-top" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $unit->name }}</h5>
                        <h6 class="card-subtitle text-muted">₱ {{ $unit->price }}</h6>
                    </div>
                </a>
                </div>
            </div>
            @endforeach
            
        </div>
         <!-- pagination -->
         <nav class="mt-4" aria-label="Page navigation sample">
            {{ $listing->links() }}
        </nav>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center" id="exampleModalLabel">Filters</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Price Sorting</h5>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect2" wire:model="price_sort">
                                        <option value="default">Default sort</option>
                                        <option value="asc">Low to High</option>
                                        <option value="desc">High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5>Price Range</h5>
                            <div class="container mb-4">
                                <div id="slider" wire:ignore></div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" wire:model="min_price" id="min_input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="number" wire:model="max_price" id="max_input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Reset changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');

        noUiSlider.create(slider,{
            start: [1,10000],
            connect: true,
            range: {
                'min': 1,
                'max': 10000
            },
        });

        var minInput = document.getElementById('min_input');
        var maxInput = document.getElementById('max_input');
        
        slider.noUiSlider.on('update', function (value) {
           
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
            
        });

        minInput.addEventListener('change', function () {
            slider.noUiSlider.set([this.value, null ]);
        });

        maxInput.addEventListener('change', function () {
            slider.noUiSlider.set([null, this.value]);
        });
    </script>
@endpush