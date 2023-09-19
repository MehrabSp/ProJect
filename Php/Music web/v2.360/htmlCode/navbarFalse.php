<!-- Navbar brand -->
<a class="navbar-brand me-2" href="/music?">
    <img src="<?php echo base64_encode_image ("image/Quick-dark.png",'png'); ?>" height="36" alt="Quick Logo" loading="lazy" style="margin-top: -1px;" />
</a>
<!-- Left links -->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="/music#">Quick</a>
    </li>
</ul>
<i class="flag flag-united-kingdom"></i>
<!-- Right elements -->
<div class="d-flex align-items-center">
    <button type="button" id="btn-toggle-mrb" class="btn btn-link px-3 me-2" data-mdb-toggle="modal" data-mdb-target="#myModal" onclick="regtr('lg')">
        Login
    </button>
    <button type="button" class="btn btn-primary me-3" data-mdb-toggle="modal" data-mdb-target="#myModal" onclick="regtr('rg')">
        Sign up for free
    </button>
    <a class="btn btn-dark px-3" href="#google_kit" role="button"><i class="fab fa-google"></i></a>
</div>
<!-- navbar -->