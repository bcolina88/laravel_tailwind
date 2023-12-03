<div class="min-w-screen h-screen animated fadeIn faster  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover overflow-scroll  fixed"  wire:model="confirmItem" >

<div class="fixed  bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg  relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->

        <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        
                        <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-center align-center">
                          {{ isset( $this->user->id) ? 'Editar Usuario' : 'Agregar Usuario'}}
                        </h1>

                        <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nombre</label>
                        <input id="name" type="text" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  wire:model="user.name" placeholder="Nombre" autocomplete="off"/>
                        @error('user.name') <p class="text-white bg-red-400">{{ $message }}</p> @enderror

                        <label for="email" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Email</label>
                        <input id="email" type="email" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  wire:model.defer="user.email" placeholder="Email" autocomplete="off"/>
                         @error('user.email') <p class="text-white bg-red-400">{{ $message }}</p> @enderror

                        <label for="password" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Contraseña</label>
                        <input id="password" type="password" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  wire:model.defer="user.password" placeholder="Contraseña" />
                        @error('user.password') <p class="text-white bg-red-400">{{ $message }}</p> @enderror


                         <div class="form-group">
                            <label for="customFile">Profile Photo</label>
                            <div class="custom-file">
                                <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input wire:model="photo" type="file" class="custom-file-input" id="customFile">
                                    <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <label class="custom-file-label" for="customFile">
                                    @if ($photo)
                                    {{ $photo->getClientOriginalName() }}
                                    @else
                                    Choose Image
                                    @endif
                                </label>
                            </div>


                              <div class=" flex justify-center">

                                  @if ($photo)
                                  <img src="{{ $photo->temporaryUrl() }}" class="rounded-full" width="200" >
                                  @else
                                  <img src="{{ $state['avatar_url'] ?? '' }}" class="rounded-full" width="200">
                                  @endif

                                  <br>

                               </div>

                            <br>
                    


                        </div>

       
                        <div class="flex items-center justify-start w-full ">

                        

                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded p-3 text-sm" wire:click="cancel" wire:loading.attr="disabled">Cancelar</button>


                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 bg-indigo-700 rounded text-black p-3  ml-2 text-sm"  wire:loading.attr="disabled" wire:click="saveUser" >Enviar</button>
                            
                        </div>


                        <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                               
                            </svg>
                        </button>
        </div>


        



    </div>
  </div>
</div>