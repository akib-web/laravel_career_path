
<!-- Portfolio Start -->
<div class="portfolio" id="portfolio">
    <div class="content-inner">
        <div class="content-header">

            <a href="{{url('projects')}}"> <span> < Back</span></a>
            <h2>{{$project['name']}}</h2>
        </div>
        <div class="row">

            <div class="col-md-12 {{strtolower($project['category'])}}">
                <div class="portfolio-wrap">
                    <figure>
                        <a href="{{ asset($project['image']) }}" data-lightbox="portfolio" data-title="{{$project['name']}}" class="link-preview" title="Preview">
                            <img src="{{ asset($project['image']) }}" class="img-fluid" alt="">
                        </a>
                        <a href="{{$project['url']}}" target="blank" class="link-details" title="More Details"><i class="fa fa-link"></i> {{$project['name']}}</a>
                        <p>{{$project['category']}} Project</p>
                    </figure>
                </div>
                <div>
                    {{$project['content']}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Start -->
