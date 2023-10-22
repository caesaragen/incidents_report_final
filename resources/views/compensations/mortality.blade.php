<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('View Claim') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <x-action-button class="p-2 m-2" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'mortality-form-modal')"
                    data-modal-toggle="mortality-form-modal">
                    {{ __('Add Attachments') }}</x-action-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Letterhead -->
                    <div class="text-center mb-6">
                        <img src="{{ asset('logo_colored.png') }}" alt="App Logo" class="mx-auto w-32 h-32">
                        <h1 class="text-blueGray-700 text-2xl font-bold my-4">Human Death/Injury Claim Summary</h1>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Personal Details -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" readonly value="{{ $humanDeath->claimant->name }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2 mr-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sex:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->sex }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Age:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->age }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2 mr-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Present Address:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->address }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Constituency:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->constituency }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->email }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Telephone:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->tel_no }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="flex mb-4">
                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">County:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->county }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sub County:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->sub_county }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->location }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>


                        <div class="w-1/2 ml-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sub Location:</label>
                            <input type="text" readonly value="{{ $humanDeath->claimant->sub_location }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                    </div>

                    <!-- Incident Details -->
                    <div class="mt-10">

                        <div class="mt-10">
                            <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Incident Details</h3>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Date of Reporting:
                                    {{ $humanDeath->created_at }}</label>
                                {{-- <input type="text" readonly value="{{ $humanDeath->created_at }}" --}}
                                {{-- class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">1. Place of Death:</label>
                                <input readonly value="{{ $humanDeath->place_of_death }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">2. Animal Responsible:</label>
                                <input type="text" readonly value="{{ $humanDeath->animal_responsible }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">3. Inside or Outside Protected
                                    Area:</label>
                                <input type="text" readonly value="{{ $humanDeath->inside_outside_pa }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">4.GPS Coordinates:</label>
                                <input type="text" readonly value="{{ $humanDeath->gps_coordinates }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">5. Circumstances:</label>
                                <input type="text" readonly value="{{ $humanDeath->circumstances }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>





                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">6. Date and Time of
                                    Incident:</label>
                                <div class="flex space-x-4">
                                    <input type="date" readonly value="{{ $humanDeath->date_of_incident }}"
                                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <input type="time" readonly value="{{ $humanDeath->time_of_incident }}"
                                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
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

                    <!-- Verification Details -->
                    <div class="mt-10 border-t border-blueGray-200 pt-6">
                        <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Verification Details</h3>
                        <p>Verified by: {{ $humanDeath->verified_by }}</p>
                        <p>EST. No: {{ $humanDeath->est_no }}</p>
                        <p>Designation: {{ $humanDeath->designation }}</p>
                        <div class="flex items-center mt-6">
                            {{-- <img src="{{ $humanDeath->signature }}" alt="Officer Signature" class="w-32 h-12 mr-4"> --}}
                            <p class="text-xs text-gray-500">Officer's Signature</p>
                        </div>
                    </div>
                    @include('components.mortality-modal')
                    <!-- Action Button -->
                    <div class="mt-10 flex justify-center">
                        <a href=""
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Download Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
