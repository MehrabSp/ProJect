<section class="h-100 m-1 gradient-custom-2">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div>
      <div class="card">
        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
          <div class="ms-4 d-flex flex-column" style="width: 130px; margin-top: 6rem !important">
            <img src="<?php echo base64_encode_image("data/ch/$username/$ch_image", 'png'); ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2 rounded-circle" style="width: 130px; z-index: 1">
          </div>
          <div class="ms-3" style="margin-top: 130px;">
            <h5><?= $ch_name, " ", $rank ?></h5>
            <ul class="mb-0 list-unstyled d-flex flex-row" style="color: #1B7B2C;">
              <li>
                <i class="fas fa-star fa-xs"></i>
              </li>
              <li>
                <i class="fas fa-star fa-xs"></i>
              </li>
              <li>
                <i class="fas fa-star fa-xs"></i>
              </li>
              <li>
                <i class="fas fa-star fa-xs"></i>
              </li>
              <li>
                <i class="fas fa-star fa-xs"></i>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-4 text-black" style="background-color: #f8f9fa;">
          <div class="d-flex justify-content-end text-center py-1">
            <div>
              <p class="mb-1 h5"><?= $ch_post ?></p>
              <p class="small text-muted mb-0">Post</p>
            </div>
            <div class="px-3">
              <p class="mb-1 h5"><?= $ch_followers ?></p>
              <p class="small text-muted mb-0">Followers</p>
            </div>
            <div>
              <p class="mb-1 h5"><?= $ch_following ?></p>
              <p class="small text-muted mb-0">Following</p>
            </div>
          </div>
          <p class="font-italic mb-0"><?= $ch_bio ?></p>
        </div>
        <div class="card-body p-4 text-black">

          <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab2" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-home2" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-music fa-fw me-2"></i>
                Music
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-video fa-fw me-2"></i>
                Video
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-contact-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-camera fa-fw me-2"></i>
                Photo
              </button>
            </li>
          </ul>

          <section class="pb-4">
            <div class="bg-white border rounded-5">
              <section class="w-100 p-3 pb-3 gallery-view">
                <div class="scrollable-list">
                  <div class="tab-content" id="pills-tabContent2">
                    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                      <ol class="list-group list-group-light list-group-numbered">
                        <?php
                        // Display the rows in a list
                        if (mysqli_num_rows($result) > 0) {
                          $songs = [];
                          while ($row = mysqli_fetch_assoc($result)) {

                            // Fetch the songs data
                            $songs[] = [
                              'id' => (int) $row["id"],
                              'title' => $row["name"] ?? 'none',
                              'artist' => $row["singer"] ?? 'Unknown',
                              'album' => $row["album"],
                              'url' => stripslashes($row["link"]),
                              'cover_art_url' => 'image/pic_main_mobile/24.png'
                              // Add more songs here
                            ];

                            // Return the songs data as JSON
                            // header('Content-Type: application/json');
                          }
                          $songs = json_encode($songs);
                        } else {
                        ?>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">?</div>
                              No Post
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ol>


                      <div class="app-wrapper">
                        <div class="right-area">
                          <div class="page-right-content">
                            <div class="content-line content-line-list">
                              <div class="line-header">
                                <span class="header-text">Trending</span>
                              </div>
                              <div id="owl-slider-2" class="slider-wrapper owl-carousel">
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Minimal Photography</p>
                                    <p class="video-description-subheader">By July</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Puppet Theatre</p>
                                    <p class="video-description-subheader">By July</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Road Trip</p>
                                    <p class="video-description-subheader">By Wallace</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Young Folks</p>
                                    <p class="video-description-subheader">By Peter</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Minimal Photography</p>
                                    <p class="video-description-subheader">By July</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Puppet Theatre</p>
                                    <p class="video-description-subheader">By July</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Road Trip</p>
                                    <p class="video-description-subheader">By Wallace</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>
                                <div class="item video-box-wrapper">
                                  <div class="img-preview">
                                    <img src="image/imgs/Hip-Hop.png" alt="music">
                                  </div>
                                  <div class="video-description-wrapper">
                                    <p class="video-description-header">Young Folks</p>
                                    <p class="video-description-subheader">By Peter</p>
                                    <p class="video-description-info">116K views <span>1 hour ago</span></p>
                                    <button class="btn-play"></button>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="content-line content-line-list">
                              <div class="line-header">
                                <span class="header-text">Public</span>
                              </div>
                              <div id="owl-slider-3" class="slider-wrapper owl-carousel">
                                <template v-for='song in songs'>
                                  <div class="item video-box-wrapper song">
                                    <div class="img-preview">
                                      <img :src="song.cover_art_url" alt="music">
                                    </div>
                                    <div class="video-description-wrapper">
                                      <p class="video-description-header">{{song.title}}</p>
                                      <p class="video-description-subheader">{{song.artist}}</p>
                                      <p class="video-description-info">116K views <span>1 hour ago</span></p>

                                      <button class="btn-pause" v-if="isPlaying && (currentSong.id === song.id )" @click='pause'></button>
                                      <button class="btn-play" @click='play(song)' v-else></button>




                                    </div>
                                  </div>

                                </template>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
                      <ol class="list-group list-group-light list-group-numbered">
                        <?php
                        // Display the rows in a list
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold"><?= $row["singer"] ?></div>
                                <?= $row["name"] ?>
                              </div>
                              <?= $rank ?>
                            </li>
                          <?php
                          }
                        } else {
                          ?>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">?</div>
                              No Post
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ol>
                    </div>
                    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">

                      <!-- Gallery -->
                      <div class="row">
                        <?php
                        $images = glob("data/ch/$channel/post/archive/*.{jpg,png,gif}", GLOB_BRACE); // get all images in directory

                        $i = 0;
                        foreach (array_chunk($images, 2) as $image_pair) { // split images into pairs
                          if ($i == 0) {
                            echo '<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">';
                          } else {
                            echo '<div class="col-lg-4 mb-4 mb-lg-0">';
                          }
                          foreach ($image_pair as $image) {
                            echo '<img
        src="' . $image . '"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Mountains in the Clouds"
      />';
                          }
                          echo '</div>';
                          $i++;
                        }

                        ?>

                      </div>
                      <!-- Gallery -->
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>