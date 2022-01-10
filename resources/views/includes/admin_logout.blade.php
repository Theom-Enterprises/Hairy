<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::guard('employee')->user()->vorname }}
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.logout') }}">
        {{ __('Logout') }}
        </a>
    </div>
</li>