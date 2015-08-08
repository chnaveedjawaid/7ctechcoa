<?php include("include/header.php");?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Staff Data Information</h1>
									<span class="mainDescription">We set out to create an easy, powerful and versatile form layout system. A combination of form styles and the Bootstrap grid means you can do almost anything.</span>
								</div>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<div class="col-sm-12" style="margin-top: 20px;">
                        	<div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="exampleInputSelectTeacher">
                                        Sort Teacher By
                                    </label>
                                    <select class="js-example-basic-single js-states form-control" tabindex="-1" style="display: none;">
                                        <option value="Class">Class</option>
                                        <option value="Name">Name</option>
                                        <option value="Shift">Shift</option>
                                        <option value="Contact">Contact</option>
                                        <option value="P-ID">P-ID</option>
                                    </select>
                               </div>
                        	</div>
                        </div>
                        <div class="col-sm-12">
                            <div class="checkbox clip-check check-primary">
                                <input name="chkbox" type="checkbox" id="checkbox2" value="1" onclick="add_old(this.value)">
                                <label for="checkbox2">
                                    Including Old Staff
                                </label>
                            </div>
                        </div>
                        <!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-striped table-hover" id="myTable">
											<thead>
											
												<tr>
													<th>Full Name</th>
													
													<th>Status</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											
												
												<div id="staff">
											
											
											</div>
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
                        <!-- end: DYNAMIC TABLE -->
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
			
			<div class="modal fade bs-example-modal-lg" id="modalwin4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #fff;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                    	<form action="#" role="form" id="form">
                            <fieldset>
                                <legend>
                                    Account Info
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                First Name
                                            </label>
                                            <input type="text" placeholder="Waqar" class="form-control" id="firstname" name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Last Name
                                            </label>
                                            <input type="text" placeholder="Ahmed" class="form-control" id="lastname" name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Email Address
                                            </label>
                                            <input type="email" placeholder="w_ahmed178@yahoo.com" class="form-control" id="email" name="email">
                                        </div>
                                       	<div class="form-group">
                                            <label for="exampleInputGender">
                                                P-ID
                                            </label>
                                            <input type="text" class="form-control" value="" placeholder="28874" id="Teacher_ID" name="extra7" onkeypress="return isNumber(event)">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Phone
                                            </label>
                                            <input type="text" placeholder="(0213)-624-1420" class="form-control" id="Contact" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Gender
                                            </label>
                                            <div class="clip-radio radio-primary">
                                                <input type="radio" value="female" name="gender" id="us-female">
                                                <label for="us-female">
                                                    Female
                                                </label>
                                                <input type="radio" value="male" name="gender" id="us-male">
                                                <label for="us-male">
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>
                                                Image Upload
                                            </label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"><img id="imgs">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div class="user-edit-image-buttons">
                                                    <span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span><span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
                                                        <input type="file">
                                                    </span>
                                                    <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                                        <i class="fa fa-times"></i> Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
							<div class="row">
                                <div class="col-md-8">
                                    <p>
                                        By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
                                    </p>
                                </div>
								
								
								
								
                                <div class="col-md-4">
                                    <button class="btn btn-primary pull-right" type="submit">
                                        Update <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
			
			
			
		</div>
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
		<script type="text/javascript">
  var count = 0;

  $(document).ready(function() {
    $('table#myTable').dataTable({
      'bFilter': false,
      'bInfo': false,
      'bPaginate': false,
    });
	
	
	$.ajax({
              url: "teacher_info/all_teacher_name.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			 
			//alert(data);
		
			var cont =1;
			for(var key in obj)
			  {
				 if(key=="staff_type"){
				alert('asdas');	 
				 }else{
				//alert('Full_Name'+cont);
			
			var res = obj[key].split("-");		  
			//alert(res[0]);	
	
	
	$('table#myTable').dataTable().fnAddData( [
	  	
      '<tr><td>'+res[0]+'</td>',
	  '<td>Active</td>',
	  '<a href="?id=121#modalwin?id='+res[1]+'" onclick="set_data('+res[1]+')" class="edit-row" data-toggle="modal" data-target="#modalwin4">Edit</a>',
	  '<td><a href="?id='+res[1]+'" class="delete-row">Delete</a></td></tr>'
       ] );
			$('#form').append('<input type="hidden" id="'+res[0]+'" name="'+res[0]+'" value="'+res[1]+'" />');
		
				}
				}
			}
        });
	
	
	

    // Add initial row
    addRow();
  } );

  function addRow() {
    
    count++;
  }

  function deleteRow () {
    if (count != 1) {
        $("table#myTable").dataTable().fnDeleteRow(count - 1);

        count--;
    }
  }
  
  
function set_data(id){
			
			
			$.ajax({
              url: "teacher_info/"+id+".txt",
              type: 'GET',
			  error: function()
				{
				window.location.href = "http://localhost/sms/staff_view.php";
				},
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var len = Object.keys(obj).length;
			  
	  		
			  for(var key in obj)
			  {
				  
	
				  
				  
				if(key=='Full Name'){
					  
					 var name = obj[key];
					 var res = name.split(" ");
					 $('#firstname').val(res[0]);
					 $('#lastname').val(res[1]);
					  }
				if(key=='Email'){
					  
					  $('#email').val(obj[key]);
					  }	
				if(key=='Teacher ID'){
					  
					  $('#Teacher_ID').val(obj[key]);
					  }	
				if(key=='Contact'){
					  
					  $('#Contact').val(obj[key]);
					  }	 
				if(key=='image'){
					  
					  var img = obj[key];
					  $("#img").html(img);
					  $('img').attr('src', img);
					  }	   
				if(key=='Gender'){
					   
					  var Gender = obj[key];
					  if(Gender=='Female'){
						$("#us-female").prop("checked", true);
						}else{
								$("#us-male").prop("checked", true);
							}
					}		  
					  
					  
			}
			  
			
				
			}
        });
		
			
	}
   function add_old(id){
	   
	  if(id==1){
		   
	  $('table#myTable').dataTable().fnAddData( [
	  '<tr><td>'+res[0]+'</td>',
	  '<td>Active</td>',
	  '<a href="?id=121#modalwin?id='+res[1]+'" onclick="set_data('+res[1]+')" class="edit-row" data-toggle="modal" data-target="#modalwin4">Edit</a>',
	  '<td><a href="?id='+res[1]+'" class="delete-row">Delete</a></td></tr>'
       ] ); 
		   
	   
	   $.ajax({
              url: "teacher_info/"+id+".txt",
              type: 'GET',
			  error: function()
				{
				window.location.href = "http://localhost/sms/staff_view.php";
				},
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			}
        });
	   
	   
	   }
   }
  
</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
        
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/table-data.js"></script>
		<!-- end: JavaScript Event Handlers for this page -->
		
		   <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>------>
		    <script src="assets/js/ang.js"></script>
	</body>
</html>
