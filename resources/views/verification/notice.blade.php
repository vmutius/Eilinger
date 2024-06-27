<x-layout.eilinger>
    @section('title', 'Bestätigung')

    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>{{__('notice.verify')}}</h2>
                    <p>{{__('notice.verify_line1')}}</p>
                    <p>{{__('notice.verify_line2')}}</p>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('verification.send', app()->getLocale()) }}">
                            @csrf

                            <div>
                                <button type="submit" class="btn btn-colour-1"> {{ __('notice.verify_resend') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <button class="btn btn-colour-1">
                                <a class="nav-link" href="{{ route('logout', app()->getLocale()) }}">Logout</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-layout.eilinger>
