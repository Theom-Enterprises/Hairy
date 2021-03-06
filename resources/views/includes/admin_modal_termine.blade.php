<div class="modal fade" id="termin-modal-{{ $termin->id }}" tabindex="-1" aria-hidden="true">
    <!-- Bearbeitet einen Termin beim Formular Submit -->
    <form action="{{ route('termin.edit', ['id' => $termin->id]) }}" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Termin
                        bearbeiten
                        / stornieren</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="datum"
                               class="form-label">Datum</label>
                        <input type="date" class="form-control"
                               id="datum" name="datum"
                               placeholder="yyyy-mm-dd"
                               min="1997-01-01"
                               max="2030-12-31"
                               value="{{ $termin->datum }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="von"
                               class="form-label">Von</label>
                        <input type="time" class="form-control"
                               id="von"
                               name="von" value="{{ $termin->von }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="bis"
                               class="form-label">Bis</label>
                        <input type="time" class="form-control"
                               id="bis"
                               name="bis" value="{{ $termin->bis }}"
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn"
                            data-bs-dismiss="modal">
                        Schlie??en
                    </button>
                    <!-- L??scht den Termin -->
                    <button type="submit" formaction="{{ route('termin.delete', ['id' => $termin->id]) }}"
                            class="btn-hairy-danger">
                        L??schen
                    </button>
                    <button type="submit" class="btn-hairy-primary">
                        Speichern
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
