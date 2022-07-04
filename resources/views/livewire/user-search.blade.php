 <div class="mt-6" x-data="{ open: false, user: @entangle('username') }" @user-selected.window="open = false">
     <span>{{ $model }}</span>
     <small class="text-xs">{{ $description }}</small>
     <span x-show="user==''" x-on:click=" open=true" class="text-sm text-blue-500 underline hover:cursor-pointer">search
         for
         user</span>
     <span x-show="user!=''"> <span class="underline">{{ $username }}</span> <span
             class="text-sm text-blue-500 underline hover:cursor-pointer" x-on:click=" open=true">Change User</span>
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
                         <x-label for="username" value="username" />
                         <x-input id="username" class="block mt-1 w-full" type="text" wire:model="search" />
                     </div>
                     <x-input id="user_id" class="block mt-1 w-full" :name="$name" type="hidden"
                         wire:model="user_id" />
                     <p wire:click="selectUser({{ auth()->user() }})"
                         class="text-sm text-blue-500 underline hover:cursor-pointer">My self</p>

                     <ul class="mt-4">
                         @foreach ($users as $user)
                             <li wire:click="selectUser({{ $user }})"
                                 class="text-sm text-blue-500 underline hover:cursor-pointer">{{ $user->username }}
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
