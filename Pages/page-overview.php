<div class="container">
	<div class="seven column">
	<h1>Page overview</h1>
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
				$Pages = new Sitepage($DBM->getPDO());
				if ($Pages->Select() != null) {
					foreach($Pages->Select() as $page) {
						echo "<tr>".$page->GetId()."</tr>";
						echo "<tr>".$page->GetTitle()."</tr>";
						echo "<tr>".$page->GetCreatedDate()."</tr>";
						echo "<tr>".$page->GetTemplateId()."</tr>";
						echo '<tr>
								<a href="edit-page'.$page->GetId().'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
								<a href="delete-page?'.$page->GetId().'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
							  <tr>';
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>