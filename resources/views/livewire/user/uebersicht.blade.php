<section class="home-section">
    <div class="text">Willkommen im Portal der Eilinger Stiftung</div>

    <div class="home-content">
        <div class="shadow p-3 mb-5 bg-body rounded">


            <section class="bg-light pt-5 pb-5 shadow-sm">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-12">
                            <h3 class="text-uppercase border-bottom mb-4">Übersicht</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Anträge / Neuen Antrag stellen</h5>
                                <div class="card-body">
                                    <p class="card-text">Für die Erstellung eines neuen Antrags klicken Sie den Link
                                        oder gehen Sie
                                        über das Menu auf der linken Seite. Hier können Sie auch die noch nicht
                                        eingereichten Anträge sehen und diese weiter bearbeiten.</p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('user_antraege', app()->getLocale()) }}" class="btn btn-colour-1">Anträge</a> 
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Gesuche</h5>
                                <div class="card-body">
                                    <p class="card-text">Alle Anträge, die Sie bereits eingesendet haben, finden Sie hier.</p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('user_gesuch', app()->getLocale()) }}" class="btn btn-colour-1">Gesuche</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Nachrichten</h5>
                                <div class="card-body">
                                    <p class="card-text">Falls es Nachrichten zu Ihren eingesendeten Anträgen gibt,
                                        finden Sie diese hier.
                                    </p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('user_nachrichten', app()->getLocale()) }}" class="btn btn-colour-1">Nachrichten</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Profil</h5>
                                <div class="card-body">
                                    <p class="card-text">Ihr Benutzerprofile können Sie unten dem unten angehängten Link
                                        bearbeiten. Ihre Email Adresse und Ihr Password können Sie ebenfalls hier anpassen. Bei
                                        Änderung der Email Adresse müssen Sie diese erneut verifizieren.
                                    </p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('user_profile.edit', app()->getLocale()) }}" class="btn btn-colour-1">Benutzerprofil</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Dateien</h5>
                                <div class="card-body">
                                    <p class="card-text">Dateien für Anträge oder laufende Projekte können Sie hier anhängen</p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('user_dateien', app()->getLocale()) }}" class="btn btn-colour-1">Dateien</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <h5 class="card-header">Logout</h5>
                                <div class="card-body">
                                    <p class="card-text">Den Link zum Logout finden Sie unter Ihren Benutzernamen oben
                                        rechts
                                        oder Sie klicken den angehängten Link</p>
                                </div>
                                <div class="card-footer p-3">
                                    <a href="{{ route('logout', app()->getLocale()) }}" class="btn btn-colour-1">Logout</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
