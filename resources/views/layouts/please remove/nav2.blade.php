<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-700 pt-2  theme-light ">
    <h1>testing</h1>
    <div id="app" class="mt-12 overflow-x-hidden">
        <header class=" fixed top-0 left-0 z-30 w-full bg-navprimary sm:flex sm:justify-between sm:px-2 sm:py-1 sm:items-center">
            <div class="flex items-center justify-between px-2 py-1 sm:p-0 ">
                 <a href="/" class=" hover:outline-none hover:bg-navlinkhover outline-none rounded-md px-1">
                     <div class=" text-3xl">
                         <span class=" text-blue-300">Bale</span><span class=" text-blue-200">Wites</span>
                     </div>
                 </a>
          
                 <div class="sm:hidden focus:outline-none ">
                     <button id="menuBtn" class="hamburger block sm:hidden focus:outline-none hover:outline-none " :class="isOpen ? 'open' : '' "  type="button" onclick="navslide()">
             <span class="hamburger__top-bun"></span><span class="hamburger__middle-bun"></span><span class="hamburger__bottom-bun"></span>
             </button>
                     
                 </div>
             </div>
             
             
             
     
         </header>
         <nav id="nav" class=" w-6/12 bg-navprimary fixed top-0 right-0 z-20 sm:w-auto sm:z-40 transform translate-x-full sm:transform-none transition-transform duration-1000 ease-in-out">
            <div class="mt-12 p-2 sm:flex sm:mt-0 ">
                
                    <a href="#" class=" navlink">test</a>
                
                   <a href="#" class="navlink">test</a>
               
                   <a href="#" class="navlink">test</a>
               
            </div>
        </nav>
         

    </div>
    <script>
        const navslide = ()=>{
            const burger = document.querySelector('#menuBtn')
            const nav = document.querySelector('#nav')
            nav.classList.toggle('transform')
            burger.classList.toggle('open-btn')
            
        }
        

    </script>
    <div class="text-white">
        <p class="text-2xl">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo tenetur eaque unde cum, ducimus adipisci, minima, neque dicta consequatur pariatur voluptatem at. Commodi, voluptatum! Eos reiciendis quisquam labore commodi quas!
        </p>
        <p class="text-2xl">
           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo tenetur eaque unde cum, ducimus adipisci, minima, neque dicta consequatur pariatur voluptatem at. Commodi, voluptatum! Eos reiciendis quisquam labore commodi quas!
       </p><p class="text-2xl">
           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo tenetur eaque unde cum, ducimus adipisci, minima, neque dicta consequatur pariatur voluptatem at. Commodi, voluptatum! Eos reiciendis quisquam labore commodi quas!
       </p>
     </div>
    
</body>
</html>