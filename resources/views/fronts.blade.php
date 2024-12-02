<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AIG - Adama Investment Group</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ url('') }}/front/assets/img/favicon.png" rel="icon">
  <link href="{{ url('') }}/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('') }}/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('') }}/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('') }}/front/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('') }}/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('') }}/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('') }}/front/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iLanding
  * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
  * Updated: Nov 12 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{ url('') }}/front/assets/img/logo.png" alt=""> -->
        <h1 class="sitename">AIG</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
            <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#services">Dropdown 1</a></li>
                <li><a href="#services2">Dropdown 2</a></li>
                <li><a href="#services3">Dropdown 3</a></li>
          
              </ul>
           </li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#pricing">News</a></li>
          <li><a href="#ShowRoom">ShowRoom</a></li>
          <li><a href="{{ route('contact.create') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <div class="company-badge mb-4">
                <i class="bi bi-gear-fill me-2"></i>
                Working for your success
              </div>
              @foreach ($hero as $item)
                {{-- <span class="accent-text">{{ $item->title }}</span> --}}
            

              <p class="mb-4 mb-md-5">
                {{ $item->description }}
              </p>

              <div class="hero-buttons">
                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                <a href="#" class="btn btn-link mt-2 mt-sm-0 glightbox">
                  <i class="bi bi-play-circle me-1"></i>
                  Play Video
                </a>
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <img src="{{ url('') }}/front/assets/img/illustration-1.webp" alt="Hero Image" class="img-fluid">

              <div class="customers-badge">
                <div class="customer-avatars">
                  <img src="{{ url('') }}/front/assets/img/avatar-1.webp" alt="Customer 1" class="avatar">
                  <img src="{{ url('') }}/front/assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                  <img src="{{ url('') }}/front/assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                  <img src="{{ url('') }}/front/assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                  <img src="{{ url('') }}/front/assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                  <span class="avatar more">12+</span>
                </div>
                <p class="mb-0 mt-2">12,000+ lorem ipsum dolor sit amet consectetur adipiscing elit</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-trophy"></i>
              </div>
              <div class="stat-content">
                <h4>3x Won Awards</h4>
                <p class="mb-0">Vestibulum ante ipsum</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-briefcase"></i>
              </div>
              <div class="stat-content">
                <h4>6.5k Faucibus</h4>
                <p class="mb-0">Nullam quis ante</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <div class="stat-content">
                <h4>80k Mauris</h4>
                <p class="mb-0">Etiam sit amet orci</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-award"></i>
              </div>
              <div class="stat-content">
                <h4>6x Phasellus</h4>
                <p class="mb-0">Vestibulum ante ipsum</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            @if(isset($abouts['desc']))
            @foreach ($abouts['desc'] as $item)
            <span class="about-meta">MORE ABOUT US</span>
            {{-- <h2 class="about-title">Voluptas enim suscipit temporibus</h2> --}}
            <p class="about-description">{{ $item->content }}</p>
            @endforeach
            @endif
            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                  <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                  <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                  <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                </ul>
              </div>
            </div>

            <div class="info-wrapper">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <div class="profile d-flex align-items-center gap-3">
                    <img src="{{ url('') }}/front/assets/img/avatar-1.webp" alt="CEO Profile" class="profile-image">
                    <div>
                      <h4 class="profile-name">Mario Smith</h4>
                      <p class="profile-position">CEO &amp; Founder</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="contact-info d-flex align-items-center gap-2">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                      <p class="contact-label">Call us anytime</p>
                      <p class="contact-number">+123 456-789</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="{{ url('') }}/front/assets/img/about-5.webp" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="{{ url('') }}/front/assets/img/about-2.webp" alt="Team Discussion" class="img-fluid small-image rounded-4">
              </div>
              <div class="experience-badge floating">
                <h3>15+ <span>Years</span></h3>
                <p>Of experience in business service</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="d-flex justify-content-center">

          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                <h4>Vision</h4>
               
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                <h4>Mision</h4>
              </a><!-- End tab nav item -->

            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                <h4>Goals</h4>
              </a>
            </li><!-- End tab nav item -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                  <h4>Terms and Rules</h4>
                </a>
              </li><!-- End tab nav item -->

          </ul>

        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                @if(isset($abouts['vision']))
                @foreach ($abouts['vision'] as $item)
                <h3>Our Vision</h3>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
              </div>
              @endforeach
          @else
          <p>Empty Data</p><!-- End tab content item -->
          @endif

              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ url('') }}/front/assets/img/features-illustration-1.webp" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

    <div class="tab-pane fade" id="features-tab-2">
    <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            @if(isset($abouts['mission']))
                <h3>Our Mision</h3>
                @foreach ($abouts['mission'] as $item)
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
             </div>
             @endforeach
          @else
          <p>Empty Data</p><!-- End tab content item -->
          @endif

          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ url('') }}/front/assets/img/features-illustration-1.webp" alt="" class="img-fluid">
          </div>

