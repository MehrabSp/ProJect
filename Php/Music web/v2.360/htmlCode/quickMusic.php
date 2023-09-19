<!-- First table for Music -->
<div class="row">
    <div class="col-md-12">
        <!-- Scrollable list for Music -->
        <section id="subsection-headings">
            <section class="h-auto">
                <div class="container-lg py-3 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card" id="list1" style="border-radius: .75rem; background-color: var(--list-color);">
                                <div class="card-body py-4 px-4 px-md-5">

                                    <div class="Fast-Search">
                                        <img src="<?php echo base64_encode_image('image/Quick-Music.png'); ?>" alt="Image 1" class="rotate img-1" />
                                        <h1>Fast Search</h1>
                                    </div>

                                    <div class="pb-2">
                                        <div class="card">
                                            <div class="card-body" style="padding: 0.5rem 1rem">
                                                <div class="d-flex flex-row align-items-center">
                                                    <input type="text" class="form-control form-control-lg" id="QuickSearch" placeholder="Quick Search..." />
                                                    <div>
                                                    <i id="exFormSearch" class="fas fa-search fa-lg"></i>
                                                    </div>
                                                </div>
                                                <div id="gallery-music" class="list-group list-group-light"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <ul class="list-group">
                                        <div class="list-group-item">
                                            <span class="d-inline-flex align-items-center justify-content-center text-white rounded m-1 me-2" style="background-color: #0082ca; width: 40px; height: 40px;">
                                                <i class="fas fa-music fa-lg"></i>
                                            </span>
                                            Music
                                            <div class="load-mini load-mini-1">
                                                <hr />
                                                <hr />
                                                <hr />
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="d-inline-flex align-items-center justify-content-center text-white rounded m-1 me-2" style="background-color: #ff4500; width: 40px; height: 40px;">
                                                <i class="fas fa-hashtag fa-lg"></i>
                                            </div>
                                            Singers
                                            <div class="load-mini load-mini-2">
                                                <hr />
                                                <hr />
                                                <hr />
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="d-inline-flex align-items-center justify-content-center text-white rounded m-1 me-2" style="background-color: #00b386; width: 40px; height: 40px;">
                                                <i class="fas fa-user fa-lg"></i>
                                            </div>
                                            Users
                                            <div class="load-mini load-mini-3">
                                                <hr />
                                                <hr />
                                                <hr />
                                                <hr />
                                            </div>
                                        </div>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="d-flex justify-content-between flex-my-column">
                <div class="">
                    <h5 id="mdb-icon-counting" class="h4 mdr-3 ms-2 mt-2" style="color: #495057; font-weight: 500"></h5>
                </div>
                <div class="mx-1" id="mdb-cheatsheet-wrapper">
                    <a id="mdb-cheatsheet-gallery" class="btn btn-floating btn-outline-primary ripple-surface-primary" data-mdb-ripple-color="primary" style="">
                        <span>
                            <i data-mdb-toggle="tooltip" class="fas fa-th" aria-label="Gallery View" data-mdb-original-title="Gallery View"> </i>
                        </span>
                    </a>
                    <a id="mdb-cheatsheet-info" class="btn btn-floating btn-outline-primary ripple-surface-primary" data-mdb-ripple-color="primary" style="">
                        <span>
                            <i data-mdb-toggle="tooltip" class="fas fa-info-circle" aria-label="Show Cheatsheet" data-mdb-original-title="Show Cheatsheet">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
            <div>
                <h1 class="table-header">Gallery View</h1>
            </div>

            <section class="pb-4">
                <div class="bg-white border rounded-5">

                    <section class="w-100 p-4 pb-4">
                        <h6 class="bg-light p-2 border-top border-bottom">Music!</h6>

                        <div class="scrollable-list">
                            <ol class="list-group list-group-light list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                            </ol>
                        </div>

                        <h6 class="bg-light p-2 border-top border-bottom">Artist!</h6>

                        <div class="scrollable-list">
                            <ol class="list-group list-group-light list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                            </ol>
                        </div>

                        <h6 class="bg-light p-2 border-top border-bottom">Users!</h6>

                        <div class="scrollable-list">
                            <ol class="list-group list-group-light list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Subheading</div>
                                        Content for list item
                                    </div>
                                    <span class="badge badge- rounded-pill">Quick</span>
                                </li>
                            </ol>

                        </div>
                    </section>
                </div>
            </section>
        </section>
    </div>
</div>

