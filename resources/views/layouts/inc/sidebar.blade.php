<div class="sidebar">
  <div class="logo py-2 bg-black"><a href="#" class="d-block text-center">
      {{-- <img class="logo-image" src="{{ asset('site/img/logo.png') }}" alt="Ecommerce Shop"> --}}
      <h6>Iinkkify IT</h6>
    </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item {{ Request::is('dashboard') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="nav-item {{ Request::is('all_category') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('all_category') }}">
          <i class="material-icons">dashboard</i>
          <p>All BlogCategory</p>
        </a>
      </li>

      <li class="nav-item {{ Request::is('all_blog') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('all_blog') }}">
          <i class="material-icons">dashboard</i>
          <p>All Blog</p>
        </a>
      </li>

      <li class="nav-item {{ Request::is('all_portfolio') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('all_portfolio') }}">
          <i class="material-icons">dashboard</i>
          <p>All Portfolio</p>
        </a>
      </li>

      <li class="nav-item {{ Request::is('contact') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('contact') }}">
          <i class="material-icons">dashboard</i>
          <p>Contact</p>
        </a>
      </li>

      <li class="nav-item dropdown border-top d-lg-none">
        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="material-icons">person</i>
          <p>
            Account
          </p>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
          <a class="dropdown-item my-0" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</div>


      {{-- <li class="nav-item {{ Request::is('add_category') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('add_category') }}">
          <i class="material-icons">dashboard</i>
          <p>Add BlogCategory</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item {{ Request::is('add_blog') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('add_blog') }}">
          <i class="material-icons">dashboard</i>
          <p>Add Blog</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item {{ Request::is('add_portfolio') ? 'active':''}} ">
        <a class="nav-link" href="{{ route('add_portfolio') }}">
          <i class="material-icons">dashboard</i>
          <p>Add Portfolio</p>
        </a>
      </li> --}}