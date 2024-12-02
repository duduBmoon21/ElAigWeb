<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adama Investment Group</title>
        <link href="{{ url('') }}/front/assets/img/favicon.png" rel="icon">
        <link href="{{ url('') }}/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{ url('') }}/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ url('') }}/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ url('') }}/front/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="{{ url('') }}/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="{{ url('') }}/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <!-- Bootstrap JS (Required for dropdown functionality) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<style>


    </style>
        <!-- Main CSS File -->
        <link href="{{ url('') }}/front/assets/css/main.css" rel="stylesheet">
    
    </head>
    <body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
            <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                    <h1 class="sitename">AIG</h1>
                </a>
        
                <!-- Include the dynamic navmenu -->
                @include('partials.navmenu')
        
                <a class="btn-getstarted" href="index.html#about">Get Started</a>
            </div>
        </header>
    
        
        <main class="main">
    
            @yield('content')
            
        </main>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
           <!-- Main JS File -->
      <script src="{{ url('') }}/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="{{ url('') }}/front/assets/vendor/php-email-form/validate.js"></script>
      <script src="{{ url('') }}/front/assets/vendor/aos/aos.js"></script>
      <script src="{{ url('') }}/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="{{ url('') }}/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="{{ url('') }}/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    
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