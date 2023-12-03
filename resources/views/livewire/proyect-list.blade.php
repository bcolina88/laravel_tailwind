<div class="w-full  mb-12 xl:mb-0 px-4 mx-auto pt-8">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
        <div class="rounded-t mb-0 px-4 py-3 border-0 justify-center">
            <div class="flex flex-wrap items-center">



                @if($deleteMode)
                @include('proyectos.confirmation')
                @endif

                @if($addMode)
                @include('proyectos.add')
                @endif


                <div class="flex flex-row w-full pb-3 space-x-2">
                    <button type="button" wire:click="confirmItemAdd"
                        class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
                        Nuevo proyecto
                    </button>

                    <button type="button" wire:click="clear"
                        class="px-4 py-2 pl-3 rounded text-white inline-block shadow-lg bg-gray-500 hover:bg-gray-600 focus:bg-gray-700">
                        Limpiar busquedas
                    </button>
                </div>


                @if(Session::has('message'))


                <div class="flex flex-row w-full bg-green-500 text-white text-sm font-bold px-4 py-3 " role="alert"
                    x-data="{show: true}" x-show="show">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{ session('message') }}</p>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                        <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>

                @endif




                <div class="flex flex-row mb-1 sm:mb-0 p-2 relative sm:w-1/2">
                    <span class="text-sm font-semibold leading-tight pt-2 pr-2">Mostrar</span>

                    <select wire:model="perPage"
                        class="appearance-none h-full  border block appearance-none w-full bg-white border-gray-400 text-gray-700 p-2 px-4 pr-7 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-xs">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>


                    <span class="text-sm font-semibold leading-tight pt-2 pl-2">entradas</span>
                </div>

                <div class="relative sm:w-1/2">
                    <label for="table-search" class="sr-only">Búsqueda</label>
                    <div class="">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>


                        <input type="text" wire:model="search"
                            class="pl-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full  flex items-center text-sm border-gray-300 rounded border"
                            placeholder="Buscar proyectos">

                    </div>

                </div>



            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center bg-transparent w-full border-collapse ">
                <thead>
                    <tr>

                        <th
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-center border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                            #
                        </th>
                        <th
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-center border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                            Título
                        </th>
                        <th
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-center border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                            Tipo proyecto
                        </th>


                        <th
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>



                    @forelse ($proyects as $key => $proyect)
                    <tr>



                        <td
                            class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4  text-center">
                            <span class="font-medium">#{{ $proyect->id }}</span>
                        </td>


                        <td
                            class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4  text-center">

                            <span class="font-medium">{{ $proyect->title }}</span>
                        </td>
                        <td
                            class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                           <!-- <span>{{ $proyect->type_proyect }}</span> -->

                           <label class="px-2 py-1 font-semibold leading-tight rounded-sm 
                            {{ ( $proyect->type_proyect =='public' ) ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100';}}">
                            {{ ( $proyect->type_proyect =='public' ) ? 'Público' : 'Borrador';}}
                        </label>



                        </td>





                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                            <div class="flex item-center justify-center">




                                <button wire:click="confirmItemEdit({{$proyect->id}})" wire:loading.attr="disabled"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>


                                <button wire:click="confirmItemDeletion({{$proyect->id}})" wire:loading.attr="disabled"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>


                            </div>

                        </td>
                    </tr>


                    @empty

                    <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                        <td colspan="6" class="py-3 px-12 whitespace-nowrap align-middle text-center">
                            <span class="font-medium ">No hay proyectos que mostrar.</span>
                        </td>
                    </tr>


                    @endforelse




                </tbody>

            </table>



        </div>
        @if(!$proyects->isEmpty())
        <div class="justify-end  pt-5 pb-5 ">
            <ul class=" pl-5 pr-5">
                {{ $proyects->links() }}
            </ul>
        </div>
        @endif
    </div>
