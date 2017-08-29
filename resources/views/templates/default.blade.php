<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css">
    <title>Bevy</title>
</head>
<body>
@include('templates.partials.navigation')
<div class="container">
    @yield('content')
</div>
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>
</body>
</html>