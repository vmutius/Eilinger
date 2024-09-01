<div class="accordion-item">
    <h2 class="accordion-header" id="headingACostDarlehen">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
            data-bs-target="#collapseCostDarlehen">Kosten
        </button>
    </h2>
    <div id="collapseCostDarlehen" class="accordion-collapse collapse">
        @if ($costDarlehen)
            <div class="card-body">
                <div class=row>
                    @foreach ($costDarlehen as $cost)
                        <div class="col-sm-6">
                            <p>{{ __('cost.cost_name') }}: {{ $cost->cost_name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>{{ __('cost.cost_amount') }}: @convert($cost->cost_amount, $application->currency->abbreviation) </p>
                        </div>
                    @endforeach
                    <div class="col-12 text-end">
                        <p>{{ __('cost.totalCosts') }} @convert($this->getTotalCostDarlehen(), $application->currency->abbreviation)</p>
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
