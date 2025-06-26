<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Cafeteria App')</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  @yield('styles')
</head>
<body>
  @include('include.navbar')
  <div class="container my-4 ">
    @yield('content')
  </div>
  @include('include.footer')

</body>
</html>
