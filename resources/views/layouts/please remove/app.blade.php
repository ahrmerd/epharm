<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>Balewite</title>
</head>
@auth

<body class="{{Auth::user()->profile->theme}} bg-bgprimary text-textprimary mt-12 h-full ">@endauth
    @guest

    <body class="theme-light bg-bgprimary text-textprimary mt-12 h-full">@endguest
        @auth<div id="app" :class='theme' class="bg-bgprimary text-textprimary h-screen">@endauth
            @guest<div id="app"> @endguest
                <div>
                    @guest
                    <navbar :initialuser="{{json_encode('no user')}}" @theme='setTheme'></navbar>
                    @endguest

                    @auth
                    <navbar :initialuser='{{json_encode( $user )}}' @theme='setTheme'></navbar>
                    @endauth
                    <main class="py-4 bg-bgprimary">
                        @yield('content')
                    </main>
                </div>
            </div>

    </body>

</html>
