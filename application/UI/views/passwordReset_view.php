<!DOCTYPE html>
<html lang="en">
    <!-- ############ LAYOUT START-->
    <?php
    $this->load->view('include/header.php');
    ?>
    <!-- / -->

    <!-- content -->

    <div ng-controller="userManagementCtrl">
        <div id="content" class="app-content box-shadow-z0" role="main" >
            <?php
            $this->load->view('include/menu.php');
            ?>
            <div class="row"></div>
            <div class="col-sm-2"></div>       
      <div class="col-sm-7">
          <form name="form" class="form-validation ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-email ng-valid-validator" >
        <div class="box">
          <div class="box-header">
            
            <h2>Reset Password</h2>
          </div>
          <div class="box-body">
           
            
            <div class="row">
              <div class="col-sm-6 m-b">
                <label>Enter password</label>
                <input type="password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="password" ng-model="pwdRst.new_pwd" required="required" ng-change="passwordValidator()" >   
              </div>
              <div class="col-sm-6 m-b">
                <label>Confirm password</label>
                <input type="password" class="form-control ng-pristine ng-untouched ng-valid-validator ng-empty ng-invalid ng-invalid-required" name="confirm_password" required="" ng-model="pwdRst.conf_pwd" ui-validate=" '$value==password' " ui-validate-watch=" 'password' "ng-change="passwordValidator()">
                <span ng-show="!passwordMatched" class="ng-hide">Passwords do not match!</span>
              </div>
            </div>
          
         
          </div>
          <footer class="dker p-a text-right">
              <button type="submit" class="btn btn-info" ng-disabled="form.$invalid || ! passwordMatched"  ng-click="resetPassword()">Submit</button>
          </footer>
        </div>
      </form>
    </div>      
            
            
            
            
    <?php $this->load->view('include/footer.php'); ?>
    <script src="<?php echo base_url(); ?>assets/myjs/userManagementCtrl.js"></script>
    <?php $this->load->view('include/mainfooter.php'); ?>
    <!-- ############ LAYOUT END-->

