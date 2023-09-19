<!-- Navbar brand -->
<a class="dropdown-toggle d-flex align-items-center hidden-arrow" style="color: inherit;
cursor: pointer" id="toggler" data-toggle="sidenav" y="" data-target="#full-screen-example" aria-expanded="false">
    <i class="fas fa-bars fa-lg"></i>
</a>
<!-- Right links -->
<!-- Right elements -->
<div class="d-flex align-items-center">
    <!-- Icon -->
    <a class="link-secondary me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
    </a>

    <!-- Notifications -->
    <div class="dropdown">
        <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
                <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Something else here</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav">
        <!-- Avatar -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo base64_encode_image ($image_user); ?>" class="rounded-circle" height="22" alt="Portrait of a Woman" loading="lazy" />
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="/music?user">My profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/music?logout">Logout</a>
                </li>
            </ul>
        </li>
    </ul>

</div>
<!-- navbar -->