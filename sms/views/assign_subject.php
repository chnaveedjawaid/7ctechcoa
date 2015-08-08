<?php include("include/header.php");?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Assigning Subject To Teacher</h1>
									<span class="mainDescription">Form information text.</span>
								</div>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="row margin-top-30">
										<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<form class="col-sm-12" role="form">
														<div class="row">
                                                            <div class="form-group col-sm-4 has-error">
                                                                <label for="exampleInputSelectTeacher">
                                                                    Select Teacher
                                                                <span class="symbol required" aria-required="true"></span>
                                                                </label>
                                                                <select id="teacher" onchange="select_techaer(this.value)" class="js-example-basic-single js-states form-control" tabindex="-1" style="display: none;">
																
															</select>
                                                            <span id="password_again-error" class="help-block">Please Specify Correct Name.</span>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="user-left">
                                                                    <div class="center profile-pic">
                                                                        <h4 id="name"></h4>
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="user-image">
                                                                                <div class="fileinput-new thumbnail"><img id="img" alt="">
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="line-height: 10px;"></div>
                                                                                <div class="user-image-buttons">
                                                                                    <span class="btn btn-azure btn-file btn-sm"><span class="fileinput-new"><i class="fa fa-pencil"></i></span><span class="fileinput-exists"><i class="fa fa-pencil"></i></span>
                                                                                        <input type="hidden"><input type="file">
                                                                                    </span>
                                                                                    <a href="#" class="btn fileinput-exists btn-red btn-sm" data-dismiss="fileinput">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <table class="table table-condensed profile-info">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="3">Teacher Information</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Full Name:</td>
                                                                                <td id="name"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Teacher ID:</td>
                                                                                <td id="id"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>DOB:</td>
                                                                                <td id="DOB"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Gender</td>
                                                                                <td id= "gender"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Contact:</td>
                                                                                <td id="contact"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Email</td>
                                                                                <td id="email"></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
															</div>
                                                            <div class="col-sm-12">
                                                            	<div class="row">
                                                                    <div class="form-group col-sm-4">
                                                                    <label for="exampleInputSelectSubject">
                                                                        Select Subject
                                                                    </label>
                                                                    <select id="subject" class="js-example-basic-single js-states form-control" tabindex="-1" style="display: none;">
                                                                      
                                                                	</select>
                                                                	</div>
                                                           		</div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                            	<h5>OR</h5>
                                                            </div>
                                                            <div class="col-sm-12">
                                                            	<div class="row">
                                                                    <div class="form-group col-sm-4">
                                                                    <label for="exampleInputSelectClass">
                                                                        Select Class
                                                                    </label>
                                                                    <select id="asgn_cls" onchange="select_subject(this.value)" class="js-example-basic-single js-states form-control" style="display: none;">
                                                                    <div id="slt_group">
																	
																	
																	</div>
																	
                                                                	</select>
                                                                	</div>
                                                                    <div class="form-group col-sm-4">
                                                                    <label for="exampleInputSelectSubject">
                                                                        Select Subject
                                                                    </label>
                                                                    <select id="sbj" class="js-example-basic-single js-states form-control" tabindex="-1" disabled="disabled" style="display: none;">
                                                                        <option value="Pakistan Studies">Pakistan Studies</option>
                                                                        <option value="Physics">Physics</option>
                                                                        <option value="Math">Math</option>
                                                                        <option value="Chemistry">Chemistry</option>
                                                                        <option value="Biology">Biology</option>
                                                                        <option value="Social Studies">Social Studies</option>
                                                                	</select>
                                                                	</div>
                                                            	</div>
                                                            </div> 
		
															
                                                            <div class="col-sm-12">
                                                            	<a href="#modalwin" class="btn btn-primary btn-o" data-toggle="modal" data-target="#modalwin">
																	Review &amp; Confirm
																</a>
                                                            </div>
													    </div>
                                                    </form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->

					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase" style="color:#1A87FF;">School Management System</span>. <span>All rights reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->
			<div id="off-sidebar" class="sidebar">
				<div class="sidebar-wrapper">
					<ul class="nav nav-tabs nav-justified">
						<li class="active">
							<a href="#off-users" aria-controls="off-users" role="tab" data-toggle="tab">
								<i class="ti-comments"></i>
							</a>
						</li>
						<li>
							<a href="#off-favorites" aria-controls="off-favorites" role="tab" data-toggle="tab">
								<i class="ti-heart"></i>
							</a>
						</li>
						<li>
							<a href="#off-settings" aria-controls="off-settings" role="tab" data-toggle="tab">
								<i class="ti-settings"></i>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="off-users">
							<div id="users" toggleable active-class="chat-open">
								<div class="users-list">
									<div class="sidebar-content perfect-scrollbar">
										<h5 class="sidebar-title">On-line</h5>
										<ul class="media-list">
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<i class="fa fa-circle status-online"></i>
													<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Nicole Bell</h4>
														<span> Content Designer </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<div class="user-label">
														<span class="label label-success">3</span>
													</div>
													<i class="fa fa-circle status-online"></i>
													<img alt="..." src="assets/images/avatar-3.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Steven Thompson</h4>
														<span> Visual Designer </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<i class="fa fa-circle status-online"></i>
													<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Ella Patterson</h4>
														<span> Web Editor </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<i class="fa fa-circle status-online"></i>
													<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Kenneth Ross</h4>
														<span> Senior Designer </span>
													</div>
												</a>
											</li>
										</ul>
										<h5 class="sidebar-title">Off-line</h5>
										<ul class="media-list">
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Nicole Bell</h4>
														<span> Content Designer </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<div class="user-label">
														<span class="label label-success">3</span>
													</div>
													<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Steven Thompson</h4>
														<span> Visual Designer </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<img alt="..." src="assets/images/avatar-8.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Ella Patterson</h4>
														<span> Web Editor </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<img alt="..." src="assets/images/avatar-9.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Kenneth Ross</h4>
														<span> Senior Designer </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Ella Patterson</h4>
														<span> Web Editor </span>
													</div>
												</a>
											</li>
											<li class="media">
												<a data-toggle-class="chat-open" data-toggle-target="#users" href="#">
													<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
													<div class="media-body">
														<h4 class="media-heading">Kenneth Ross</h4>
														<span> Senior Designer </span>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="user-chat">
									<div class="chat-content">
										<div class="sidebar-content perfect-scrollbar">
											<a class="sidebar-back pull-left" href="#" data-toggle-class="chat-open" data-toggle-target="#users"><i class="ti-angle-left"></i> <span>Back</span></a>
											<ol class="discussion">
												<li class="messages-date">
													Sunday, Feb 9, 12:58
												</li>
												<li class="self">
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															Hi, Nicole
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															How are you?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															Hi, i am good
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="self">
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															Glad to see you ;)
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="messages-date">
													Sunday, Feb 9, 13:10
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															What do you think about my new Dashboard?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="messages-date">
													Sunday, Feb 9, 15:28
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															Alo...
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															Are you there?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="self">
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															Hi, i am here
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															Your Dashboard is great
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="messages-date">
													Friday, Feb 7, 23:39
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															How does the binding and digesting work in AngularJS?, Peter?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="self">
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															oh that's your question?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															little reduntant, no?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															literally we get the question daily
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															I know. I, however, am not a nerd, and want to know
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="self">
													<div class="message">
														<div class="message-name">
															Peter Clark
														</div>
														<div class="message-text">
															for this type of question, wouldn't it be better to try Google?
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-1.jpg" alt="">
														</div>
													</div>
												</li>
												<li class="other">
													<div class="message">
														<div class="message-name">
															Nicole Bell
														</div>
														<div class="message-text">
															Lucky for us :)
														</div>
														<div class="message-avatar">
															<img src="assets/images/avatar-2.jpg" alt="">
														</div>
													</div>
												</li>
											</ol>
										</div>
									</div>
									<div class="message-bar">
										<div class="message-inner">
											<a class="link icon-only" href="#"><i class="fa fa-camera"></i></a>
											<div class="message-area">
												<textarea placeholder="Message"></textarea>
											</div>
											<a class="link" href="#">
												Send
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="off-favorites">
							<div class="users-list">
								<div class="sidebar-content perfect-scrollbar">
									<h5 class="sidebar-title">Favorites</h5>
									<ul class="media-list">
										<li class="media">
											<a href="#">
												<img alt="..." src="assets/images/avatar-7.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Nicole Bell</h4>
													<span> Content Designer </span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#">
												<div class="user-label">
													<span class="label label-success">3</span>
												</div>
												<img alt="..." src="assets/images/avatar-6.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Steven Thompson</h4>
													<span> Visual Designer </span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#">
												<img alt="..." src="assets/images/avatar-10.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Ella Patterson</h4>
													<span> Web Editor </span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#">
												<img alt="..." src="assets/images/avatar-2.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Kenneth Ross</h4>
													<span> Senior Designer </span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#">
												<img alt="..." src="assets/images/avatar-4.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Ella Patterson</h4>
													<span> Web Editor </span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#">
												<img alt="..." src="assets/images/avatar-5.jpg" class="media-object">
												<div class="media-body">
													<h4 class="media-heading">Kenneth Ross</h4>
													<span> Senior Designer </span>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="off-settings">
							<div class="sidebar-content perfect-scrollbar">
								<h5 class="sidebar-title">General Settings</h5>
								<ul class="media-list">
									<li class="media">
										<div class="padding-10">
											<div class="display-table-cell">
												<input type="checkbox" class="js-switch" checked />
											</div>
											<span class="display-table-cell vertical-align-middle padding-left-10">Enable Notifications</span>
										</div>
									</li>
									<li class="media">
										<div class="padding-10">
											<div class="display-table-cell">
												<input type="checkbox" class="js-switch" />
											</div>
											<span class="display-table-cell vertical-align-middle padding-left-10">Show your E-mail</span>
										</div>
									</li>
									<li class="media">
										<div class="padding-10">
											<div class="display-table-cell">
												<input type="checkbox" class="js-switch" checked />
											</div>
											<span class="display-table-cell vertical-align-middle padding-left-10">Show Offline Users</span>
										</div>
									</li>
									<li class="media">
										<div class="padding-10">
											<div class="display-table-cell">
												<input type="checkbox" class="js-switch" checked />
											</div>
											<span class="display-table-cell vertical-align-middle padding-left-10">E-mail Alerts</span>
										</div>
									</li>
									<li class="media">
										<div class="padding-10">
											<div class="display-table-cell">
												<input type="checkbox" class="js-switch" />
											</div>
											<span class="display-table-cell vertical-align-middle padding-left-10">SMS Alerts</span>
										</div>
									</li>
								</ul>
								<div class="save-options">
									<button class="btn btn-success">
										<i class="icon-settings"></i><span>Save Changes</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: OFF-SIDEBAR -->
			
		</div>
        <!-- Large Modal -->
        <div class="modal fade bs-example-modal-lg" id="modalwin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Review &amp; Confirm</h4>
                    </div>
                    <div class="modal-body">
                        Do you want to confirm to Assign Subject to Selected Teacher
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Large Modal -->

		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
				
			});
		</script>
        <script>
        	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


		function select_techaer(id){
			
			$.ajax({
              url: "teacher_info/"+id+".txt",
              type: 'GET',
              dataType: 'html',
			success: function (data) {
				
				obj = JSON && JSON.parse(data) || $.parseJSON(data);
				for(var key in obj)
			  {
				  
				  				  if(key=='Full Name'){
					  
					  var name = obj[key];
					  $("#name").html(name);
					  }
				   if(key=='Teacher ID'){
					  
					  var id = obj[key];
					  $("#id").html(id);
					  }	 
					if(key=='DOB'){
					  
					  var dob = obj[key];
					  $("#DOB").html(dob);
					  }			
				  
				  if(key=='Gender'){
					  
					  var gender = obj[key];
					  $("#gender").html(gender);
					  }		
				  if(key=='Contact'){
					  
					  var cont = obj[key];
					  $("#contact").html(cont);
					  }		  
				  if(key=='Email'){
					  
					  var email = obj[key];
					  $("#email").html(email);
					  }			  
				  
				  if(key=='image'){
					  
					  var image = obj[key];
					  $("#img").html(image);
					  $('img').attr('src', image);
					  }	
				  
				  
				  
			  }
				
			}})
		}

		function select_subject(id){
			
			$('#sbj').prop("disabled", false);
			$('#sbject').prop("disabled", true);
			
		}
		
		
        </script>
		<script src="assets/js/ang.js"></script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
