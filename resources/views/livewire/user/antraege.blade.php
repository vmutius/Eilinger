<section class="home-section">
    <div class="text">Anträge</div>

    <div class="home-content">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-colour-1  btn-next pull-right" wire:click="addApplication()">Neuen Antrag
                        erstellen</button>
                </div>
            </div>
            <hr />
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Antrag</th>
                        <th>Bereich</th>
                        <th>Erstellt</th>
                        <th>Zuletzt Geändert</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->bereich }}</td>
                            <td>{{ $application->created_at }}</td>
                            <td>{{ $application->updated_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('user_antrag', $application->id) }}">Bearbeiten</a>
                                <a class="btn btn-sm btn-danger" wire:click="deleteApplication()">Löschen</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Keine Anträge gefunden</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal" @if ($showModal) style="display:block" @endif>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form wire:submit.prevent="save">
                        <div class="modal-header">
                            <h5 class="modal-title">Neuen Antrag erstellen</h5>
                            <button wire:click="close" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Name:
                            <br />
                            <input wire:model="name" class="form-control" />
                            @error('name')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            Bereich:
                            <br />  
                            <select wire:model.lazy="bereich" class="form-select">
                                <option disabled>Bitte auswählen...</option>
                                @foreach (App\Models\APPLICATION::BEREICH as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('bereich')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Speichern</button>
                            <button wire:click="close" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>