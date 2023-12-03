<div class="min-w-screen h-screen animated fadeIn faster  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover overflow-scroll  fixed"  wire:model="confirmItem" >

<div class="fixed  bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg  relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->

        <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        
                        <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4 text-center align-center">
                          {{ isset( $this->proyect->id) ? 'Editar proyecto' : 'Agregar proyecto'}}
                        </h1>

                        <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Título</label>
                        <input id="title" type="text" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  wire:model.defer="proyect.title" placeholder="Título" autocomplete="off"/>
                        @error('proyect.title') <p class="text-white bg-red-400">{{ $message }}</p> @enderror

                    
                        <div wire:ignore>
                            <label for="description" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Descripción</label>
                                <textarea id="description" type="text" class="block w-full mt-1 rounded-md" wire:model.defer="proyect.description" rows="3"></textarea>
                            </label>
                            @error('proyect.description')<p class="text-white bg-red-400">{{ $message }}</p> @enderror
                        </div>


                        <div class="form-group">
                            <label for="customFile">Imagen de proyecto</label>
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
                                  <img src="{{ $photo->temporaryUrl() }}" class="" width="100%" >
                                  @else
                                  <img src="{{ $state['image_url'] ?? '' }}" class="" width="100%">
                                  @endif

                                  <br>

                               </div>

                            <br>
                    


                        </div>



                        @if($editMode)
            

                        <label for="type_proyect" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Tipo de proyecto</label>
                        <div class="relative mb-5 mt-2">


                            <select class="form-select appearance-none
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding bg-no-repeat
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" wire:model.defer="proyect.type_proyect">
                                    <option selected>Abrir este menú de selección</option>
                                    <option value="public">Público</option>
                                    <option value="draft">Borrador</option>
                                </select>
         




                        </div>

                        @endif

       
                        <div class="flex items-center justify-start w-full ">

                        

                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded p-3 text-sm" wire:click="cancel()" wire:loading.attr="disabled">Cancelar</button>


                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white p-3  ml-2 text-sm"  wire:loading.attr="disabled" wire:click="saveProyect()" >Enviar</button>
                            
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


<script>
    let editor;
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then(function(leditor){
            editor = leditor;
            leditor.model.document.on('change:data',()=>{
                @this.set('proyect.description',leditor.getData());
            })


        })
        .catch( error => {
            console.error( error );
        } );
</script>