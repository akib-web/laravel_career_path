<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/img/profile.jpg') }}" alt="Image">
    </div>
    <div class="sidebar-content">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">Navigation</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    {{-- {{dd($settings)}} --}}
                    @forelse ($settings['active_pages'] as $menu)
                        <li class="nav-item">
                            <a class="nav-link {{$menu['active']}}"
                            href="{{url($menu['slug'])}}">
                                {{$menu['name']}}<i class="{{$menu['icon']}}"></i>
                            </a>
                        </li>
                    @empty
                        <li class="nav-item">
                            <a class="nav-link" href="#header">Home<i class="fa fa-home"></i></a>
                        </li>
                    @endforelse
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#header">Home<i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About<i class="fa fa-address-card"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experience">Experience<i class="fa fa-star"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Service<i class="fa fa-tasks"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio<i class="fa fa-file-archive"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact<i class="fa fa-envelope"></i></a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
</div>
