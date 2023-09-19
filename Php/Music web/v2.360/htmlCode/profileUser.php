<section>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="<?php echo base64_encode_image ($image_user); ?>" id="userimage_preview" alt="avatar" class="rounded-circle img-fluid shadow-2" style="width: 150px;">
                        <h5 class="my-1"><?= $name_user ?></h5>
                        <?php
                        if ($rank_user) {
                            $parts = explode(", ", $rank_user);

                            foreach ($parts as $part) {
                                $values = explode("-", $part);
                                $class = "badge badge-" . $values[0];
                                $label = $values[1];
                                echo "<span class=\"$class\">$label</span>\n";
                            }
                        }
                        ?>
                        <p class="text-muted mt-1 mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="user_file">Choose file</label>
                                <input type="file" class="form-control d-none" accept="image/*" id="user_file" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                <p class="mb-0">#</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0">Quick</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">@Quick</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                <p class="mb-0">Quick</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">Quick</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Your Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$name_user?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?=$hidden_email?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Channel</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <a href="<?= $channel ?>"><?= "@" . $channel ?></a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Image</p>
                            </div>
                            <div class="col-sm-9">
                                <p><?=$img_tr?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Your activity
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Channel</span> for Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Music</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Photo</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Video</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Theme</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Views</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="h-auto">
            <div class="container py-3 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                  <div class="card" id="list1" style="border-radius: .75rem; background-color: var(--list-color);">
                    <div class="py-4" style="justify-items: center; display: grid">

                      <div id="cassette">
                        <a href="?"><img src="image/Quick-Music.png" alt="Image 1" class="rotate img-cassette"></a>
                        <a href="ms.php">
                          <h1 style="font-size: large; position: absolute; bottom: 8px; left: 118px">QUICK</h1>
                        </a>
                        <i class="fas fa-exclamation fa-4x" style="position: absolute; left: -31px; top: 2px;"></i>
                      </div>

                      <h5 class="pt-5">The desired USER was Not Found</h5>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section> -->