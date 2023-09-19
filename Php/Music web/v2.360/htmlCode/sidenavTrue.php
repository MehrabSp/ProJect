<!-- Sidenav -->
<div id="full-screen-example" class="sidenav sidenav-primary ps ps--active-y" style="width: 240px; height: 100vh; position: fixed; transition: all 0.3s linear 0s; transform: translateX(-100%);">
    <!-- <div class="mode"><div>Dark Mode </div></div> -->
    <div class="mt-4">
        <div id="header-content" class="pl-3">
            <img src="<?php echo base64_encode_image ($image_user); ?>" alt="avatar" class="rounded-circle img-fluid mb-3" style="max-width: 50px; filter: drop-shadow(1px 2px 3px #ffffff47)">

            <h4>
                <?= $name_user ?>
            </h4>
            <p><?= $email_user ?></p>
        </div>
        <hr class="mb-0">
    </div>
    <div>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?user" tabindex="-1"> <i class="fas fa-user pr-3"></i>Profile</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?test" tabindex="-1"> <i class="fas fa-envelope pr-3"></i>Inbox</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?test" tabindex="-1">
                    <i class="fas fa-paper-plane pr-3"></i>Outbox</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?playlist" tabindex="-1"> <i class="fas fa-list pr-3"></i>Play List</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-heart pr-3"></i>Favourites</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-star pr-3"></i>Starred</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-trash pr-3"></i>Trash</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-ban pr-3"></i>Spam</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" data-toggle="collapse" href="/music#sidenav-collapse-1-0-1" role="button" tabindex="-1"><i class="fas fa-tag pr-3"></i>Categories<i class="fas fa-angle-down rotate-icon"></i></a>
                <ul class="sidenav-collapse collapse" id="sidenav-collapse-1-0-1">
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Social</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Notifications</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Recent</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Uploads</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Backups</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link ripple-surface" tabindex="-1">Offers</a>
                    </li>
                </ul>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?channel" tabindex="-1"><i class="fas fa-globe pr-3"></i>Channel</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?upload" tabindex="-1"> <i class="fas fa-upload pr-3"></i>Upload</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?theme" tabindex="-1"> <i class="fas fa-fill-drip pr-3"></i>Theme</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-ellipsis-h pr-3"></i>More</a>
            </li>
        </ul>
        <hr class="m-0">
        <ul class="sidenav-menu">
            <!-- <li class="sidenav-item">
            <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-cogs pr-3"></i>Settings</a>
          </li> -->
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" href="/music?language" tabindex="-1"> <i class="fas fa-language pr-3"></i>Language</a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link ripple-surface" tabindex="-1"> <i class="fas fa-shield-alt pr-3"></i>Privacy</a>
            </li>
        </ul>
    </div>
    <div class="text-center" style="height: 100px;">
        <hr class="mb-4 mt-0">
        <p>MDBootstrap.com</p>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 695px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 425px;"></div>
    </div>
</div>
<!-- Sidenav -->