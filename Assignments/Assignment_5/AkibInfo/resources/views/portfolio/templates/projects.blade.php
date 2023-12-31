
<!-- Portfolio Start -->
<div class="portfolio" id="portfolio">
    <div class="content-inner">
        <div class="content-header">
            <h2>Portfolio</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @forelse ($projects->categories as $category)
                        <li data-filter=".{{strtolower($category)}}">{{$category}}</li>
                    @empty

                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row portfolio-container">
            @forelse ($projects->items as $project)
            <div class="col-lg-4 col-md-6 portfolio-item {{strtolower($project['category'])}}">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset($project['image']) }}" class="img-fluid" alt="">
                        <a href="{{ asset($project['image']) }}" data-lightbox="portfolio" data-title="{{$project['name']}}" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="{{$project['url']}}" target="blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="{{route('projecDetails',[$project['slug']])}}">Project Name <span>{{$project['name']}}</span></a>
                    </figure>
                </div>
            </div>
            @empty
                no data found
            @endforelse


            {{-- <div class="col-lg-4 col-md-6 portfolio-item web-des">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('assets/img/portfolio-2.jpg') }}" class="img-fluid" alt="">
                        <a href="{{ asset('assets/img/portfolio-2.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="#">Project Name <span>Web Design</span></a>
                    </figure>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item web-dev">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('assets/img/portfolio-3.jpg') }}" class="img-fluid" alt="">
                        <a href="{{ asset('assets/img/portfolio-3.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="#">Project Name <span>Web Development</span></a>
                    </figure>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item web-dev">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('assets/img/portfolio-4.jpg') }}" class="img-fluid" alt="">
                        <a href="{{ asset('assets/img/portfolio-4.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="#">Project Name <span>Web Development</span></a>
                    </figure>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item dig-mar">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('assets/img/portfolio-5.jpg') }}" class="img-fluid" alt="">
                        <a href="{{ asset('assets/img/portfolio-5.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="#">Project Name <span>Digital Marketing</span></a>
                    </figure>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item dig-mar">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ asset('assets/img/portfolio-6.jpg') }}" class="img-fluid" alt="">
                        <a href="{{ asset('assets/img/portfolio-6.jpg') }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                        <a class="portfolio-title" href="#">Project Name <span>Digital Marketing</span></a>
                    </figure>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Portfolio Start -->
