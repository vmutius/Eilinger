<section class="home-section">
    <h2>{{ __('message.messageRequest') }} {{ $application->name }} ({{__('application.area')}}: {{ $application->bereich }})</h2>
    <div class="content">
        <div class="shadow p-3 mb-5 bg-body rounded">
            @livewire('messages-section', ['application' => $application])
        </div>
    </div>
</section>
