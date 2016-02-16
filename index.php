<!DOCTYPE html>

<meta charset="utf-8">
<html>

<title>Dropzone simple example</title>
<head>
	<script src="assets/dropzone/dropzone.js"></script>
	<script src="assets/jquery-2.2.0.min.js"></script>
	<link rel="stylesheet" href="assets/dropzone/dropzone.css">
</head>

<body>

<p>
  This is the most minimal example of Dropzone. The upload in this example
  doesn't work, because there is no actual server to handle the file upload.
</p>

<button id="submit-all">Submit all files</button>
<form action="/target" class="dropzone" id="my-dropzone"></form>

</body>

<script>

Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,

  init: function() {


    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        var myDropzone = this;

    submitButton.addEventListener("click", function() {
    	    var myfiles = myDropzone.getQueuedFiles();
			for (i = 0; i < myfiles.length; i++) { 
    			console.log(myfiles[i].name);
			}
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function(file) {
      console.log(file.name);
      // Show submit button here and/or inform user to click it.

    });

  }
};
</script>


</html>


