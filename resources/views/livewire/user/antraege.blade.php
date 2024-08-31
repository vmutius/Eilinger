<section class="home-section">
    <h2>{{  __('application.applications')  }}</h2>

    <div class="home-content">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-colour-1  btn-next pull-right" wire:click="addApplication()">{{  __('application.newApplication')  }}</button>
                </div>
            </div>
            <hr class="border border-dark opacity-50">
            <x-notification/>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{  __('application.application')  }}</th>
                        <th>{{  __('application.bereich')  }}</th>
                        <th>{{  __('application.form')  }}</th>
                        <th>{{  __('application.createdAt')  }}</th>
                        <th>{{  __('application.updatedAt')  }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->name }}</td>
                            <td>{{ __('application.bereichs_name.' .$application->bereich->name) }}</td>
                            <td>{{ __('application.form_name.' .$application->form->name) }}</td>
                            <td>{{ $application->created_at ? $application->created_at->format('d.m.Y H:i') : null }}</td>
                            <td>{{ $application->updated_at ? $application->updated_at->format('d.m.Y H:i') : null }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('user_antrag', ['application_id' => $application->id, 'locale'=> app()->getLocale()]) }}">{{  __('attributes.edit')  }}</a>
                                <a class="btn btn-sm btn-danger" wire:click="deleteApplication({{ $application->id }})">{{  __('attributes.delete')  }}</a>
                                <a class="btn btn-sm btn-success" href="{{ route('user_nachricht', ['application_id' => $application->id, 'locale'=> app()->getLocale()]) }}">{{  __('attributes.showMessages')  }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{  __('application.no_applications')  }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>

        <div class="modal" @if ($showModal) style="display:block" @endif>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form wire:submit="save">
                        <div class="modal-header">
                            <h5 class="modal-title">{{  __('application.newApplication')  }}</h5>
                            <button wire:click="close" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{  __('application.name')  }}*:
                            <br />
                            <input wire:model.live="name" type="text" class="form-control" />
                            @error('name')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            {{  __('application.bereich')  }}*
                            <br />

                            <select wire:model.blur="bereich" class="form-select" wire:change="updateBereich($event.target.value)">
                                <option selected value="">{{  __('attributes.please_select')  }}</option>
                                @foreach (App\Enums\Bereich::cases() as $bereich)
                                    <option value="{{ $bereich }}">{{ __('application.bereichs_name.' .$bereich->name) }}</option>
                                @endforeach
                            </select>
                            @error('bereich')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror

                            <br />
                            {{  __('application.desiredForm')  }}*:
                            <br />

                            <select wire:model.blur="form" class="form-select">
                                <option selected value="">{{  __('attributes.please_select')  }}</option>
                                @foreach ( $this->formOptions  as $form)
                                    <option value="{{ $form }}">{{ __('application.form_name.' .$form) }}</option>
                                @endforeach
                            </select>

                            @error('form')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror

                            <br />
                            {{  __('application.desiredCurrency')  }}*:
                            <br />
                            <select wire:model.blur="currency_id" class="form-select">
                                <option selected value="">{{  __('attributes.please_select')  }}</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->currency }}</option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            {{  __('application.startDate')  }}*:
                            <br />
                            <input wire:model.live="start_appl" type="date"  class="form-control" />
                            @error('start_appl')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            {{  __('application.endDate')  }}:
                            <br />
                            <input wire:model.live="end_appl" type="date" class="form-control" />
                            @error('end_appl')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">{{  __('application.firstAppl')  }}
                                    <input wire:model.blur="is_first" class="form-check-input" type="radio" value = "1">
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">{{  __('application.followAppl')  }}
                                    <input wire:model.blur="is_first" class="form-check-input" type="radio" value = "0">
                                </label>
                            </div>
                            @error('is_first')
                                <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                            @enderror
                            <br />
                            @if ($this->visible)
                                {{  __('application.firstAppl')  }}:
                                <br />
                                <select wire:model.blur="main_appl_id" class="form-select">
                                    <option selected value="">{{  __('attributes.please_select')  }}</option>
                                    @foreach ($first_applications as $first_application)
                                        <option value="{{ $first_application->id }}">{{ $first_application->name }}</option>
                                    @endforeach
                                </select>
                                @error('first_applications')
                                    <div style="font-size: 0.75rem; color: red">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{  __('attributes.save')  }}</button>
                            <button wire:click="close" type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{  __('attributes.close')  }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
