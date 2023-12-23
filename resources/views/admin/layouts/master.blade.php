<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->

  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
<</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        @include('admin.layouts.sidebar')
      <!-- Main Content -->
      <div class="main-content">
       @yield('contents')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
         {{ date('Y') }} <div class="bullet"></div> Design By <a href="">Mbognan</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('admin/assets/js/custom.js')}}"></script>

  @stack('scripts')
</body>
</html>
