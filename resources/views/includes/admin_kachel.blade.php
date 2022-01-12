<div id="termine" class="container kachelansicht">
    <div class="row">
        <!-- Iteriert durch den Termine Array -->
    @foreach($termine as $termin)
        <!-- Überprüft ob der User kein Admin ist und ob der Angestellte, welcher dem Termin zugeordnet wurde, der User ist-->
            @if($employee->ist_admin === 'false' && $termin->nachname === $employee->lastname && $termin->vorname === $employee->firstname)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"><i class="bi bi-person-fill"></i></div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">{{"$termin->firstname $termin->lastname"}}</h6>
                                    <span>#{{ $termin->id }}</span>
                                </div>
                            </div>
                            @include('includes.admin_datum')
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">{{ $termin->bezeichnung }}
                                <br>{{ "$termin->von - $termin->bis" }}</h3>
                            <div class="mt-5">
                                <div class="mt-3"><span class="special-text">Zugeteilt: <span
                                                class="special-bold-text">{{ "$termin->vorname $termin->nachname" }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($employee->ist_admin === 'true')
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"><i class="bi bi-person-fill"></i></div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">{{"$termin->firstname $termin->lastname"}}</h6>
                                    <span>#{{ $termin->id }}</span>
                                </div>
                            </div>
                            @include('includes.admin_datum')
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">{{ $termin->bezeichnung }}
                                <br>{{ "$termin->von - $termin->bis" }}</h3>
                            <div class="mt-5">
                                <button type="button" class="btn-modal float-end"
                                        data-bs-toggle="modal" data-bs-target="#termin-modal">
                                    Bearbeiten
                                </button>
                                @include('includes.admin_modal_termine')
                                <div class="mt-3"><span class="special-text">Zugeteilt: <span
                                                class="special-bold-text">{{ "$termin->vorname $termin->nachname" }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
