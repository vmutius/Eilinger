<form wire:submit.prevent="Step4EducationSubmit">
    <div class="content-header mb-3">
        <h3 class="mb-0">Ausbildung</h3>
        <small>für welche Beiträge verlangt werden</small>

    </div>
    <div class="row g-3">
        <div class="col-sm-6">
            <label class="form-label" for="education">Ausbildung</label>
            <select wire:model.lazy="education.education" id="education" name="education" class="form-select">
                <option value="">-- Wählen Sie eine Option --</option>
                @foreach (App\Models\Education::EDUCATION as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="name">Bezeichnung und Ort der Ausbildungsstätte</label>
            <input wire:model.lazy="education.name" type="text" id="name" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="final">beabsichtigter Abschluss als</label>
            <input wire:model.lazy="education.final" type="text" id="final" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="grade">Abschluss</label>
            <select wire:model.lazy="education.grade" id="grade" name="grade" class="form-select">
                <option value="">-- Wählen Sie eine Option --</option>
                @foreach (App\Models\Education::GRADE as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="ects-points">ECTS-Punkte für das kommende Semester gemäss Beleg</label>
            <input wire:model.lazy="education.ects-points" type="text" id="ects-points" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="time">Pensum</label>
            <select wire:model.lazy="education.time" id="time" name="time" class="form-select">
                <option value="">-- Wählen Sie eine Option --</option>
                @foreach (App\Models\Education::TIME as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="col-md-12 text-center">        
            <button type="submit"  class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">Zwischenspeichern</span>
            </button>
        </div>
    </div>
</form>
