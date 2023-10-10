<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Property Damage Claim Details') }}
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
                        <h1 class="text-blueGray-700 text-2xl font-bold my-4">Property Damage Claim Summary</h1>
                        <div class="border-t border-blueGray-200 mx-auto w-3/4"></div>
                    </div>

                    <!-- Claimant Name -->
                    <div class="text-center mt-6 mb-10">
                        <h2 class="text-blueGray-600 text-xl font-semibold">Claimant:
                            {{ $propertyDamage->claimant->name }}</h2>
                    </div>

                    <!-- Details -->
                    <div class="table-responsive">
                        <table class="min-w-max w-full table-auto">
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Circumstances of Incident:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->circumstances }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Number of Adults:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->no_of_adult }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Estimated Value:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->estimated_value }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Animal Responsible:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->animal_responsible }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Total Estimated Value:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->total_estimated_value }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Place of Incident:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->place_of_incident }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Date of Incident:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->date_of_incident }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-gray-700 font-semibold">Time of Incident:</td>
                                    <td class="px-4 py-2">{{ $propertyDamage->time_of_incident }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Verification Details -->
                    <div class="mt-10 border-t border-blueGray-200 pt-6">
                        <h3 class="text-blueGray-600 text-lg font-semibold mb-4">Verification Details</h3>
                        <p>Verified by: {{ $propertyDamage->verified_by_name }}</p>
                        <p>EST. No: {{ $propertyDamage->est_no }}</p>
                        <p>Designation: {{ $propertyDamage->designation }}</p>
                        <div class="flex items-center mt-6">
                            {{-- <img src="{{ $cropDestruction->signature }}" alt="Officer Signature" class="w-32 h-12 mr-4"> --}}
                            <p class="text-xs text-gray-500">Officer's Signature</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="mt-10 flex justify-center">
                    <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Download Report
                    </a>
                </div>

            </div>
  
    </section>
    </div>
</x-app-layout>
