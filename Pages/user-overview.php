<div class="container">
	<div class="seven column">
	<h1>User overview</h1>
	<hr />
		<table class="u-full-width">
			<thead class="sticky">
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Name</th>
					<th>Email</th>
					<th>Privleges</th>
					<th>Last logged in on</th>
					<th>Edit/Delete</th>
					<th><a href="add-project"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach($User->getAllFromTable('users') as $user) {
					switch ($user->GetLevel()) {
						case 999:
							$role = "Super admin";
							break;
						case 777:
							$role = 'Admin';
							break;
						case 555:
							$role = 'Editor';
							break;
						case 333:
							$role = 'User';
							break;
						default:
							$role = 'no privileges';
							break;
					}
					echo "<tr>";
						echo "<td>".$user->GetID()."</td>";
						echo "<td>".$user->GetUsername()."</td>";
						echo "<td>".$user->GetFirstName()." ".$user->GetLastName()."</td>";
						echo "<td>".$user->GetEmail()."</td>";
						echo "<td>".$role."</td>";
						echo "<td>".$user->GetLastlogin()."</td>";
						echo '<td colspan="2">
								<a class="button add" href="edit-user?id='.$user->GetID().'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
								<a class="button delete" href="delete?id='.$user->GetID().'"><i class="fa fa-trash" aria-hidden="true"></i></a>
							  <td>';
				  echo "</tr>";
				}
			?>
			</tbody>
		</table>
	</div>
</div>