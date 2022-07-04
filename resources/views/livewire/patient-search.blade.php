 <div class="mt-6" x-data="{ open: false, name: @entangle('name') }" @user-selected.window="open = false">
     <span>{{ $description }}</span>
     <span x-show="name==''" x-on:click=" open=true" class="text-sm text-blue-500 underline hover:cursor-pointer">search
         for
         patient</span>
     <span x-show="name!=''"> <span class="underline">{{ $name }}</span> <span
             class="text-sm text-blue-500 underline hover:cursor-pointer" x-on:click=" open=true">Change patient</span>
     </span>

     <!-- Dialog (full screen) -->
     <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);" x-show="open">
         <!-- A basic modal dialog with title, body and one button to close -->
         <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
             x-on:click.away="open = false">
             <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                 <div class="mt-2">
                     <div>
                         <x-label for="name" value="name" />
                         <x-input id="name" class="block mt-1 w-full" type="text" wire:model="search" />
                     </div>
                     <x-input id="user_id" class="block mt-1 w-full" name="patient_id" type="hidden"
                         wire:model="patient_id" />

                     <ul class="mt-4">
                         @foreach ($patients as $patient)
                             <li wire:click="selectPatient({{ $patient }})"
                                 class="text-sm text-blue-500 underline hover:cursor-pointer">
                                 {{ $patient->full_name }}
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>


         </div>
     </div>
 </div>
