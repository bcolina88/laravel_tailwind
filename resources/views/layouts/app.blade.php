<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
              
        <title>Dashboard </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <wireui:scripts />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    </head>
    <body class="text-blueGray-700 antialiased">

        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="root">
        
            <!-- Sidebar -->
        
            @include('livewire.sidebar')
        
        
            <!-- Fin Sidebar -->
        
        
        
            <div class="relative md:ml-64 bg-blueGray-50">
        
                <!-- Navbar -->
        
                @include('livewire.nav')
        
                <!-- Fin Navbar -->
        
        
        
        
                <!-- Header -->
                <div class="relative bg-pink-600 md:pt-32  pt-12">
        
                </div>
                <div class="px-4 mx-auto w-full">
                    <div class="flex flex-col">
        
        
                        <!-- Main -->
        
                        {{ $slot }}
        
                        <!-- Fin Main -->
        
                    </div>
        
                    <footer class="block py-4">
                        <div class="container mx-auto px-4">
                            <hr class="mb-4 border-b-1 border-blueGray-200" />
                            <div class="flex flex-wrap items-center md:justify-between justify-center ">
                                <div class="w-full md:w-4/12 px-4">
                                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                                        Copyright © <span id="javascript-date"></span>
                                        <a href="#"
                                            class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
                                            Brayan Colina
                                        </a>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        <x-notifications z-index="z-50" />
        </div>

        <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" charset="utf-8"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <script>
            window.addEventListener('alert', event => {
                          toastr.success(event.detail.message)
             });
                
                      /* Sidebar - Side navigation menu on mobile/responsive mode */
                      function toggleNavbar(collapseID) {
                        document.getElementById(collapseID).classList.toggle("hidden");
                        document.getElementById(collapseID).classList.toggle("bg-white");
                        document.getElementById(collapseID).classList.toggle("m-2");
                        document.getElementById(collapseID).classList.toggle("py-3");
                        document.getElementById(collapseID).classList.toggle("px-6");
                      }
                      /* Function for dropdowns */
                      function openDropdown(event, dropdownID) {
                        let element = event.target;
                        while (element.nodeName !== "A") {
                          element = element.parentNode;
                        }
                        var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
                          placement: "bottom-end"
                        });
                        document.getElementById(dropdownID).classList.toggle("hidden");
                        document.getElementById(dropdownID).classList.toggle("block");
                      }
                
                
                      (function () {
                
                           window.addEventListener('nameChanged', event => {
                                 //console.log(event.detail );
                                 //console.log( {{ Auth::user()->id }} );
                                 // document.getElementById('username').innerHTML = event.detail.name;
                
                                 if ({{ Auth::user()->id }} == event.detail.id) {
                                    $('[x-ref="username"]').text(event.detail.name);
                                   // $('[x-ref="avatar_url"]').src(event.detail.avatar_url);
                                    document.getElementById("myImageId").src=event.detail.avatar_url;
                
                                 }
                                     
                           });
                
                
                            window.addEventListener('sidebarChanged', event => {
                                 //console.log(event.detail );
                
                
                                  event.detail.forEach(function(item) {
                                    // fila+="<option value="+item.id+">"+item.nombre+" "+item.apellido+"-"+item.email+"</option>";
                
                                   // console.log(item.ver);
                                        if (item.ver !=1) {
                                           $('#maestro'+item.maestro_id).addClass('hidden');
                
                                           if (item.maestro_id == 7) {
                                              $('#maestro'+item.maestro_id+'_').addClass('hidden');
                                              $('#line1').addClass('hidden');
                                              $('#line2').addClass('hidden');
                                           }
                
                
                                        }else{
                                           $('#maestro'+item.maestro_id).removeClass('hidden');
                
                                            if (item.maestro_id == 7) {
                                              $('#maestro'+item.maestro_id+'_').removeClass('hidden');
                                              $('#line1').removeClass('hidden');
                                              $('#line2').removeClass('hidden');
                                            }
                                          
                                        }
                
                                        
                
                
                
                
                                  });
                

                                     
                           });
                
                      })();
        </script>



       
        @livewireScripts
    </body>
</html>
