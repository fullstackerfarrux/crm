<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;500;600;700;800&family=Roboto+Slab:wght@400;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/scss/auth.scss', 'resources/js/app.js'])
    <title>Auth</title>
</head>

<body style="margin: 0">
    {{ $slot }}
</body>

</html>
