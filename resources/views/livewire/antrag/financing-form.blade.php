<form wire:submit="saveFinancing">
    @csrf
    <div class="content-header mb-3">
        <h3 class="mb-0">{{ __('financing.title') }}</h3>
        <div class="d-flex justify-content-between">
            <div>
                <small>{{ __('financing.subTitle') }}</small>
            </div>
        </div>
    </div>
    <div class="row g-3">

        <x-notification />

        <div class="col-sm-4">
            <label class="form-label" for="personal_contribution">{{ __('financing.personal_contribution') }}</label>
            <input wire:model.blur="financing.personal_contribution" type="number" class="form-control" />
            <span class="text-danger">
                @error('financing.personal_contribution')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="netto_income">{{ __('financing.netto_income') }}</label>
            <input wire:model.blur="financing.netto_income" type="number" class="form-control" />
            <span class="text-danger">
                @error('financing.netto_income')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="assets">{{ __('financing.assets') }} </label>
            <input wire:model.blur="financing.assets" type="number" class="form-control" />
            <span class="text-danger">
                @error('financing.assets')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="scholarship">{{ __('financing.scholarship') }}</label>
            <input wire:model.blur="financing.scholarship" type="number" class="form-control" />
            <span class="text-danger">
                @error('financing.scholarship')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <h4 class="mb-0">{{ __('financing.other') }}</h4>
        <div class="col-sm-4">
            <label class="form-label" for="other_income">{{ __('financing.other_income') }}</label>
            <input wire:model.blur="financing.other_income" type="number" class="form-control" />
            <span class="text-danger">
                @error('financing.other_income')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="income_where">{{ __('financing.income_where') }} </label>
            <input wire:model.blur="financing.income_where" type="text" class="form-control" />
            <span class="text-danger">
                @error('financing.income_where')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="incomeWho">{{ __('financing.incomeWho') }}</label>
            <input wire:model.blur="financing.income_who" type="text" class="form-control" />
            <span class="text-danger">
                @error('financing.income_who')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <hr class="border border-dark opacity-50">
        <div class="col-sm-12 text-end">
            <p>{{ __('financing.total') }} @convert($this->getAmountFinancing(), $this->myCurrency->abbreviation)
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none">{{ __('attributes.save') }}</span>
            </button>
        </div>
    </div>
</form>
