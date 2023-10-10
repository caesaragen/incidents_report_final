<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Human Death Claim Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="py-1 bg-blueGray-50">
            <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0 p-6">
                    
                    <!-- Letterhead -->
                    <div class="text-center mb-6">
                        <img src="{{ asset('logo_colored.png') }}" alt="App Logo" class="mx-auto w-32 h-32">
                        <h1 class="text-blueGray-700 text-2xl font-bold my-4">Human Death Claim Summary</h1>
                        <div class="border-t border-blueGray-200 mx-auto w-3/4"></div>
                    </div>

                    <!-- Claimant Name -->
                    <div class="text-center mt-6 mb-10">
                        <h2 class="text-blueGray-600 text-xl font-semibold">Claimant:
                            {{ $humanDeath->claimant->name }}</h2>
                    </div>

                    <!-- Details -->
                    <div class="table-responsive">
                        <table class="min-w-max w-full table-auto">
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Place of Death:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->place_of_death }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Animal Responsible:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->animal_responsible }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Inside or Outside Protected Area:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->inside_outside_pa }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">GPS Coordinates:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->gps_coordinates }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Date of Incident:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->date_of_incident }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Time of Incident:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->time_of_incident }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Circumstances:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->circumstances }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Verifying Officer:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->verifying_officer }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Warden Details:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->warden_details }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">GPS Coordinates:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->gps_coordinates }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">EST No:</td>
                                    <td class="px-4 py-2">{{ $humanDeath->est_no }}</td>
                                </tr>
                                <!-- ... Additional fields can be added similarly ... -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Verification Details -->
                    <div class="mt-10 border-t border-blueGray-200 pt-6">
                        <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Verification Details</h3>
                        <p>Verified by: {{ $humanDeath->verifying_officer }}</p>
                        <p>EST. No: {{ $humanDeath->est_no }}</p>
                        <p>Designation: {{ $humanDeath->designation }}</p>
                        <div class="flex items-center mt-6">
                            {{-- <img src="{{ $cropDestruction->signature }}" alt="Officer Signature" class="w-32 h-12 mr-4"> --}}
                            <p class="text-xs text-gray-500">Officer's Signature</p>
                        </div>
                    </div>
                    </div>

                    <!-- Action Button -->
                    <div class="mt-10 flex justify-center">
                        <a href=""
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Download Report
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-app-layout>
