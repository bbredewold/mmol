<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mmol - A Nice Nightscout MenuBar App</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-3xl font-bold p-5">
        {{ $lastReading->getMmolString() }}
    </h1>
</body>
</html>
