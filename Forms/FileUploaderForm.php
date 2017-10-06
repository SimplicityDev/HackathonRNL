<div class="container">
	<div class="row">
		<div class="column">
			<form action="<?php echo $storeFolder; ?>" class="dropzone needsclick dz-clickable" id="dropzoneid">

				<div class="dz-message needsclick">
					Drop files here or click to upload.<br>
				</div>

			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	window.onload = function() {
    // access Dropzone here
	// "myAwesomeDropzone" is the camelized version of the HTML element's ID
	Dropzone.options.dropzoneid = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  accept: function(file, done) {
  	if (file.name == "justinbieber.jpg") {
  		done("Naha, you don't.");
  	}
  	else { done(); }
  }
}
};
</script>