
<form method="post" action="{{ route('comments.store') }}" class="p-6" id="crop_damage" onsubmit="handleFormSubmit(event, 'comments')">
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
        CROP DESTRUCTION (KWS VERYING OFFICER TO FILL)
    </h6>
    @csrf
<div class="flex flex-wrap">
   
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                htmlfor="grid-password">
                CIRCUMSTANCES OF INCIDENT 
            </label>
            <textarea type="text"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                rows="4" name="circumstances"> </textarea>
        </div>
    </div>
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2  mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                Crop Name
            </label>
            <input type="text" name="crop_name" placeholder="Crop Name" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2  mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                Animal Responsible
            </label>
            <input type="text" name="animal_reponsible" placeholder="Animal Responsible" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
    <!-- ID/Passport No -->
    <div class="w-full lg:w-6/12 px-4">
        <div class="relative w-1/2 mb-3">
            <label for="landOwnershipStatus">Land Ownership Status:</label>
            <select id="landOwnershipStatus" name="landOwnershipStatus" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              <option value="private">Private</option>
              <option value="community">Community</option>
              <option value="leased">Leased</option>
            </select>
            
        </div>
    </div>
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2 mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                APPROXIMATE ACREAGE DESTROYED: 
            </label>
            <input type="text" name="acreage" placeholder="APPROXIMATE ACREAGE DESTROYED" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
   
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2  mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                STAGE OF GROWTH
            </label>
            <input type="text" name="stage" placeholder="STAGE OF GROWTH" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2  mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                ESTIMATED VALUE:
            </label>
            <input type="text" name="value" placeholder=" ESTIMATED VALUE:" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
    <div class="w-full lg:w-12/12 px-4">
        <div class="relative w-1/2  mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                PLACE OF INCIDENT
            </label>
            <input type="text" name="place" placeholder="  PLACE OF INCIDENT" required
                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 mb-2">
        </div>
    </div>
</div>
<button type="submit" id="nextBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Next
</button>
</form>