<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blogku | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Favicons -->
    <link href="{{ asset('asset-user/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('asset-user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset-user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-user/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ asset('asset-user/assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('asset-user/assets/css/main.css') }}" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <!-- Tags css -->
    <link rel="stylesheet" href="{{ asset('amsify/amsify.suggestags.css') }}">

    <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('user.layouts.header')
    <!-- End Header -->

    <main id="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('user.layouts.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset-user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset-user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset-user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset-user/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset-user/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset-user/assets/js/main.js') }}"></script>

    <!-- CDN Autosuggestion -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <!-- Include jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Amsify -->
    <script src="{{ asset('amsify/jquery.amsify.suggestags.js') }}"></script>
    <script>
      $('input[name="post_tag"]').amsifySuggestags();
    </script>
</body>

</html>