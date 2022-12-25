<?php
@session_start();
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('../../login','_self');</script>";
} else {
	// echo "<pre>";
	// print_r($admin_id);
	// print_r($_POST);
	$id = $input->get('id');

	if (isset($_POST['insert_comment'])) {
		$request = $input->post();

		$data['date'] = date("F d, Y H:i A");

		$data['idea_id'] = $id;
		$data['admin_id'] = $admin_id;
		$data['comment'] = $request['comment'];

		$insert = $db->insert("comments", $data);
		if ($insert) {
			$insert_id = $db->lastInsertId();

			$insert_log = $db->insert_log($admin_id, "feedback", $insert_id, "inserted");
			echo "<script>alert_success('One comment has been Inserted Successfully.','index?idea-comments&id=" . $id . "');</script>";
		}

		unset($_POST['insert_comment']);
	}

	$qIdea = $db->select("ideas", ['id' => $id], "DESC");

	if ($qIdea->rowCount() == 0) {
		echo "<script>window.open('index?dashboard','_self');</script>";
	}

	$oIdea = $qIdea->fetch();
	$user = $db->select("sellers", ["seller_id" => $oIdea->seller_id])->fetch()->seller_user_name;
	// echo "<pre>";
	// print_r($oIdea);
	// print_r($oComment);
?>

	<div class="breadcrumbs">
		<!--- breadcrumbs Starts --->
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1><i class="menu-icon fa fa-rss"></i> Feedback Details</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">Ideas</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!--- breadcrumbs Ends --->

	<div class="container-fluid">
		<!--- container Starts --->

		<div class="row">
			<!-- row Starts -->

			<div class="col-lg-12">
				<!-- col-lg-12 Starts -->

				<div class="card card-default">
					<!-- card card-default Starts -->

					<div class="card-header">
						<!-- card-header Starts -->
						<i class="fa fa-money fa-fw"></i> View All Ideas
					</div><!-- card-header Ends -->

					<div class="card-body">
						<!-- card-body Starts -->

						<div class="table-responsive">
							<!--- table-responsive Starts -->

							<table class="table table-bordered table-hover table-striped">
								<!--- table table-bordered table-hover table-striped Starts -->
								<thead>
									<tr>
										<th>No</th>
										<th>User</th>
										<th>Comment</th>
										<th>Date</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>1</td>
										<td><?= $user; ?></td>
										<td><strong><?= $oIdea->title; ?></strong><br /><?= $oIdea->content; ?></td>
										<td><?= $oIdea->date; ?></td>
									</tr>
									<?php
									$i = 1;
									$qComment = $db->select("comments", ["idea_id" => $oIdea->id], "ASC");
									while ($oComment = $qComment->fetch()) {
										$user = $oComment->admin_id ? 'Admin' : $db->select("sellers", ["seller_id" => $oComment->seller_id])->fetch()->seller_user_name;
										$i++;
									?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $user; ?></td>
											<td><?= $oComment->comment; ?></td>
											<td><?= $oComment->date; ?></td>
										</tr>
									<?php } ?>
								</tbody>

							</table>
							<!--- table table-bordered table-hover table-striped Starts -->
						</div>
						<form action="" class="row" method="post">
							<div class="col-6">
								<label for="input-comment" class="sr-only">Comment</label>
								<input type="text" name="comment" class="form-control" id="input-comment" placeholder="Comment" required minlength="5">
							</div>
							<div class="col-1">
								<input type="submit" name="insert_comment" class="form-control btn btn-primary mb-2" value="Reply">
							</div>
						</form>
						<!--- table-responsive Ends -->
					</div><!-- card-body Ends -->

				</div><!-- card card-default Ends -->

			</div><!-- col-lg-12 Ends -->

		</div><!-- row Ends -->

	</div>
	<!--- container Ends --->

<?php } ?>