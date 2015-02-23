<?php
include 'partials/header.php';
?>
        
<?php
include 'partials/sidebar_left.php';
?>    
<style>
select
{
	position: relative;
vertical-align: top;
border: 1px solid #DDD;
display: -moz-inline-stack;
display: inline-block;
color: #626262;
outline: none;
height: 42px;
width: 100%;
}
</style>   

        <!-- Start: Content -->
        <section id="content_wrapper">
          <div id="content" style="padding-top:81px;">
                <div class="row">

                    <div class="col-md-6">

                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Add Student</span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">First Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Middle Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Last Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-lg-3 control-label">Gender</label>
                                        <div class="col-lg-8">
                                            <select class="select">
                                            	<option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date of Birth</label>
                                        <div class="col-md-8">
                                            <div id="datetimepicker1">
                                                <input type="text" class="form-control" style="max-width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Phone</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" class="form-control" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        
                                            <button type="button" class="btn btn-hover btn-primary btn-block" >Add Student</button>
                                    </div>
                                 
                                    
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div>

            </div>
        </section>
        <!-- End: Content -->

<?php
include 'partials/sidebar_right.php';
?> 
    </div>
<?php
include 'partials/footer.php';
?> 