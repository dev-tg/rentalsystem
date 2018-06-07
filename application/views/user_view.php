<!DOCTYPE html>
<html lang="en">
    <!-- ############ LAYOUT START-->
    <?php
    $this->load->view('include/header.php');
    ?>
    <div ng-controller="authReg" style="background:#f7f7f7 ">

        <div class="row" >
            <div class="container-fluid">
                <div class="col-sm-12" >
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <!--<h6 class="panel-title txt-dark">Login </h6>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in ">
                            <div class="panel-body">
                                <h2 class="col-md-4">Rental System</h2>
                                <div class="form-wrap ">
                                    <form class="form-inline" name="loginForm">
                                        <div class="form-group mr-15">
                                            <label class="control-label mr-10" for="email_inline">User Name:</label>
                                                <input class="form-control" type="text"  ng-model="userLogin.username" placeholder="username">
                                        </div>
                                        <div class="form-group mr-15">
                                            <label class="control-label mr-10" for="pwd_inline">Password:</label>
                                            <input type="password"  ng-model="userLogin.password" class="form-control" id="" placeholder="Password">
                                        </div>
                                        <div class="checkbox mr-15">
                                            <input id="checkbox_inline" type="checkbox">
                                            <label for="checkbox_inline">
                                                remember me
                                            </label>
                                        </div>
                                        <button type="button" ng-click="login()" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Sign in </span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row"style="padding-bottom: 120px;">
                <div class="col-md-4">
                    <img  class="main-logo"src="assets/images/rent_image.svg" alt="">
                </div>
                <div class="col-xs-12 col-md-4 pull-right" style="
                     padding-top: 53px;">
                    <div class="panel panel-default card-view ">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class=" txt-dark">Sign Up</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            
                            <div class="panel-body">
                                <div class="form-wrap">
                                    <form>
                                        <div class="form-group col-md-6">

                                            <input type="text" placeholder="First Name"class="form-control" ng-model="userReg.first_name"  required >

                                        </div>
                                        <div class="form-group col-md-6">

                                            <input type="text" placeholder="Last Name"class="form-control" ng-model="userReg.last_name"   required >

                                        </div>  
                                        <div class="form-group col-md-12" >

                                            <input type="text" class="form-control" ng-model="userReg.username" placeholder="Username" ng-change="checkUser()" ng-pattern="/^[a-zA-Z0-9]{4,10}$/" required >
                                            <span style="color:#f44455"ng-if='userExist'>Username already Exist! </span> 
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input type="email" class="form-control" ng-model="userReg.email_id" required placeholder="Email" >

                                        </div>  
                                        <div class="form-group col-md-6">

                                            <input type="password" class="form-control" name="password" ng-model="userReg.password" required placeholder="Enter Password" >   

                                        </div>  

                                        <div class="form-group col-md-6">

                                            <input type="password" class="form-control" name="confirm_password" required ng-model="confirm_password" ui-validate=" '$value==password' " placeholder="Enter Confirm Password" ui-validate-watch=" 'password' ">
                                            <span ng-show='form.confirm_password.$error.validator'>Passwords do not match!</span>
                                        </div>  

                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" placeholder="Phone Number (XXX) XXXX XXX" ng-model="userReg.contact_number"  required="required" >
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" ng-click="register()" class="btn btn-info" ng-disabled="registration.$invalid || userExist">Go</button>

                                        </div> 

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>  <!--        <div class="center-block">
    -->               









    <?php $this->load->view('include/footer.php'); ?>
    <script src="<?php echo base_url(); ?>assets/myjs/authReg.js"></script>
    <?php $this->load->view('include/mainfooter.php'); ?>
    <!-- ############ LAYOUT END-->

