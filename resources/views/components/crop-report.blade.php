 <!-- Action Button -->
 <div>
     <!-- Letterhead -->
    {{-- <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">  --}}

     <div class="text-center mb-6">
         <img src="{{ asset('logo_colored.png') }}" alt="App Logo" class="mx-auto w-32 h-32">
         <h1 class="text-blueGray-700 text-2xl font-bold my-4">Crop Destruction Claim Summary</h1>
     </div>

     <!-- Personal Details -->
     <div class="mb-4">
         <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
         <input type="text" readonly value="{{ $cropDestruction->claimant->name }}"
             class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <div class="flex mb-4">
         <div class="w-1/2 mr-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Sex:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->sex }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>

         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Age:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->age }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>

     </div>
     <div class="flex mb-4">
         <div class="w-1/2 mr-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Present Address:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->address }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>

         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Constituency:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->constituency }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>
         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->email }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>

         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Telephone:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->tel_no }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>
     </div>

     <div class="flex mb-4">
         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">County:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->county }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>
         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Sub County:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->sub_county }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>
         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->location }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>


         <div class="w-1/2 ml-2">
             <label class="block text-gray-700 text-sm font-bold mb-2">Sub Location:</label>
             <input type="text" readonly value="{{ $cropDestruction->claimant->sub_location }}"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
         </div>

     </div>

     <!-- Incident Details -->
     <div class="mt-10">
         <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Incident Details</h3>

         <div class="mb-4">
             <label class="block text-gray-700 text-sm font-bold mb-2">1. Circumstances of
                 Incident:</label>
             <textarea readonly rows="3"
                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $cropDestruction->circumstances }}</textarea>
         </div>

         <div class="mt-10">
             <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Incident Details</h3>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">1. Circumstances of
                     Incident:</label>
                 <textarea readonly rows="3"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $cropDestruction->circumstances }}</textarea>
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">2. Crop Name:</label>
                 <input type="text" readonly value="{{ $cropDestruction->crop_name }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">3. Animal Responsible:</label>
                 <input type="text" readonly value="{{ $cropDestruction->animal_responsible }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">4. Land Ownership
                     Status:</label>
                 <input type="text" readonly value="{{ $cropDestruction->land_ownership_status }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">5. Approximate Acreage
                     Destroyed:</label>
                 <input type="text" readonly value="{{ $cropDestruction->acreage }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">6. Stage of Growth:</label>
                 <input type="text" readonly value="{{ $cropDestruction->stage }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">7. Estimated Value:</label>
                 <input type="text" readonly value="KSH {{ $cropDestruction->value }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">8. Measures in Place:</label>
                 <textarea readonly rows="3"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $cropDestruction->measures }}</textarea>
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">9. Place of Incident:</label>
                 <input type="text" readonly value="{{ $cropDestruction->place }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">10. Location Status:</label>
                 <input type="text" readonly value="{{ $cropDestruction->location_status }}"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
             </div>

             <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2">11. Date and Time of
                     Incident:</label>
                 <div class="flex space-x-4">
                     <input type="date" readonly value="{{ $cropDestruction->date }}"
                         class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                     <input type="time" readonly value="{{ $cropDestruction->time }}"
                         class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                 </div>
             </div>
                       <!-- Attachments Section -->
                       <div class="mt-10 border-t border-blueGray-200 pt-6">
                        <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Attachments</h3>
                        <ul>
                            @foreach ($attachments as $attachment)
                                <li class="mb-2">
                                    <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                                        {{ $attachment->type }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
         </div>


     </div>

     <!-- Verification Details -->
     <div class="mt-10 border-t border-blueGray-200 pt-6">
         <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Verification Details</h3>
         <p>Verified by: {{ $cropDestruction->verified_by }}</p>
         <p>EST. No: {{ $cropDestruction->est_no }}</p>
         <p>Designation: {{ $cropDestruction->designation }}</p>
         <div class="flex items-center mt-6">
             {{-- <img src="{{ $cropDestruction->signature }}" alt="Officer Signature" class="w-32 h-12 mr-4"> --}}
             <p class="text-xs text-gray-500">Officer's Signature</p>
         </div>
     </div>
 </div>
