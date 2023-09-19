<section class="h-auto">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2d6;">
                    <div class="py-4 w-100 p-4 text-center pb-4" style="justify-items: center; display: grid">
                        <h2 class="text-uppercase text-center mb-3">Create Channel</h2>
                        <form id="createChannel" action="request_user.php" method="post" enctype="multipart/form-data">
                            <p id="ErrorShow" class="error"></p>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="profile-pic d-flex justify-content-center">
                                <label class="-label" for="file-input">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Profile image</span>
                                </label>
                                <input id="file-input" name="image_file" accept="image/*" type="file" />
                                <img src="" id="image-preview" width="200" style="background-color: #a9a9a963;" />
                            </div>

                            <h5>About Channel</h5>
                            <p>Items displayed on your channel</p>

                            <hr />
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example1" class="form-control form-control-lg" name="officName" placeholder="Example: Quick Channel" />
                                        <label class="form-label" for="form6Example1">Channel Name:</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form6Example2" class="form-control form-control-lg" name="channelID" placeholder="Example: Quick_Music" require />
                                        <label class="form-label" for="form6Example2">Channel id:</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="bio" id="form6Example7" rows="4" maxlength="50"></textarea>
                                <label class="form-label" for="form6Example7">Bio:</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
                                <label class="form-check-label" for="form6Example8"> Did you read the rules? </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">CREATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>