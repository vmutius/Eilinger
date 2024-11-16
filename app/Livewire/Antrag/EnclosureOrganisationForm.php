<?php

namespace App\Livewire\Antrag;

use App\Models\Application;
use App\Models\Enclosure;
use App\Rules\FileUploadRule;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Livewire\WithFileUploads;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Illuminate\Support\Facades\Log;

class EnclosureOrganisationForm extends Component
{
    use WithFileUploads;

    public $enclosure;
    public $filePath;
    public $userName;
    public $isInitialAppl;
    public $commercial_register_extract;
    public $statute;
    public $activity;
    public $activity_report;
    public $balance_sheet;
    public $tax_assessment;
    public $cost_receipts;
    public function rules()
    {
        $commercial_register_extract = is_null($this->enclosure->commercial_register_extract) && $this->enclosure->commercialRegisterExtractSendLater == 0;
        $statute = is_null($this->enclosure->statute) && $this->enclosure->statuteSendLater == 0;
        $activity = is_null($this->enclosure->activity) && $this->enclosure->activitySendLater == 0;
        $activity_report = is_null($this->enclosure->activity_report) && $this->enclosure->activityReportSendLater == 0;

        return [
            'enclosure.remark' => 'nullable',
            'commercial_register_extract' => new FileUploadRule($commercial_register_extract),
            'statute' => [new FileUploadRule($statute)],
            'activity' => [new FileUploadRule($activity)],
            'activity_report' => [new FileUploadRule($activity_report)],
            'balance_sheet' => [new FileUploadRule()],
            'tax_assessment' => [new FileUploadRule()],
            'cost_receipts' => [new FileUploadRule()],
            'enclosure.commercialRegisterExtractSendLater' => 'nullable',
            'enclosure.statuteSendLater' => 'nullable',
            'enclosure.activitySendLater' => 'nullable',
            'enclosure.activityReportSendLater' => 'nullable',
            'enclosure.balanceSheetSendLater' => 'nullable',
            'enclosure.taxAssessmentSendLater' => 'nullable',
            'enclosure.costReceiptsSendLater' => 'nullable',
        ];
    }

    public function validationAttributes(): array
    {
        return Lang::get('enclosure');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount(): void
    {
        $user = auth()->user();
        $this->userName = "{$user->lastname}_{$user->firstname}";
        $this->enclosure = Enclosure::where('application_id', session()->get('appl_id'))
            ->first() ?? new Enclosure;
        $this->isInitialAppl = Application::where('id', session()->get('appl_id'))->first(['is_first'])->is_first;
    }

    public function render()
    {
        return view('livewire.antrag.enclosure-organisation-form');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function saveEnclosureOrg(): void
    {
        Log::error('Validation Errors:', $this->getErrorBag()->toArray());

        $this->validate();


        if ($this->commercial_register_extract) {
            $file_commercial_register_extract = $this->upload($this->commercial_register_extract, 'commercial_register_extract');
            $this->enclosure->commercial_register_extract = $file_commercial_register_extract;
            $this->enclosure->commercialRegisterExtractSendLater = false;
        }

        if ($this->statute) {
            $file_statute = $this->upload($this->statute, 'statute');
            $this->enclosure->statute = $file_statute;
            $this->enclosure->statuteSendLater = false;
        }

        if ($this->activity) {
            $file_activity = $this->upload($this->activity, 'activity');
            $this->enclosure->activity = $file_activity;
            $this->enclosure->activitySendLater = false;
        }

        if ($this->activity_report) {
            $file_activity_report = $this->upload($this->activity_report, 'activity_report');
            $this->enclosure->activity_report = $file_activity_report;
            $this->enclosure->activityReportSendLater = false;
        }

        if ($this->balance_sheet) {
            $file_balance_sheet = $this->upload($this->balance_sheet, 'balance_sheet');
            $this->enclosure->balance_sheet = $file_balance_sheet;
            $this->enclosure->balanceSheetSendLater = false;
        }

        if ($this->tax_assessment) {
            $file_tax_assessment = $this->upload($this->tax_assessment, 'tax_assessment');
            $this->enclosure->tax_assessment = $file_tax_assessment;
            $this->enclosure->taxAssessmentSendLater = false;
        }
        if ($this->cost_receipts) {
            $file_cost_receipts = $this->upload($this->cost_receipts, 'cost_receipts');
            $this->enclosure->cost_receipts = $file_cost_receipts;
            $this->enclosure->costReceiptsSendLater = false;
        }

        $this->enclosure->is_draft = false;
        $this->enclosure->application_id = session()->get('appl_id');
        $this->enclosure->save();
        session()->flash('success', __('userNotification.enclosureSaved'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function upload($type, $text)
    {
        if (! is_null($type)) {
            $appl_id = session()->get('appl_id');
            $fileName = 'Appl' . $appl_id . '_' . $text . '.' . $type->getClientOriginalExtension();

            return $type->storeAs($this->userName, $fileName, 's3');
        }
    }
}