<!-- Second table for Movies -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo base64_encode_image('image/pic_main_mobile/8.png'); ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle shadow-2" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">John Doe</p>
                                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill badge-success">Active</span>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Message<i class="fas fa-envelope ms-2"></i></a>
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Call<i class="fas fa-phone ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo base64_encode_image('image/pic_main_mobile/8.png'); ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle shadow-2" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Alex Ray</p>
                                    <p class="text-muted mb-0">alex.ray@gmail.com</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill badge-primary">Onboarding</span>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Message<i class="fas fa-envelope ms-2"></i></a>
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Call<i class="fas fa-phone ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo base64_encode_image('image/pic_main_mobile/8.png'); ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle shadow-2" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Kate Hunington</p>
                                    <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill badge-warning">Awaiting</span>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Message<i class="fas fa-envelope ms-2"></i></a>
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Call<i class="fas fa-phone ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo base64_encode_image('image/pic_main_mobile/8.png'); ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle shadow-2" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Michael Bale</p>
                                    <p class="text-muted mb-0">michael.bale@gmail.com</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill badge-danger">Removed</span>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Message<i class="fas fa-envelope ms-2"></i></a>
                        <a class="btn btn-link m-0 text-reset" href="#" role="button" data-ripple-color="primary">Call<i class="fas fa-phone ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row bg-white pb-4 m-4">
    <!-- Carousel wrapper -->
    <div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="rounded-circle shadow-5-strong mb-4" src="<?php echo base64_encode_image('image/pic_main_mobile/16.png'); ?>" alt="avatar" style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h5 class="mb-3">Maria Kate</h5>
                        <p>Photographer</p>
                        <p class="text-muted">
                            <i class="fas fa-quote-left pe-2"></i>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                            nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
                            fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
                            doloremque.
                        </p>
                    </div>
                </div>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="far fa-star fa-sm"></i></li>
                </ul>
            </div>
            <div class="carousel-item">
                <img class="rounded-circle shadow-5-strong mb-4" src="<?php echo base64_encode_image('image/pic_main_mobile/16.png'); ?>" alt="avatar" style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h5 class="mb-3">John Doe</h5>
                        <p>Web Developer</p>
                        <p class="text-muted">
                            <i class="fas fa-quote-left pe-2"></i>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                            nesciunt sint eligendi reprehenderit reiciendis.
                        </p>
                    </div>
                </div>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="far fa-star fa-sm"></i></li>
                </ul>
            </div>
            <div class="carousel-item">
                <img class="rounded-circle shadow-5-strong mb-4" src="<?php echo base64_encode_image('image/pic_main_mobile/16.png'); ?>" alt="avatar" style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h5 class="mb-3">Anna Deynah</h5>
                        <p>UX Designer</p>
                        <p class="text-muted">
                            <i class="fas fa-quote-left pe-2"></i>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                            nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
                            fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
                            doloremque.
                        </p>
                    </div>
                </div>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="fas fa-star fa-sm"></i></li>
                    <li><i class="far fa-star fa-sm"></i></li>
                </ul>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</div>

<div>
    <h1 class="table-header">Music</h1>
</div>
<table class="table">
    <tbody>
        <tr class="table-row">
            <td><img src="<?php echo base64_encode_image('image/space_.png'); ?>" class="round-photo"> Number of songs</td>
            <td>0</td>
            <td><a href="#">0</a></td>
        </tr>
        <tr class="table-row">
            <td><img src="<?php echo base64_encode_image('image/space_.png'); ?>" class="round-photo"> Number of remix</td>
            <td>0</td>
            <td><a href="#">0</a></td>
        </tr>
    </tbody>
</table>

<div id="carouselVideoExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <i id="picinpic" class="fas fa-arrow-up-right-from-square fa-2x" style="position: absolute;
    bottom: 4%;
    z-index: 999;
    left: 2%"></i>
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
        <!-- <button
      type="button"
      data-mdb-target="#carouselVideoExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button> -->
    </div>

    <!-- Inner -->
    <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
            <video class="img-fluid" autoplay loop muted>
                <source src="image/Brow Pomade in Ebony (1).mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-dark">First slide label</h5>
                <p class="text-dark">
                    Nulla vitae elit libero, a pharetra augue mollis interdum.
                </p>
            </div>
        </div>

        <!-- Single item -->
        <!-- <div class="carousel-item">
      <video class="img-fluid" autoplay loop muted>
        <source src="image/Brow Pomade in Ebony (3).mp4" type="video/mp4" />
      </video>
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>
    </div> -->

        <!-- Single item -->
        <div class="carousel-item">
            <video class="img-fluid" id="browPomade" autoplay loop muted>
                <source src="image/Brow Pomade in Ebony.mp4" type="video/mp4" />
            </video>
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-dark">Third slide label</h5>
                <p class="text-dark">
                    Praesent commodo cursus magna, vel nisl consectetur.
                </p>
            </div>
        </div>
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel wrapper -->