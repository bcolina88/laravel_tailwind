<nav x-data="{ open: false,open1: false,open2: false }"
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
      >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none  rounded border border-solid border-transparent "
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i></button
          >
          <a
            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="javascript:void(0)"
          >
         
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">

           <span class="text-blueGray-700 text-sm uppercase lg:inline-block font-semibold" x-ref="username">{{ Auth::user()->name }} </span> 


            <li class="inline-block relative">
              <a
                class="text-blueGray-500 block py-1 px-3"
                href="#"
                onclick="openDropdown(event,'notification-dropdown')"
                ><i class="fas fa-bell"></i
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="notification-dropdown"
              >
                <a
                  href="#"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Notificaciones</a
                >
              </div>
            </li>
            <li class="inline-block relative">
              <a
                class="text-blueGray-500 block"
                href="#"
                onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    ><img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="{{ Session::has('image_perfil') ? Session::get('image_perfil') : '' }}"
                  /></span></div
              ></a>
              <div
                class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-responsive-dropdown"
              >
           
                 <a
                
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"  id="maestro7"
                  >Perfil</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100" id="line2"></div>

           
               

                 <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                <a
                  href="{{ route('logout') }}" @click.prevent="$root.submit();"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Cerrar sesión</a
                >

                 </form>


              </div>


            </li>
          </ul>
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="javascript:void(0)"
                  >
                    Menú
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-bars"></i>
                  </button>

                </div>
              </div>
            </div>


            <ul class="md:flex-col md:min-w-full flex flex-col list-none">

      
              <li class="items-center" id="maestro1">
                <a
                  class=" hover:text-pink-600 text-xs uppercase py-3 font-bold block {{ ( request()->routeIs('home')) ? 'text-pink-500' : 'text-blueGray-700';}}"
                  href="{{ route('home') }}"
                  ><i class="fas fa-tv opacity-75 mr-2 text-sm"></i>
                  Dashboard</a
                >
              </li>
         

              <li class="items-center"  id="maestro4">



                      <a @click="open2 = ! open2" class="py-3 text-slate-700 hover:text-pink-600 text-xs uppercase font-bold block no-underline" ><i class="fa fa-gears mr-2 text-sm "></i>Configuración <i class="text-xs fas fa-angle-down"></i></a>

                      <ul :class="{'block': open2, 'hidden': ! open2}" class="hidden flex-wrap list-none pl-0 mb-0 mt-3">


             
                        <li class="items-center"  id="maestro5">

                            <a @click="open = ! open" class="text-slate-500 hover:text-pink-600 text-sm block mb-2 mx-4 no-underline {{ ( request()->routeIs('usuarios.index')) ? 'text-pink-500' : 'text-blueGray-700';}}" href="{{ route('usuarios.index') }}">Usuarios <i class="text-xs fas fa-angle-down"></i></a>
                        </li>

                        <li class="items-center" id="maestro6">
                        
                          <a @click="open = ! open" class="text-slate-500 hover:text-pink-600 text-sm block mb-2 mx-4 no-underline {{ ( request()->routeIs('proyectos.index')) ? 'text-pink-500' : 'text-blueGray-700';}}" href="{{ route('proyectos.index') }}">Proyectos <i
                              class="text-xs fas fa-angle-down"></i></a>

                        </li>
      

                      </ul>
              </li>
           


              <li class="items-center">
                  <a class="hover:text-pink-600 text-xs uppercase py-3 font-bold block" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="fa fa-sign-out mr-2 text-sm"></i>Salir
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                  </a>
              </li>



            </ul>

    
          </div>
        </div>
 

          



</nav>