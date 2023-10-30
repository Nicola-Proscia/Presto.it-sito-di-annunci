<!doctype html>
<html lang="it" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Presto.it</title>
    <link rel="shortcut icon" href="/img/logo/logopresto.png" type="image/x-icon">

    {{-- CDN FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    {{-- Fonts Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Tilt+Neon&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    <x-navbar/>

    

    <div class="min-vh-100 marginCustom">
      {{$slot}}
    </div>

    <x-footer/>

  </body>
  
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</html>