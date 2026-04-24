@extends('landing.master')
@section('content')
    <!-- START HOME -->
    <section id="home" class="home_bg"
        style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/e/e1/Pemandangan_Gunung_Bromo.jpg);  background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12 text-center">
                    <div class="hero-text">
                        <h2>Webside Pariwisata</h2>
                        <p>Pariwisata menghadirkan keindahan alam dan budaya yang menarik untuk dijelajahi. Selain memberi pengalaman seru, juga membantu perekonomian masyarakat lokal.</p>
                        <div class="home_btn">
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->

    <!-- START PROPERTY -->
    <section class="template_property">
        <div class="container">
            <div class="section-title text-center wow zoomIn">
                <h2>List of Zones</h2>
                <div></div>
            </div>
            <div class="row">
                @forelse($zones as $zone)
                
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="single_property">
                            <img src="{{ asset('storage/images/'.$zone->image) }}" class="img-fluid" alt="" />
                            <div class="single_property_description text-center">
                                <span><i class="fa fa-object-group"></i>Attraction</span>
                            
                            </div>
                            <div class="single_property_content">
                                <h4><a href="{{ route('landing.zones', $zone) }}">{{ $zone->name }}</a></h4>
                                <p>{{ $zone->description }}</p>
                            </div>
                            <div class="single_property_price">
                                Per PAX <span>Rp. {{ $zone->price_range }}</span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div><!--- END SINGLE PROPERTY -->
                    </div>
                    <!--- END COL --></a>
                @empty
				@endforelse               
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>
<!-- END  PROPERTY -->

<!-- START PORTFOLIO -->
<section id="gallery" class="works_area">
    <div class="container">
        <div class="section-title  text-center wow zoomIn">
            <h2>List of Attractions</h2>
            <div></div>
        </div>
        <div class="row">
            @foreach($attractions as $attraction)
            
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="single_property">
                    <img src="{{ asset('storage/images/'.$attraction->image) }}" class="img-fluid"
                        alt="" />
                    <div class="single_property_description text-center">
                        <span><i class="fa fa-object-group"></i> Zones</span>
                    </div>
                     <div class="single_property_content">
                                <h4><a href="{{ route('landing.attractions', $attraction) }}">{{ $attraction->name }}</a></h4>
                                <p>{{ $attraction->description }}</p>
                            </div>
                    <div class="single_property_price">
                        Per PAX <span>Rp. {{ $attraction->ticket_price }}</span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div><!--- END  COL--></a>
            @endforeach
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>
<!-- END PORTFOLIO -->


@endsection