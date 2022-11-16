 <div class="" x-data="{ open: false }" @user-selected.window="open = false">
     <button x-on:click="open=true"
         class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">{{ $medication == null ? 'Add' : 'Modify' }}</button>



     <!-- Dialog (full screen) -->
     <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);" x-show="open">
         <!-- A basic modal dialog with title, body and one button to close -->
         <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
             x-on:click.away="open = false">
             <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                 <form method="POST"
                     action="{{ $medication == null ? route('medications.store') : route('medications.update', $medication->id) }}">
                     @csrf
                     @if ($medication != null)
                         @method('PUT')
                     @endif
                     {{-- drugs --}}
                     <input type="hidden" name="prescription_id" value='{{ $prescription_id }}'>
                     <div>
                         <x-label for="drugs" value="drug" />
                         <x-select id="drugs" class="block mt-1 w-full" name="drug_id" :data=$drugs
                             :value="$medication?->drug_id ?? old('drugs')" required />
                     </div>

                     {{-- dosage --}}
                     <div>
                         <x-label for="dosage" value="dosage" />
                         <x-input id="dosage" class="block mt-1 w-full" type="text" name="dosage"
                             :value="$medication?->dosage ?? old('dosage')" required />
                     </div>

                     {{-- notes --}}
                     <div>
                         <x-label for="notes" value="notes" />
                         <x-input id="notes" class="block mt-1 w-full" type="text" name="notes"
                             :value="$medication?->notes ?? old('notes', '')" />
                     </div>
                     <button type="submit"
                         class="px-3 bg-blue-500 text-white py-2 border rounded-lg hover:bg-slate-600">Submit</button>


                 </form>
             </div>


         </div>
     </div>
 </div>
