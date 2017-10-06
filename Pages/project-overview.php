<div class="container">
	<div class="seven column">
	<h1>Project overview</h1>
	<hr />
		<table class="u-full-width">
			<thead class="sticky">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Created on</th>
					<th>Employer</th>
					<th>Template</th>
					<th>Edit/Delete</th>
					<th><a href="add-project"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$projects = new Projects($DBM->getPDO());
				if ($projects->GetAll() != null) {
					foreach($projects->GetAll() as $project) {
						echo "<tr>".$project['id']."</tr>";
						echo "<tr>".$project['created_on']."</tr>";
						echo "<tr>".$project['employer']."</tr>";
						echo "<tr>".$project['template_id']."</tr>";
						echo '<tr>
								<a href="edit-project'.$project['id'].'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
								<a href="delete-project?'.$project['id'].'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							  <tr>';
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>