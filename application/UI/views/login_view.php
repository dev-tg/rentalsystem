<?php
$this->load->view('include/header.php');
?>
<div class="center-block w-xxl w-auto-xs p-y-md ng-scope" ng-controller="loginCtrl">
    <div class="navbar">
        <div class="pull-center">
            
           
            <!-- brand -->
            <a class="navbar-brand ng-scope">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                    <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
                    <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
                    <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
                </svg>
                <!--<img src="../assets/images/logo.png" alt="." class="hide">-->
                    <span class="hidden-folded inline ng-binding">NRPCOCC</span>
            </a>
            <!-- / brand -->
        </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
        <div class="m-b text-sm ng-binding">
            Sign in with your NRPCOCC Account
        </div>
        <form name="form" class="ng-pristine ng-valid-email ng-invalid ng-invalid-required">
            <div class="md-form-group float-label">
                <input type="text" class="md-input ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required" ng-model="user.username">
                    <label>Email</label>
            </div>
            <div class="md-form-group float-label">
                <input type="password" class="md-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" ng-model="user.password" required="">
                    <label>Password</label>
            </div>      
            <div class="m-b-md">        
                <label class="md-check">
                    <input type="checkbox"><i class="primary"></i> Keep me signed in
                </label>
            </div>
            
            <input ng-click="login()" class="btn primary btn-block p-x-md" type="button" value="submit"></input>
            
        </form>
    </div>

    <div class="p-v-lg text-center">
        <div class="m-b"><a href="" class="text-primary _600">Forgot password?</a></div>
        <div>Do not have an account? <a href="" class="text-primary _600" >Sign up</a></div>
    </div>
</div>




<?php $this->load->view('include/footer.php'); ?>
<script src="<?php echo base_url(); ?>assets/myjs/logincontroller.js"></script>
<?php $this->load->view('include/mainfooter.php'); ?>
