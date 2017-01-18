<nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('contact-us') ? 'active' : '' }}" href="/contact-us">Contact us</a>
        </li>
    </ul>
</nav>