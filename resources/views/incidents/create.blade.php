{{-- <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"> --}}
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Incident Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            {{-- <x-action-button class="p-2" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'ob-form-modal')" data-modal-toggle="ob-form-modal">
                {{ __('Create OB') }}</x-action-button> --}}
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <!-- component -->


                <section class=" py-1 bg-blueGray-50">
                    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                            <div class="rounded-t bg-white mb-0 px-6 py-6">
                                <div class="text-center flex justify-between">
                                    <h6 class="text-blueGray-700 text-xl font-bold">
                                        Record an Incident
                                    </h6>
                                    <button
                                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                        type="button">
                                        Settings
                                    </button>
                                </div>
                            </div>
                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <form>

                                    <hr class="mt-6 border-b-1 border-blueGray-300">

                                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                        Incident Information
                                    </h6>
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-12/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlfor="grid-password">
                                                Name of Affected
                                            </label>
                                            <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name="name_of_affected" value="{{ $ob->name_of_affected ?? '' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-4/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlfor="grid-password">
                                                OB Number
                                            </label>
                                            <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            name="ob_number" value="{{ $obNumber ?? '' }}" disabled>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-4/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlfor="grid-password">
                                                Date of Incident
                                            </label>
                                            <input type="date"
                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                value="">
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-4/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                    htmlfor="grid-password">
                                                   Animal Responsible
                                                </label>
                                                <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="incident_type" name="incident_type">
                                                    <option value="">{{__('Select Animal')}}</option>
                                                    @foreach ($compensation_animals as $compensation_animals)
                                                        <option value="{{ $compensation_animals->id }}">{{ $compensation_animals->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="incident-forms"></div>

                                    <hr class="mt-6 border-b-1 border-blueGray-300">
                                    <button type="button" id="add-incident" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Add New Incident
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </section>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        let incidentCount = 1; // Initialize the incident count

        // Function to add a new incident form
        function addIncidentForm() {
            incidentCount++; // Increment the incident count
            const newForm = `
                <div class="mt-6 border-b-1 border-blueGray-300">
                    <button type="button" class="float-right text-red-500 font-bold cursor-pointer remove-incident">X</button>
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Incident Information (Incident ${incidentCount})
                    </h6>
                    <div class="flex flex-wrap">
                        <!-- Include your incident form fields here with unique names/id attributes -->
                        <div class="w-full lg:w-12/12 px-4">
                            <!-- Add fields for Name of Affected, OB Number, Date of Incident, etc. -->
                        </div>
                    </div>
                </div>
            `;
            $('#incident-forms').append(newForm); // Append the new form to a container div
        }

        // Handle the click event of the "Add New Incident" button
        $('#add-incident').click(function() {
            addIncidentForm();
        });

        // Handle the click event of the "X" button to remove the incident form
        $('#incident-forms').on('click', '.remove-incident', function() {
            $(this).parent().remove(); // Remove the parent div containing the incident form
        });
    });
</script>

