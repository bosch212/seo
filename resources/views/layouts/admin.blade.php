
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  @stack('prepend-style')
  @include('includes.admin.style')
  @stack('addon-style')

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('includes.admin.navbar')
      
      @include('includes.admin.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('sub-judul')</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
            </div>
          </div>
          @yield('content')
        </section>
      </div>
      @include('includes.admin.footer')
    </div>
  </div>
    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')

    <script>
      $(document).ready( function () {
      $('#table_id').DataTable();
      } );
    </script>
</body>
</html>
