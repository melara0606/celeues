<header id="navbar" >
  <div id="navbar-container" class="boxed">
      <div class="navbar-header">
          <a href="#" class="navbar-brand">
            <img src="{{ asset("img/logo.png") }}" alt="Nifty Logo" class="brand-icon">
            <div class="brand-title">
                <span class="brand-text">CELEUES</span>
            </div>
          </a>
      </div>
      <div class="navbar-content">
          <ul class="nav navbar-top-links">
              <li class="tgl-menu-btn">
                  <a class="mainnav-toggle" href="#">
                      <i class="demo-pli-list-view"></i>
                  </a>
              </li>
              <li>
                  <div class="custom-search-form">
                      <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                          <i class="demo-pli-magnifi-glass"></i>
                      </label>
                      <form>
                          <div class="search-container collapse" id="nav-searchbox">
                            <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                          </div>
                      </form>
                  </div>
              </li>

          </ul>
          <ul class="nav navbar-top-links">                       
              <li id="dropdown-user" class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                      <span class="ic-user pull-right">
                        <i class="demo-pli-male"></i>
                      </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                      <ul class="head-list">
                          <li>
                              <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                          </li>
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                              <i class="demo-pli-unlock icon-lg icon-fw"></i>    Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</header>