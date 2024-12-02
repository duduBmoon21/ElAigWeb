@php
    $sections = $sections ?? collect(); 
@endphp

<ul class="navmenu d-flex justify-content-center">
    @if($sections->isEmpty())
        <li class="nav-item"><p>No sections available.</p></li>
    @else
        @foreach($sections as $section)
        <li  class="nav-item dropdown">
                @if($section->name == 'Home')
                    <a class="nav-link" href="#home">{{ $section->name }}</a>
                @elseif($section->name == 'About')
                    <a class="nav-link" href="#about" id="aboutDropdown" data-bs-toggle="dropdown" aria-expanded="false">{{ $section->name }}</a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        @foreach($aboutMission as $about)
                            <li><a class="dropdown-item" href="{{ route('about.mission', $about->id) }}">Our Mission</a></li>
                        @endforeach
                        @foreach($aboutVision as $about)
                            <li><a class="dropdown-item" href="{{ route('about.vision', $about->id) }}">Our Vision</a></li>
                        @endforeach
                        @foreach($aboutGoals as $about)
                            <li><a class="dropdown-item" href="{{ route('about.goals', $about->id) }}">Our Goals</a></li>
                        @endforeach
                        @foreach($aboutTermsRules as $about)
                            <li><a class="dropdown-item" href="{{ route('about.termsRules', $about->id) }}">Our Terms and Rules</a></li>
                        @endforeach
                    </ul>
                @elseif($section->name == 'Services')
                    <a class="nav-link" href="#services" id="servicesDropdown" data-bs-toggle="dropdown" aria-expanded="false">{{ $section->name }}</a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        @foreach($services as $service)
                            <li><a class="dropdown-item" href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                @elseif($section->name == 'Pricing')
                    <a class="nav-link" href="#pricing">{{ $section->name }}</a>
                @elseif($section->name == 'Contact')
                    <a class="nav-link" href="#contact">{{ $section->name }}</a>
                @endif
            </li>
        @endforeach
    @endif
</ul>
