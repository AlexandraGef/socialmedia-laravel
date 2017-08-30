<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

    <script src="/js/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script src="/js/foundationapp.js"></script>

    <title>Bevy</title>
</head>
<body>
@include('templates.partials.navigation')
<div class="container">
    @include('templates.partials.alerts')
    @yield('content')
</div>



</body>
</html>