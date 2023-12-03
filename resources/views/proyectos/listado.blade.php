 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>
       
    </x-slot>

   
   <div class="overflow-x-auto ">
        <div class="min-w-screen  bg-gray-100 items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full">

               @livewire('proyect-list')


            </div>
        </div>
    </div>

   
</x-app-layout>
