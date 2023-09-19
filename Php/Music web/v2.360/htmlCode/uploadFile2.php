<section class="h-auto">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2d6;">
                    <div class="py-4 w-100 p-4 text-center pb-4" style="justify-items: center; display: grid">
                        <h2 class="text-uppercase text-center mb-1">Upload post / create post</h2>
                        <form id="uploadFile" enctype="multipart/form-data">
                            <p id="ErrorShow" class="error"></p>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="formUpload">
                                <span class="form-title">Upload your file</span>
                                <p class="form-paragraph">
                                    File should be an file
                                </p>
                                <label for="file-input" class="drop-container">
                                    <span class="drop-title">Drop files here</span>
                                    or
                                    <input type="file" name="filePost" required="" id="file-input">
                                </label>

                                <div class="form-outline mt-4 mb-4">
                                    <textarea class="form-control" name="descriptPost" id="form6Example7" rows="4" maxlength="150"></textarea>
                                    <label class="form-label" for="form6Example7">Description:</label>
                                </div>

                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4" style="border-radius: 0px 0px 10px 10px">POST</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>