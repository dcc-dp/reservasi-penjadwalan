<nav class="instruktur-navbar">
    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h5 class="instruktur-page-title">
                @yield('title', 'Instruktur')
            </h5>
        </div>

        <div class="d-flex align-items-center gap-4">
            <span class="instruktur-badge">
                INSTRUKTUR
            </span>

            <div class="instruktur-user-box">
                <div class="instruktur-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'I', 0, 1)) }}
                </div>

                <div>
                    <div class="instruktur-user-name">
                        {{ auth()->user()->name ?? 'Instruktur' }}
                    </div>
                    <div class="instruktur-user-role">
                        Pengajar
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>