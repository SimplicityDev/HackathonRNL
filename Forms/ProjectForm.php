<div class="container">
	<?php if ($page == "add-project"): ?>
		<h1>Add a project</h1>
	<?php endif ?>
	<?php if ($page == "change-project"): ?>
		<h1>Edit <?php echo $project->__get('name') ?></h1>
	<?php endif ?>
	<hr />

	<div class="row">
		<div class="on-half">
			You can add your projects here, you can choose to let them be a standalone project or you can link them to a page and add a template for different layouts.
			<br />
			<b>note:</b> if you don't add a template, the default template will be used.
		</div>
	</div>
	<div class="row">
		<div class="one-half"></div>
		<form action="" method="POST">
			<div class="form-one fieldset">
				<div class="row">
					<div class="six columns">
						<label for="name">Project name: </label>
						<input type="text" id="name" placeholder="enter a project name" class="u-full-width">
					</div>
					<div class="six columns">
						<label for="CreatedDate">Date completed: </label>
						<input type="text" id="CreatedDate" placeholder="dd/mm/yyyy" class="u-full-width">
					</div>
				</div>
				<div class="row">
					<div class="six columns">
						<label for="Employer">Employer: </label>
						<input type="text" id="Employer" placeholder="Project employer" class="u-full-width">
					</div>
					<div class="six columns">
						<label for="HeaderImg">Header image: </label>
						<input type="file" id="HeaderImg"  class="FileInput"/>
						<label for="HeaderImg" class="button"><i class="fa fa-upload" aria-hidden="true"></i>Upload</label>
						<input type="file" id="HeaderImg" class="FileInput" />
						<span>No image chosen...</span>
					</div>
				</div>
				<label for="Desc">Project description: </label>
				<textarea name="Desc" id="Desc" placeholder="This project was about...." cols="30" rows="10" class="u-full-width editor"></textarea>
				<div class="row">
					<div class="columns four">
						<label for="chosenTemplate">Select a Template: </label>
						<select class="u-full-width" name="chosenTemplate" id="chosenTemplate" onchange="FormLoader(event)">	
							<option value="" selected>Select a template...</option>
							<?php 
							$templates = $template->Select();
							for ($i=0; $i < count($templates); $i++) { 
								echo '<option value="'.$templates[$i]->id.'">'.$templates[$i]->filename.'</option>';
							}
							?>
						</select>
					</div>
					<div class="columns six">
						<label for="">Or upload a new one...</label>
						<label for="TemplateFile" class="button"><i class="fa fa-upload" aria-hidden="true"></i>Upload</label>
						<input type="file" id="TemplateFile" class="FileInput" />
						<span>No template chosen...</span>
					</div>
				</div>
				<div class="form-buttons">
					<div class="navigation-buttons">
						<button class="next button-primary" type="button">Next</button>  
					</div>
					<div class="submit-buttons">
						<?php if ($page == "add-project"): ?>
							<input id="submit" type="submit" value="Add" class="button-primary form-button">
						<?php endif ?>
						<?php if ($page == "change-project"): ?>
							<input id="submit" type="submit" value="Change" class="button-primary form-button">
						<?php endif ?>
						<a href="project-overview" class="button">Back</a>
					</div>
				</div>
			</div>
		</div>
		<!-- if layout is chosen -->
		<!-- scan layout for block, image and textblock count -->
		<div class="form-two fieldset">
			<div class="row">	
				<div id="TemplateForm"></div>
			</div>
			<div class="submit-buttons form-two">
				<?php if ($page == "add-project"): ?>
					<input id="submit" type="submit" value="Add" class="button-primary form-button">
				<?php endif ?>
				<?php if ($page == "change-project"): ?>
					<input id="submit" type="submit" value="Change" class="button-primary form-button">
				<?php endif ?>
				<button class="prev" type="button">Previous</button>
			</div>
		</div>
	</form>
</div>
</div>

<script>
	$('.navigation-buttons').hide();
	$('.form-buttons').show();
	$('.form-two').hide();

	function FormLoader(event){
		console.log(event.target.value);
		if (event.target.value != null) {
			$('.navigation-buttons').show();
			$('.form-two').hide();
			$('.submit-buttons').hide();
			ScanTemplate(event);
		}else{
			$('.form-two').hide();
			$('.submit-buttons').show();
			$('.navigation-buttons').hide();
		}

		$('.next').click(function() {
			$('.form-one').hide();

			$('.form-two').animate({
				height: "toggle",
				opacity: "toggle"
			}, "fast");
		}); 
		$('.prev').click(function() {
			$('.form-two').hide();
			$('.form-one').animate({
				height: "toggle",
				opacity: "toggle"
			}, "fast");
		}); 

	}

	function ScanTemplate(event){
		$.ajax({
			url: "loaders/ScanTemplate.php",
			type: "POST",
			data: JSON.stringify({ 'template_id': event.target.value }),
			cache: false,
			success: function (response) {
				div = document.getElementById('TemplateForm');

						//div.html("");
						data = JSON.parse(response);

						var textarea_attr = {
							placeholder: 'enter text here',
							class: 'u-full-width',
							cols: 30,
							rows: 10,
							id: 'title'
						}

						var input_attr ={
							placeholder: "title...",
							class: 'u-full-width',
							id: 'title'
						}

						var label_attr = {
							for: "content"
						}

					var image_attr = {
						src: "./path/to/image.extension",
						alt: "whatever the alt is"
					}
					$(div).append('<h2>Template form</h2>');
					$(div).append('<hr />');
					for (var i = 0; i < data.textblock_count; i++) {
						$(div).append('<label for="content">Enter title').attr(label_attr);
						$(div).append('<input type="text" placeholder="title..." class="u-full-width" name="title" id="title" />').attr(input_attr);
						$(div).append('<label for="content">Enter content').attr(label_attr);
						$(div).append('<textarea class="u-full-width" cols="30" rows="10" id="title" placeholder="text goes here">').attr(textarea_attr);
						$(div).append('<hr />');
					}
						// for (var i = 0; i < data.block_count; i++) {
						// 	$(div).append("<div>").attr();
						// }
						// for (var i = 0; i < template.image_count; i++) {
						// 	$("body").append("<img>").attr(image_attr)
						// }
					}
				});			
	}
</script>
