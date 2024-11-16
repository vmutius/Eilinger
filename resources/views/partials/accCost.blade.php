<div class="accordion-item">
    <h2 class="accordion-header" id="headingCost">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
            data-bs-target="#collapseCost">{{ __('cost.cost') }}
        </button>
    </h2>
    <div id="collapseCost" class="accordion-collapse collapse">
        @if ($cost)
            <div class="card-body">
                <div class=row>
                    <x-convert-money :amount="$cost->semester_fees" :text="__('cost.semester_fees')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->fees" :text="__('cost.fees')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->educational_material" :text="__('cost.educational_material')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->excursion" :text="__('cost.excursion')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->travel_expenses" :text="__('cost.travel_expenses')" :currency="$application->currency->abbreviation" />
                    <div class="col-sm-4">
                        <p>{{ __('cost.number_of_children') }}: {{ $cost->number_of_children }}</p>
                    </div>

                    <h5 class="ms-2 mt-4">{{ __('cost.other_standard_of_living') }}</h5>
                    <x-convert-money :amount="$cost->cost_of_living_with_parents" :text="__('cost.cost_of_living_with_parents')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->cost_of_living_alone" :text="__('cost.cost_of_living_alone')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->cost_of_living_single_parent" :text="__('cost.cost_of_living_single_parent')" :currency="$application->currency->abbreviation" />
                    <x-convert-money :amount="$cost->cost_of_living_with_partner" :text="__('cost.cost_of_living_with_partner')" :currency="$application->currency->abbreviation" />

                    <div class="col-12 text-end">
                        <p>{{ __('cost.totalCosts') }}: @convert($cost->total_amount_costs, $application->currency->abbreviation) </p>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class=row>
                    <div class="col-sm-12">
                        <p>{{ __('cost.noCost') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
