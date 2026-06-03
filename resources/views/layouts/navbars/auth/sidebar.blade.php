@if(Auth::user()->role == 'admin')

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">

    {{-- HEADER --}}
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

        <a class="align-items-center d-flex m-0 navbar-brand text-wrap"
            href="{{ route('admin.dashboard') }}">

            <img src="{{ asset('assets/img/logo-ct.png') }}"
                class="navbar-brand-img h-100"
                alt="logo">

            <span class="ms-3 font-weight-bold">
                Soft UI Dashboard Laravel
            </span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">

        <ul class="navbar-nav">

            {{-- DASHBOARD --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-home text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{-- MANAJEMEN KURSUS --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Manajemen Kursus
                </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/materi') ? 'active' : '' }}"
                    href="{{ route('materi.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Materi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/paket*') ? 'active' : '' }}"
                    href="{{ route('paket.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Paket</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link 
                {{ 
                    Request::is('admin/kursus') || 
                    Request::is('admin/kursus/create') || 
                    Request::is('admin/kursus/edit/*') 
                    ? 'active' : '' 
                }}"
                href="{{ route('kursus.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-graduation-cap text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Kursus</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/kursus/jadwal') ? 'active' : '' }}"
                    href="{{ route('kursus.jadwal') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Jadwal</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/ulasan*') ? 'active' : '' }}"
                    href="{{ route('admin.ulasan.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-star text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Ulasan</span>
                </a>
            </li>

            {{-- MANAJEMEN RESERVASI --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Manajemen Reservasi
                </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/reservasi*') ? 'active' : '' }}"
                    href="{{ route('reservasi.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-address-book text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Reservasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pembayaran*') ? 'active' : '' }}"
                    href="{{ route('admin.pembayaran.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-money-bill text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Pembayaran</span>
                </a>
            </li>

            {{-- MANAJEMEN USER --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Manajemen User
                </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/profile-instruktur*') ? 'active' : '' }}"
                    href="{{ route('instruktur.index') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chalkboard-teacher text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">
                        Profile Instruktur
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}"
                    href="{{ url('admin') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-shield text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}"
                    href="{{ url('user') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>

            {{-- ACCOUNT --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Account
                </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}"
                    href="{{ url('profile') }}">

                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-circle text-dark"></i>
                    </div>

                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

            {{-- LOGOUT --}}
            <li class="nav-item">
              <form method="POST"
                  action="{{ route('admin.logout') }}"
                  class="m-0 p-0">
                  @csrf
                  <button type="submit"
                      class="nav-link border-0 bg-transparent w-100 text-start d-flex align-items-center">

                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fas fa-sign-out-alt text-dark"></i>
                      </div>

                      <span class="nav-link-text ms-1">
                          Logout
                      </span>

                  </button>

              </form>

          </li>

        </ul>
    </div>

    {{-- FOOTER --}}
    <div class="sidenav-footer mx-3">
        <div class="card card-background shadow-none card-background-mask-secondary"
            id="sidenavCard">

            <div class="full-background"
                style="background-image: url('../assets/img/curved-images/white-curved.jpeg')">
            </div>

            <div class="card-body text-start p-3 w-100">

                <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="ni ni-diamond text-dark text-gradient text-lg top-0"></i>
                </div>

                <div class="docs-info">
                    <h6 class="text-white mb-0">Need help?</h6>

                    <p class="text-xs font-weight-bold">
                        Please check our docs
                    </p>

                    <a href="/documentation/getting-started/overview.html"
                        target="_blank"
                        class="btn btn-white btn-sm w-100 mb-0">

                        Documentation
                    </a>
                </div>

            </div>
        </div>
    </div>

</aside>

@endif