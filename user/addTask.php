<?php include('includes/header.php'); ?>



<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<h5 class="mb-0 text-primary">Add New Task</h5>
								</div>
								<hr>
								<form class="row g-3">
									<div class="col-md-12">
										<label for="inputSubject" class="form-label">Subject <span class="text-danger">*</span></label>
										<input type="text" class="form-control" id="inputSubject">
									</div>
									<div class="col-md-6">
										<label for="inputStartDate" class="form-label">Start Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control" id="inputStartDate" value="">
									</div>
									<div class="col-md-6">
										<label for="inputDeadline" class="form-label">Deadline <span class="text-danger">*</span></label>
										<input type="date" class="form-control" id="inputDeadline">
									</div>
                                    <div class="col-md-6">
                                        <label for="inputStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" id="inputStatus" aria-label="Default select example">
                                            <option value="" selected>Select Status</option>
                                            <option value="not_started">Not Started</option>
                                            <option value="in_progress">In Progress</option>
                                            <option value="completed">Completed</option>
                                            <option value="deffered">Deffered</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPriority" class="form-label">Priority <span class="text-danger">*</span></label>
                                        <select class="form-select" id="inputPriority" aria-label="Default select example">
                                            <option value="" selected>Select Priority</option>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputAssignTo" class="form-label">Assign To <span class="text-danger">*</span></label>
                                        <select class="form-select" id="inputAssignTo" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="arslan">Arslan Naeem</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputClientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <select class="form-select" id="inputClientName" aria-label="Default select example">
                                            <option value="" selected></option>
                                            <option value="arslan">Rana Kamran</option>
                                        </select>
                                    </div>
									<div class="col-12">
										<label for="inputDescription" class="form-label">Description <span class="text-danger">*</span></label>
										<textarea class="form-control" id="inputDescription" placeholder="Enter Detail/Description..." rows="3"></textarea>
									</div>
								
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Save</button>
										<a href="tasks.php" class="btn btn-secondary px-5">Back</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<!--end page wrapper -->





<?php include('includes/footer.php'); ?>