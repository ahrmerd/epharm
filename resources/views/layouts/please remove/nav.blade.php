<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <h1>testing</h1>
    <p>{{$user}}</p>
    <div id="app">
    <navbar :user='{{$user}}'/>
        

    </div>
    
</body>
</html>