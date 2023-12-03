 <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
          >
            <a
              class="text-white text-sm uppercase lg:inline-block font-semibold"
              href="#"
              >

            
   
             {{ (request()->routeIs('home')) ? 'Dashboard' : ''}}
             {{ (request()->routeIs('usuarios.index')) ? 'Usuarios' : ''}}
             {{ (request()->routeIs('proyectos.index')) ? 'proyectos' : ''}}
          

            </a>


            <ul
              class="flex-col md:flex-row list-none items-center hidden md:flex"
            >

         
             <span class="text-white text-sm uppercase lg:inline-block font-semibold px-3" x-ref="username">{{ Auth::user()->name }} </span> 


              <a class="text-blueGray-500 block" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    >

                    <img
                      alt="..."
                      id="myImageId"
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="{{ auth::user()->avatar_url }}"





                  /></span>
                </div>
              </a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-dropdown"
              >


                <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                <a
                  href="{{ route('logout') }}" @click.prevent="$root.submit();"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Cerrar sesión</a
                >

                 </form>



              </div>
            </ul>
          </div>
 </nav>