</div>
</div>
          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">

                @if(isset($abouts['goals']))
                @foreach ($abouts['goals'] as $item)
                <h3>Our Goals</h3>
                <p class="fst-italic">
                    {{ $item->content }}
                </p>
              </div>

              @endforeach
              @else
                  <p>Empty Data</p>
              @endif
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ url('') }}/front/assets/img/features-illustration-3.webp" alt="" class="img-fluid">
              </div>
            

            </div>
          </div><!-- End tab content item -->


          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                  @if(isset($abouts['vision']))
                  @foreach ($abouts['vision'] as $item)
                  <h3>Our Vision</h3>
                  <p class="fst-italic">
                      {{ $item->content }}
                  </p>
                  <p class="fst-italic">
                      {{ $item->content }}
                  </p>
                  <p class="fst-italic">
                      {{ $item->content }}
                  </p>
                </div>
                @endforeach
            @else
            <p>Empty Data</p><!-- End tab content item -->
            @endif
  
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                  <img src="{{ url('') }}/front/assets/img/features-illustration-1.webp" alt="" class="img-fluid">
                </div>
              </div>
          </div><!-- End tab content item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <i class="bi bi-award"></i>
              <h4>Hey1</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
              <i class="bi bi-patch-check"></i>
              <h4>Explicabo consectetur</h4>
              <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
              <i class="bi bi-sunrise"></i>
              <h4>Ullamco laboris</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
              <i class="bi bi-shield-check"></i>
              <h4>Labore consequatur</h4>
              <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
            </div>
          </div><!-- End Feature Borx-->

        </div>

      </div>

    </section><!-- /Features Cards Section -->

 
    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ url('') }}/front/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-5">
            @foreach ($testimonials as $item)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-item">
              {{-- <img src="{{ url('') }}/front/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> --}}
              <img src="{{ asset('storage/' . $item->icons) }}" class="testimonial-img" alt="">
              <h3>{{ $item->c_name }}</h3>
              <h4>{{ $item->c_title }}</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                {{ $item->c_quotes }}
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->
          @endforeach
   
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
            @foreach ($services as $item)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0">
                <i class="bi bi-activity"></i>
              </div>
              <div>
                <h3>{{ $item->title }}</h3>
                <p  class="short-description">{{ Str::limit($item->description, 100) }}...</p>
                <p class="full-description"  >{{ $item->description }}</p>
                <a href="javascript:void(0);" class="bi bi-arrow-right" onclick="toggleDescription({{ $loop->index }})">Read More</a>
              </div>
            </div>
          </div><!-- End Service Card -->
       
          @endforeach
        </div>

      </div>

    </section><!-- /Services Section -->



    <script>
        function toggleDescription(index) {
            const fullDescription = document.querySelectorAll('.full-description')[index];
            const shortDescription = document.querySelectorAll('.short-description')[index];
    
            if (fullDescription.style.display === 'none') {
                fullDescription.style.display = 'block';
                shortDescription.style.display = 'none';
            } else {
                fullDescription.style.display = 'none';
                shortDescription.style.display = 'block';
            }
        }
    </script>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 justify-content-center">
            @foreach ($pricings as $item) 
          <!-- Basic Plan -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-card">
              <h3>Basic Plan</h3>
              <div class="price">
                <span class="currency">$</span>
                <span class="amount">{{ Str::limit($item->price) }}</span>
                <span class="period">/ month</span>
              </div>
              <p class="description">{{ $item->service->title }}</p>

              <h4>Featured Included:</h4>
              <ul class="features-list">
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  {{ $item->content }}
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  {{ $item->content }}
                </li>
                <li>
                  <i class="bi bi-check-circle-fill"></i>
                  {{ $item->content }}
                </li>
              </ul>

              <a href="#" class="btn btn-primary">
                Buy Now
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

      
          @endforeach
        </div>

      </div>

    </section><!-- /Pricing Section -->
    <!-- Features Cards Section -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Show Room</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->
    <section id="ShowRoom" class="features-cards section py-5">
        <div class="container">
            <div class="row gy-4">
                @foreach ($showRooms as $item)
                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <!-- ShowRoom Card -->
                        <div class="card feature-box shadow-sm text-center h-100">
                            <!-- Image Section -->
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                 class="card-img-top img-fluid" 
                                 alt="Showroom Image" 
                                 style="max-height: 200px; object-fit: cover;">
                            <!-- Content Section -->
                            <div class="card-body">
                                <p class="card-text text-muted">{{ $item->desc }}</p>
                            </div>
                        </div>
                    </div><!-- End ShowRoom Card -->
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Have a question? Check out the FAQ</h2>
            <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sed ipsum.</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              
              <div class="faq-item">
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->
    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

<div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <h3>Contact Info</h3>
              @foreach ($contacts as $item)
              <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p>


              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Our Location</h4>
                  <p>Ethiopia</p>
                  <p>{{ $item->location }}</p>
                </div>
              </div>

              <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p>{{ $item->phone_number_1 }}<</p>
                  <p>{{ $item->phone_number_2 }}</p>
                </div>
              </div>

              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email Address</h4>
                  <p> {{ $item->email_address_2 }}</p>
                  <p> {{ $item->email_address_1 }}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
       <!-- The form in your 'fronts.blade.php' file -->
<div class="col-lg-7">
    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
        <h3>Get In Touch</h3>
        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('contact') }}" method="POST" class="form-control" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <div class="row gy-4">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="col-12">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="col-12">
                    <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.php-email-form');

        // Check if the form exists
        if (form) {
            form.addEventListener('submit', function(event) {
                let valid = true;

                // Validate Name
                const name = form.querySelector('input[name="name"]');
                if (name && name.value.trim() === '') {
                    valid = false;
                    alert('Name is required');
                }

                // Validate Email
                const email = form.querySelector('input[name="email"]');
                const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (email && (email.value.trim() === '' || !emailPattern.test(email.value))) {
                    valid = false;
                    alert('Please enter a valid email');
                }

                // Validate Message
                const message = form.querySelector('textarea[name="message"]');
                if (message && message.value.trim() === '') {
                    valid = false;
                    alert('Message is required');
                }

                // If form is invalid, prevent submission
                if (!valid) {
                    event.preventDefault();
                }
            });
        } else {
            console.error('Form not found');
        }
    });
</script> --}}
      
</div>
      </div>

    </section><!-- /Contact Section -->


  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">AIG</span>
          </a>
          <div class="footer-contact pt-3">

            @foreach ($contacts as $item)
            <p>Ethiopia</p>
            <p> {{ $item->location }}</p>
            <p class="mt-3"><strong>Phone: {{ $item->phone_number_1 }}</strong> </p>
            <p><strong>Email:  {{ $item->phone_number_2 }}</strong> </p>
            @endforeach
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#services">Services</a></li>
           
          </ul>
        </div>

       

        <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
          <ul>
            @foreach ($services as $item)
            <li><a href="#">{{ $item->title }}</a></li>
            @endforeach
          </ul>
        </div>
       
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">AIG</strong> <span>All Rights Reserved</span></p>

    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('') }}/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('') }}/front/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('') }}/front/assets/vendor/aos/aos.js"></script>
  <script src="{{ url('') }}/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('') }}/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ url('') }}/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="{{ url('') }}/front/assets/js/main.js"></script>

</body>

</html>