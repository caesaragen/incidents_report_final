<section class="section">
    <div class="main-div">
        <div
            class="inner-div">
            <div class="inner-div2">
                <div class="header-div">
                    <h6 class="heading">
                        Incident Report
                    </h6>
                </div>
            </div>
            <div class="h6-div">
                    <h6 class="h6">
                        Warden Information
                    </h6>
                    <div class="flex-wrapper ">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Warden Dispatched
                                </label>
                                <input type="text"
                                    disabled
                                    class="input"
                                    value="{{ $incidentAssessment->warden_dispatched }}">
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Name of Affected
                                </label>
                                <input type="text"
                                class="input"
                                value="{{ $incident->name_of_affected }}"
                                name="name_of_affected"
                                disabled>
                         
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Animal Responsible
                                </label>
                                <input type="text"
                                    class="input"
                                    value={{ $incident->compensationAnimal->name }} disabled>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Date of Incident
                                </label>
                                <input type="text"
                                    class="input"
                                    value={{ $incident->date_of_incident }} disabled>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Time of Incident
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->time_of_incident }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Ranger in Charge
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->ranger_in_charge }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Mode of Transport
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->mode_of_transport }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Number of Vehicles Used
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->no_vehicle_used }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Fuel
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->fuel }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Number of Rangers
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->no_rangers }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Batteries
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->batteries }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Combo Rations
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->combo_rations }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Fresh Rations
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->fresh_rations }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Ammunition
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->ammunition }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   Rounds of Ammunition Used
                                </label>
                                <input type="text"
                                    disabled
                                    name="time_of_incident"
                                    class="input"
                                    value="{{ $incidentAssessment->rounds }}"
                                    >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                   GPS Coordinates (Latitude)
                                </label>
                                <input type="text"
                                    disabled
                                    name="latitude"
                                    class="input"
                                    value={{ $incidentAssessment->latitude }}  >
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-wrapper ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    GPS Coordinates (Longitude)
                                </label>
                                <input type="text"
                                    disabled
                                    name="longitude"
                                    class="input"
                                    value={{ $incidentAssessment->longitude }}  >
                            </div>
                        </div>
                    </div>

                    <hr class="hr">

                    <h6 class="h6">
                        Warden's Report
                    </h6>
                    <div class="flex-wrapper ">
                        <div class="div-outer ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Narrative
                                </label>
                                <textarea type="text"
                                    disabled
                                    class="input"
                                    rows="4">{{ $incidentAssessment->narrative }}  </textarea>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="div-outer ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Discussion with Community
                                </label>
                                <textarea type="text"
                                    disabled
                                    class="input"
                                    rows="4" value={{ $incidentAssessment->discussion_with_community }} >{{ $incidentAssessment->discussion_with_community }} </textarea>
                            </div>
                        </div>


                    </div>
                    <h6 class="h6">
                        Actions Taken
                    </h6>
                    <div class="actions">
                        <!-- Checkbox 1 -->

                        @if($incidentAssessment->actions_taken)
                        <ul>
                            @foreach($incidentAssessment->actions_taken as $action)
                                <li>{{ $action }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No actions taken recorded.</p>
                    @endif
                    
       
                    </div>
                    <hr class="hr">

                    <h6 class="h6">
                        Monitoring and survey of the area
                    </h6>
                    <div class="flex-wrapper ">
                        <div class="div-outer ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Monitoring and survey
                                </label>
                                <textarea type="text"
                                    disabled
                                    class="input"
                                    rows="4" value={{ $incidentAssessment->monitoring_and_survey }} >{{ $incidentAssessment->monitoring_and_survey }} </textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">

                    <h6 class="h6">
                        Evidence
                    </h6>
                    <div class="flex-wrapper ">
                        <div class="div-outer ">
                            <div class="div-wrapper-inner ">
                                <label class="label"
                                    htmlfor="grid-password">
                                    Evidence
                                </label>
                                {{-- @foreach ($incidentAssessment as $attachment) --}}
                                <li style="margin-bottom: 0.5rem;">
                                    <a href="{{ asset('storage/' . $incidentAssessment->evidence_file) }}" target="_blank"
                                        style="color: inherit; text-decoration: none;">
                                        {{ $incidentAssessment->evidence_file }}
                                    </a>
                                </li>
                            {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="div-wrapper ">
                        <div class="div-wrapper-inner ">
                            <label class="label"
                                htmlfor="grid-password">
                                OB Number 
                            </label>
                            <input type="text"
                                disabled
                                name="ob_number"
                                class="input"
                                value={{ $incidentAssessment->ob_number }} >
                        </div>
                    </div>
                 
            </div>
        </div>
    </div>
</section>