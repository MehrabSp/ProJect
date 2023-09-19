<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <!-- style -->
  <link rel="stylesheet" href="style/styleMs.css?v=2.0.2.3">

  <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style/style-UI-player.css?v=1.0.2">
</head>

<body>

<div id="upload" class="modal d-block" data-state="0" data-ready="false">
  <div class="modal__header">
    <button class="modal__close-button" type="button">
      <svg class="modal__close-icon" viewBox="0 0 16 16" width="16px" height="16px" aria-hidden="true">
        <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <polyline points="1,1 15,15" />
          <polyline points="15,1 1,15" /> 
        </g>
      </svg>
      <span class="modal__sr">Close</span>
    </button>
  </div>
  <div class="modal__body">
    <div class="modal__col">
      <!-- up -->
      <svg class="modal__icon modal__icon--blue" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
        <g fill="none" stroke="hsl(223,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
          <polyline class="modal__icon-sdo14" points="7 12 12 7 17 12" stroke-dasharray="14.2 14.2" />
          <line class="modal__icon-sdo10" x1="12" y1="7" x2="12" y2="17" stroke-dasharray="10 10" />
        </g>
      </svg>
      <!-- error -->
      <svg class="modal__icon modal__icon--red" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
        <g fill="none" stroke="hsl(3,90%,50%)" stroke-width="2" stroke-linecap="round">
          <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
          <line class="modal__icon-sdo14" x1="7" y1="7" x2="17" y2="17" stroke-dasharray="14.2 14.2" />
          <line class="modal__icon-sdo14" x1="17" y1="7" x2="7" y2="17" stroke-dasharray="14.2 14.2" />
        </g>
      </svg>
      <!-- check -->
      <svg class="modal__icon modal__icon--green" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
        <g fill="none" stroke="hsl(138,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
          <polyline class="modal__icon-sdo14" points="7 12.5 10 15.5 17 8.5" stroke-dasharray="14.2 14.2" />
        </g>
      </svg>
    </div>
    <div class="modal__col">
      <div class="modal__content">
        <h2 class="modal__title">Upload a File</h2>
        <p class="modal__message">
          Select a file to upload from your computer or device.
        </p>
        <div class="modal__actions">
          <button class="modal__button modal__button--upload" type="button" data-action="file">
            Choose File
          </button>
          <input id="file" type="file" hidden multiple />
        </div>
        <div class="modal__actions">
          <svg class="modal__file-icon" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
            <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polygon points="4 1 12 1 20 8 20 23 4 23" />
              <polyline points="12 1 12 8 20 8" />
            </g>
          </svg>
          <div class="modal__file" data-file></div>
          <button class="modal__close-button" type="button" data-action="fileReset">
            <svg class="modal__close-icon" viewBox="0 0 16 16" width="16px" height="16px" aria-hidden="true">
              <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polyline points="4,4 12,12" />
                <polyline points="12,4 4,12" />
              </g>
            </svg>
            <span class="modal__sr">Remove</span>
          </button>
          <button class="modal__button" type="button" data-action="upload">
            Upload
          </button>
        </div>
      </div>
      <div class="modal__content">
        <h2 class="modal__title">Uploading…</h2>
        <p class="modal__message">
          Just give us a moment to process your file.
        </p>
        <div class="modal__actions">
          <div class="modal__progress">
            <div class="modal__progress-value" data-progress-value>0%</div>
            <div class="modal__progress-bar">
              <div class="modal__progress-fill" data-progress-fill></div>
            </div>
          </div>
          <button class="modal__button" type="button" data-action="cancel">
            Cancel
          </button>
        </div>
      </div>
      <div class="modal__content">
        <h2 class="modal__title">Oops!</h2>
        <p class="modal__message" data-error></p>
        <div class="modal__actions modal__actions--center">
          <button class="modal__button" type="button" data-action="upload">
            Retry
          </button>
          <button class="modal__button" type="button" data-action="cancel">
            Cancel
          </button>
        </div>
      </div>
      <div class="modal__content">
        <h2 class="modal__title">Upload Successful!</h2>
        <p class="modal__message">
          Your file has been uploaded. You can copy the link to your clipboard.
        </p>
        <div class="modal__actions modal__actions--center">
          <button class="modal__button" type="button" data-action="copy">
            Copy Link
          </button>
          <button class="modal__button" type="button" data-action="cancel">
            Done
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script id="rendered-js">
  console.log("Start");

  window.addEventListener("DOMContentLoaded", () => {
    const upload = new UploadModal("#upload");
  });

  class UploadModal {
    filename = "";
    isCopying = false;
    isUploading = false;
    progress = 0;
    progressTimeout = null;
    state = 0;

    constructor(el) {
      this.el = document.querySelector(el);
      this.el?.addEventListener("click", this.action.bind(this));
      this.el
        ?.querySelector("#file")
        ?.addEventListener("change", this.fileHandle.bind(this));
    }
    action(e) {
      this[e.target?.getAttribute("data-action")]?.();
      this.stateDisplay();
    }
    cancel() {
      this.isUploading = false;
      this.progress = 0;
      this.progressTimeout = null;
      this.state = 0;
      this.stateDisplay();
      this.progressDisplay();
      this.fileReset();
      console.log("Cncel");
    }
    async copy() {
      const copyButton = this.el?.querySelector("[data-action='copy']");

      if (!this.isCopying && copyButton) {
        // disable
        this.isCopying = true;
        copyButton.style.width = `${copyButton.offsetWidth}px`;
        copyButton.disabled = true;
        copyButton.textContent = "Copied!";
        navigator.clipboard.writeText(this.filename);
        await new Promise((res) => setTimeout(res, 1000));
        // reenable
        this.isCopying = false;
        copyButton.removeAttribute("style");
        copyButton.disabled = false;
        copyButton.textContent = "Copy Link";
      }
    }
    fail(message = `Your file could not be uploaded due to an error. Try uploading it
          again?`) {
      const err = this.el?.querySelector("[data-error]");
      err.textContent = message;
      this.isUploading = false;
      this.progress = 0;
      this.progressTimeout = null;
      this.state = 2;
      this.stateDisplay();
    }
    file() {
      this.el?.querySelector("#file").click();
    }
    fileDisplay(file = "") {
      // update the name
      this.filename = file.name;
      this.filesize = file.size;
      this.filetype = file.type;

      const fileValue = this.el?.querySelector("[data-file]");
      if (fileValue) fileValue.textContent = this.filename;

      // show the file
      this.el?.setAttribute("data-ready", this.filename ? "true" : "false");

    }
    fileHandle(e) {
      return new Promise(() => {
        const {
          target
        } = e;
        if (target?.files.length) {
          let reader = new FileReader();
          reader.onload = (e2) => {
            this.fileDisplay(target.files[0]);
          };
          reader.readAsDataURL(target.files[0]);
        }
      });
    }
    fileReset() {
      const fileField = this.el?.querySelector("#file");
      if (fileField) fileField.value = null;

      this.fileDisplay();
    }
    progressDisplay() {
      const progressValue = this.el?.querySelector("[data-progress-value]");
      const progressFill = this.el?.querySelector("[data-progress-fill]");
      const progressTimes100 = this.progress;
      console.log(this.progress);

      if (progressValue) progressValue.textContent = `${progressTimes100}%`;
      if (progressFill)
        progressFill.style.transform = `translateX(${progressTimes100}%)`;
    }
    async progressLoop() {
      this.progressDisplay();

      if (this.isUploading) {
        if (this.progress === 0) {
          await new Promise((res) => setTimeout(res, 1000));
          // fail randomly
          if (!this.isUploading) {
            return;
          } else {
            this.fail();
            console.log("fail");
            return;
          }
        }
        // …or continue with progress
        if (this.progress >= 100) {
          this.progressTimeout = setTimeout(() => {
            if (this.isUploading) {
              try {
                var data = JSON.parse(this.xhr.responseText);
                if (data.message == "Success") {
                  this.success();
                  this.stateDisplay();
                  this.progressTimeout = null;
                } else {
                  this.fail();
                }

                console.log(data.size + " ++");
              } catch {
                console.log("Error parsing JSON: " + this.xhr.responseText);
                this.fail();
              }
            }
          }, 250);
        }
      }
    }
    stateDisplay() {
      this.el?.setAttribute("data-state", `${this.state}`);
    }
    success() {
      this.isUploading = false;
      this.state = 3;
      this.stateDisplay();
      console.log("success");
    }
    upload() {
      if (!this.isUploading) {
        if (this.filesize <= 100000000 && (this.filetype == 'image/jpeg' || this.filetype == 'audio/mpeg' || this.filetype == 'application/x-zip-compressed')) {

          console.log("upload");
          console.log(this.filename)
          console.log(this.filesize)
          console.log(this.filetype)

          const fileInput = document.getElementById("file");
          const file = fileInput.files[0];
          const formData = new FormData();
          formData.append("file", file);
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "phpCode/handleFile/Post.php", true);

          xhr.upload.onprogress = (e) => {
            if (e.lengthComputable) {
              var percentComplete = Math.floor((e.loaded / e.total) * 100);
              console.log(percentComplete + "% uploaded");

              this.progress = percentComplete;
              this.progressTimeout = setTimeout(this.progressLoop.bind(this), 50);
            } else {
              this.fail();
            }
          };

          xhr.onload = () => {
            if (xhr.status === 200) {
              console.log("File uploaded successfully");
              console.log(xhr.responseText);
            } else {
              this.fail();
              // console.error("Error uploading file");
            }
          };
          xhr.send(formData);

          this.isUploading = true;
          this.progress = 0;
          this.state = 1;
          this.xhr = xhr;
          this.progressLoop();

        } else {
          this.fail('You can only upload music or photo files with a size of less than 40 MB');
        }
      }
    }
  }

  //# sourceURL=pen.js
</script>

</body>

</html>