<!-- Experience Start -->
<div class="experience" id="experience">
    <div class="content-inner">
        <div class="content-header">
            <h2>Experience</h2>
        </div>
        <div class="row align-items-center">
            @forelse ($experiences->companies as $experience )
                <div class="col-md-12">
                    <div class="exp-col">
                        <span>{{$experience['start_date']}} <i>to</i> {{$experience['end_date']}}</span>
                        <h3>{{$experience['name']}}</h3>
                        <h4>{{$experience['location']}}</h4>
                        <h5>{{$experience['designation']}}</h5>
                        <p>{{$experience['short_desc']}}</p>
                    </div>
                </div>
            @empty
                Nothing Has been found
            @endforelse
{{--
            <div class="col-md-6">
                <div class="exp-col">
                    <span>01-Jan-2020 <i>to</i> 31-Dec-2050</span>
                    <h3>Soft Solution Ltd</h3>
                    <h4>San Francisco, CA</h4>
                    <h5>Web Developer</h5>
                    <p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="exp-col">
                    <span>01-Jan-2020 <i>to</i> 31-Dec-2050</span>
                    <h3>ABC Soft Ltd</h3>
                    <h4>San Francisco, CA</h4>
                    <h5>Web Designer</h5>
                    <p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="exp-col">
                    <span>01-Jan-2020 <i>to</i> 31-Dec-2050</span>
                    <h3>Soft Agency</h3>
                    <h4>San Francisco, CA</h4>
                    <h5>Graphic Designer</h5>
                    <p>Lorem ipsum dolor sit amet elit suscipit orci. Donec molestie velit id libero.</p>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Experience Start -->
