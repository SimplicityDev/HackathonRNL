<div class="container">
	<div class="seven column">
	<h1>Blogpost overview</h1>
	<hr />
		<table class="u-full-width">
			<thead class="sticky">
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Created on</th>
					<th>Template</th>
					<th>Edit/Delete</th>
					<th><a href="add-blogpost"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$Blogposts = new Blogposts($DBM->getPDO());
				if ($Blogposts->Select() != null) {
					foreach($Blogposts->Select() as $blogpost) {
						echo "<tr>".$blogpost->GetId()."</tr>";
						echo "<tr>".$blogpost->GetTitle()."</tr>";
						echo "<tr>".$blogpost->GetCreatedDate()."</tr>";
						echo "<tr>".$blogpost->GetTemplateId()."</tr>";
						echo '<tr>
								<a href="edit-blogpost'.$blogpost->GetId().'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
								<a href="delete-blogpost?'.$blogpost->GetId().'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							  <tr>';
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>