 <div class="" x-data="{ open: false }" @user-selected.window="open = false">
     <button x-on:click="open=true" class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">Password
         Change</button>



     <!-- Dialog (full screen) -->
     <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);" x-show="open">
         <!-- A basic modal dialog with title, body and one button to close -->
         <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
             x-on:click.away="open = false">
             <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                 <form method="POST" action="{{ route('users.change-password', $user->id) }}">
                     @csrf
                     <div class="mt-4">
                         <x-label for="password" value="Password" />

                         <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                     </div>

                     <!-- Confirm Password -->
                     <div class="mt-4">
                         <x-label for="password_confirmation" value="Confirm Password" />

                         <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             name="password_confirmation" required />
                     </div>
                     <button type="submit"
                         class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">Submit</button>


                 </form>
             </div>


         </div>
     </div>
 </div>
