<div class="accordion-item">
    <h2 class="accordion-header" id="headingFinancing">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
            data-bs-target="#collapseFinancing">{{ __('financing.title') }}
        </button>
    </h2>
    <div id="collapseFinancing" class="accordion-collapse collapse">
        @if ($financing)
            <div class="card-body">
                <div class=row>
                    <x-convert-money :amount="$financing->personal_contribution" :text="__('financing.personal_contribution')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$financing->netto_income" :text="__('financing.netto_income')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$financing->assets" :text="__('financing.assets')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$financing->scholarship" :text="__('financing.scholarship')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$financing->other_income" :text="__('financing.other_income')" :currency="$application->currency->abbreviation" />

                    <div class="col-sm-4">
                        <p>{{ __('financing.income_where') }}: {{ $financing->income_where }}</p>
                    </div>
                    <div class="col-sm-4">
                        <p>{{ __('financing.incomeWho') }}: {{ $financing->incomeWho }}</p>
                    </div>

                    <div class="col-12 text-end">
                        <p>{{ __('financing.total') }} @convert($financing->total_amount_financing, $application->currency->abbreviation) </p>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class=row>
                    <div class="col-sm-12">
                        <p>Keine Finanzierungsdaten eingetragen</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
