 <div class="" x-data="{ open: false, status: @entangle('status') }" @user-registered.window="open = false">
     <div x-show='!status' class="flex">
         <svg class="scale-50" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
             <path fill='red'
                 d="M9 42q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6h30q1.2 0 2.1.9.9.9.9 2.1v30q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V9H9v30Z" />
         </svg>
         <button x-on:click="open=true" class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">

             Create Admin User for
             {{ $type }}
         </button>

     </div>
     <div x-show='status' class="flex">
         <svg class="scale-50" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
             <path fill='green'
                 d="M20.95 31.95 35.4 17.5l-2.15-2.15-12.3 12.3L15 21.7l-2.15 2.15ZM9 42q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6h30q1.2 0 2.1.9.9.9.9 2.1v30q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V9H9v30ZM9 9v30V9Z" />
         </svg>
         <p> Admin {{ $type }} User Already Created. with username <span
                 class="text-red-500">admin_{{ $types[$type] }}</span> </p>

     </div>



     <!-- Dialog (full screen) -->
     <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);" x-show="open">
         <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
             x-on:click.away="open = false">
             <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                 <form method="POST" action="{{ route('install.admin') }}">
                     @csrf

                     <input type="hidden" name="user_type" value="{{ $types[$type] }}">
                     <div class="mt-4">
                         <x-label for="email-{{ $type }}" value="Email" />
                         <x-input id="email-{{ $type }}" class="block mt-1 w-full" type="email" name="email"
                             required />
                     </div>

                     <div class="mt-4">
                         <x-label for="phone-{{ $type }}" value="phone" />
                         <x-input id="phone-{{ $type }}" class="block mt-1 w-full" type="tel" name="phone"
                             required />
                     </div>

                     <div class="mt-4">
                         <x-label for="password-{{ $type }}" value="Password" />
                         <x-input id="password-{{ $type }}" class="block mt-1 w-full" type="password"
                             name="password" required />
                     </div>

                     <!-- Confirm Password -->
                     <div class="mt-4">
                         <x-label for="password_confirmation-{{ $type }}" value="Confirm Password" />

                         <x-input id="password_confirmation-{{ $type }}" class="block mt-1 w-full"
                             type="password" name="password_confirmation" required />
                     </div>
                     <button type="submit"
                         class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">Submit</button>
                 </form>
             </div>


         </div>
     </div>
 </div>
