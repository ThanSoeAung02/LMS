<?php

 include_once __DIR__.'/../layouts/sidebar.php';
 include_once __DIR__.'/../controller/instructorController.php';

 $instructor_controller = new instructorController();
 $instructors = $instructor_controller->instructorName();

 


?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Instructor</strong> Dashboard</h1>

					<?php
                    
						if (isset($_GET['status']) && $_GET['status'] == true)
						{
							echo "<small class='text-success'>New Instructor has been successfully added</small>";
						}

					?>

					<?php
                    
						if (isset($_GET['updateStatus']) && $_GET['updateStatus'] == true)
						{
							echo "<small class='text-success'>Instructor has been successfully updated</small>";
						}

					?>

					<div class="row mt-3">
						<div class="col-md-3">
							<a href="addInstructor.php" class='btn btn-primary'>Add New Instructor</a>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-12">
							<table class='table table-striped' id="instructorTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$count = 1;
									 foreach($instructors as $instructor)
									 {
									?>
									<tr>
										<td><?php echo $count++;?></td>
										<td><?php echo $instructor['name']?></td>
										<td><?php echo $instructor['email']?></td>
										<td><?php echo $instructor['phone']?></td>
										<td><?php echo $instructor['address']?></td>
										<td id="<?php echo $instructor['id'];?>">
											<a href="editInstructor.php?id=<?php echo $instructor['id']?>" class="btn btn-warning me-2">Edit</a>
											<a href="" class="btn btn-danger instructor_delete">Delete</a>
										</td>

									</tr>

									<?php
									 }
									?>
								</tbody>
							</table>
						</div>
					</div>


				</div>
			</main>

<?php

 include_once __DIR__.'/../layouts/app_footer.php';

?>