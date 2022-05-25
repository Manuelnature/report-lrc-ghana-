
// Display loaded picture
function loadPicture(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#uploaded_food_photo')
      .attr('src', e.target.result)
        .width(200)
        .height(150);
    };

    reader.readAsDataURL(input.files[0]);
  }
  console.log("Pic Loaded")
}

// Effects to the loaded picture

function addEffectToTheUploadedImage(uploadedImage){
  uploadedImage.style.width = '202px';
  uploadedImage.style.height = '152px'
}

function removeEffectToTheUploadedImage(uploadedImage){
  uploadedImage.style.width = '200px';
  uploadedImage.style.height = '150px'
}