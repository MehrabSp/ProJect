$(document).ready(function() {
// search
$("#QuickSearch").on('keyup', function () {
  var typingTimer;
var doneTypingInterval = 1000; // 1 second
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);

  var text = $(this).val();
  var firstChar = text.charAt(0);
  if (firstChar != "")
    if (firstChar === "#") {
      $(".load-mini-2").addClass("show");
      $(".load-mini-3, .load-mini-1").removeClass("show");
    } else if (firstChar === "@") {
      $(".load-mini-3").addClass("show");
      $(".load-mini-2, .load-mini-1").removeClass("show");
    } else {
      $(".load-mini-1").addClass("show");
      $(".load-mini-2, .load-mini-3").removeClass("show");
    }
});

function doneTyping() {
  var searchText = $("#QuickSearch").val();
  $.post("phpCode/vs.php", { q: searchText }).done(function (data) {
    $("#gallery-music").html(data);
    $(".show").removeClass("show");
  });
}

$("#exFormSearch").on("click", function () {
  doneTyping();
});

// signup

$("#signup").on("click", function () {
  $("body").append(` <div class="load">
    <hr />
    <hr />
    <hr />
    <hr />
  </div>`);
  var name = $("#name_up").val();
  var email = $("#email_up").val();
  var password = $("#password_up").val();
  $.post("phpCode/request.php", { name_up: name, email_up: email, password_up: password }).done(function (data) {
    if(data == "Success"){
      localStorage.reloadAfterPageLoad = true;
      location.reload();
    }else{
      $(".error").text(data);
    }
  })
  .fail(function() {
    alert( "Error to connect" );
  })
  $(".load").remove();
});

//login

$("#login").on("click", function () {
  $("body").append(` <div class="load">
    <hr />
    <hr />
    <hr />
    <hr />
  </div>`);
  var email = $("#email_log").val();
  var password = $("#password_log").val();
  $.post("phpCode/request.php", { email_log: email, password_log: password }).done(function (data) {
    if(data == "Success"){
      location.reload();
    }else{
      $(".error").text(data);
    }
  })
  .fail(function() {
    alert( "Error to connect" );
  })
  $(".load").remove();
});

$( function () {
  if ( localStorage.reloadAfterPageLoad != "false" ) {
    var iframe = $('<iframe>', {
      src: 'frame/Welcome.html',
      frameborder: 0,
      css: {
        position: 'absolute',
        width: '100%',
        index: '999',
        height: '100%'
      }
    });
  
    // Add the iframe to the page
    $('#navbar').append(iframe);
  
    setTimeout(function() {
      iframe.remove();
    }, 8500);
      localStorage.reloadAfterPageLoad = "false";
  }else if ( localStorage.intro != "false" ) {
    console.log("s")
    var iframe = $('<iframe>', {
      src: 'frame/intro.html',
      frameborder: 0,
      css: {
        position: 'fixed',
        width: '100%',
        zindex: '999',
        top: '0',
        height: '100%'
      }
    });
  
    // Add the iframe to the page
    $('body').append(iframe);
  
    setTimeout(function() {
      iframe.remove();
    }, 4900);
      localStorage.intro = "false";
  }
} 
);

// picture in picture
$("#picinpic").on("click", function () {
  if (document.pictureInPictureElement) {
    document.exitPictureInPicture();
  } else if (document.pictureInPictureEnabled) {
    document.getElementById('browPomade').requestPictureInPicture();
  }
});

//remove icon LOADer
$( window ).on( "load", function() {
  $('.load').remove();
} );


$('#user_file').change(function(e) {
  e.preventDefault();
  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#userimage_preview').attr('src', e.target.result);
  }
  reader.readAsDataURL(file);
  var formData = new FormData();
  formData.append('file', file);
  $.ajax({
    url: 'phpCode/handleFile/userPicture.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
      console.log(response);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});

// $('#uploadForm').on('submit', function(e){
//   e.preventDefault();
//   $.ajax({
//    url: 'upload.php',
//    type: 'POST',
//    data: new FormData(this),
//    contentType: false,
//    cache: false,
//    processData:false,
//    xhr: function(){
//     var xhr = new window.XMLHttpRequest();
//     xhr.upload.addEventListener('progress', function(evt){
//      if(evt.lengthComputable){
//       var percentComplete = (evt.loaded / evt.total) * 100;
//       $('#progressBar').width(percentComplete + '%');
//       $('#progressBar').html(percentComplete.toFixed(2)+'%');
//      }
//     }, false);
//     return xhr;
//    },
//    beforeSend: function(){
//     $('#progressBar').width('0%');
//     $('#progressBar').html('0%');
//    },
//    success:function(data){
//     $('#progressBar').width('100%');
//     $('#progressBar').html('100%');
//     location.reload()
//    }
//   });
//  });

 $('#createChannel').on('submit', function(e){
  $("body").append(` <div class="load">
    <hr />
    <hr />
    <hr />
    <hr />
  </div>`);
      e.preventDefault();
      var formData = new FormData($('#createChannel')[0]);
      $.ajax({
        url: 'phpCode/request.php',
        type: 'POST',
        data: formData,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set the content type
        success: function(response) {
          $("#ErrorShow").text(response);
        },
        error: function(xhr, status, error) {
          $("#ErrorShow").text(error);
        }
      });
      $(".load").remove();
 });

 $( "#WtMean" ).on( "click", '#paste', function() {
  var txpst = $( this ).text();
    $( "#QuickSearch" ).val(txpst);
    doneTyping();
});

// upload image Channel
$('.upload-image').click(function() {
  $('#file-input').trigger('click');
});

$('#file-input').change(function() {
  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#image-preview').attr('src', e.target.result);
  }
  reader.readAsDataURL(file);
});

$('#uploadFile').on('submit', function(e){
  $("body").append(` <div class="load">
    <hr />
    <hr />
    <hr />
    <hr />
  </div>`);
      e.preventDefault();
      var formData = new FormData($('#uploadFile')[0]);
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
      
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              percentComplete = parseInt(percentComplete * 100);
              $('.progress-bar')[0].style.width = percentComplete + '%';
            }
          }, false);
      
          return xhr;
        },
        url: 'phpCode/request.php',
        type: 'POST',
        data: formData,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set the content type
        success: function(response) {
          $("#ErrorShow").text(response);
          if (response == "This file type is not supported") $('.progress-bar').addClass('bg-danger');
          $('.progress-bar').addClass('bg-success');
        },
        error: function(xhr, status, error) {
          $("#ErrorShow").text(error);
          $('.progress-bar').addClass('bg-danger');
        }
      });
      
      $(".load").remove();
 });

});