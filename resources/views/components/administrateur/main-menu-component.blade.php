 <!--------------------
        START - Main Menu
        -------------------->
        <div class="dont-print menu-w selected-menu-color-light menu-activated-on-hover menu-has-selected-link color-scheme-dark color-style-bright sub-menu-color-bright menu-position-side menu-side-left menu-layout-compact sub-menu-style-over">
            <div class="logo-w ">
              <a class="logo " href="{{ route('administrateur./') }}">
                <div class="logo-element"></div>
                <div class="logo-label">
                  LOI0621 <span style="color: transparent">Administrateur</span>
                </div>
              </a>
            </div>
            <div class="logged-user-w avatar-inline">
              <div class="logged-user-i">
                <div class="avatar-w">
                  <div>
                    {{ auth()->user()->initialname }}
                  </div>
                  {{-- <img alt="{{ auth()->user()->username }}" src="{{ asset('assets/admin/img/mental-health.svg') }}"> --}}
                </div>
                <div class="logged-user-info-w">
                  <div class="logged-user-name">
                    {{ auth()->user()->username }}
                  </div>
                  <div class="logged-user-role">
                    {{ auth()->user()->role }}
                  </div>
                </div>
                <div class="logged-user-toggler-arrow">
                  <div class="os-icon os-icon-chevron-down"></div>
                </div>
                <div class="logged-user-menu color-style-bright">
                  <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                      <div>
                        {{ strtoupper(substr(auth()->user()->nom,0,1)) }} {{ strtoupper(substr(auth()->user()->prenom,0,1)) }}
                      </div>
                      {{-- <img alt="{{ auth()->user()->username }}" src="{{ asset('assets/admin/img/mental-health.svg') }}"> --}}
                    </div>
                    <div class="logged-user-info-w">
                      <div class="logged-user-name">
                          {{ auth()->user()->nom }}
                      </div>
                      <div class="logged-user-role">
                          {{ auth()->user()->prenom }}
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="{{route('administrateur./')}}"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile</span></a>
                    </li>
                    <li>
                      <a  href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                           <i class="os-icon os-icon-signs-11"></i><span>Déconnecter</span>
                      </a>
  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            {{-- <div class="menu-actions">
              <!--------------------
              START - Settings Link in secondary top menu
              -------------------->
              <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
                <i class="os-icon os-icon-ui-46"></i>
                <div class="os-dropdown">
                  <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <!--------------------
              END - Settings Link in secondary top menu
              -------------------->
            </div>--}}
  
  
  
            {{-- <div class="element-search autosuggest-search-activator">
              <input placeholder="Start typing to search..." type="text">
            </div> --}}
  
  
  
            <h1 class="menu-page-header">
              Page Header
            </h1>
            <ul class="main-menu">
              <li class="sub-header">
                <span>Admin</span>
              </li>
              <li class="selected has-sub-menu">
                <li class="">
                  <a href="{{ route('administrateur./') }}">
                    <div class="icon-w">
                      <i class="ti-dashboard"></i>
                    </div>
                    <span>Tableau de board</span></a>
                </li>
                <li class="">
                  <a href="{{ route('administrateur.statistique') }}">
                    <div class="icon-w">
                      <i class="ti-stats-up"></i>
                    </div>
                    <span>Statistique</span></a>
                </li>
                
                <li class="">
                  <a href="{{ route('administrateur.tickets') }}">
                    <div class="icon-w">
                      <i class="picons-thin-icon-thin-0106_clipboard_box_archive_documents"></i>
                    </div>
                    <span>Gestion des Tickets</span></a>
                </li>
              </li>
              
              <li class="">
                <a href="{{ route('administrateur.employeurs./') }}">
                  <div class="icon-w">
                    <i class="ti-user"></i>
                  </div>
                  <span>Employeurs</span></a>
              </li>
              <li class="sub-header">
                  <span>Dossier</span>
                </li>
                <li class="">
                  <a href="{{ route('administrateur.subventions./') }}">
                    <div class="icon-w">
                      <i class="picons-thin-icon-thin-0118_folder_open"></i>
                    </div>
                    <span>Subvention</span></a>
                </li>
                <li class="">
                  <a href="{{ route('administrateur.formations./') }}">
                    <div class="icon-w">
                      <i class="picons-thin-icon-thin-0118_folder_open"></i>
                    </div>
                    <span>Formation</span></a>
                </li>
              <li class="sub-header">
                <span>Parametre</span>
              </li>
              <li class=" has-sub-menu">
                <a href="javascript:void(0)">
                  <div class="icon-w">
                    <div class="os-icon os-icon-settings"></div>
                  </div>
                  <span>Applications</span></a>
                <div class="sub-menu-w">
                  <div class="sub-menu-header">
                    Applications
                  </div>
                  <div class="sub-menu-icon">
                    <i class="os-icon os-icon-settings"></i>
                  </div>
                  <div class="sub-menu-i">
                    <ul class="sub-menu">
                      <li>
                        <a href="{{ route('administrateur.reglage') }}">Réglage</a>
                      </li>
                      @can('view-any', App\Models\Administrateur::class)
                      <li>
                        <a href="{{ route('administrateur.utilsateurs') }}">Utilisateurs</a>
                      </li>
                      @endcan
                      <li>
                        <a href="{{ route('administrateur.wilayas') }}">Wilayas</a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">Communes</a>
                      </li>
                      </ul>
                      <ul class="sub-menu">
                      <li>
                        <a href="{{ route('administrateur.branches') }}">Branches</a>
                      </li>
                      <li>
                        <a href="{{ route('administrateur.statuJuridique') }}">Status juridique</a>
                      </li>
                      <li>
                        <a href="{{ route('administrateur.roles') }}">Roles</a>
                      </li>
                      <li>
                        <a href="{{ route('administrateur.stepers') }}">Steper</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
            
            <hr />
            <div class="side-menu-magic">
              <h4>
                Guide d'utilisation
              </h4>
              <p>
                Page en maintenance
              </p>
              <div class="btn-w">
                <a class="btn btn-white btn-rounded" href="{{ route('administrateur.guide') }}" target="_blank">Lire Plus</a>
              </div>
            </div>
          </div>
          <!--------------------
          END - Main Menu
          -------------------->