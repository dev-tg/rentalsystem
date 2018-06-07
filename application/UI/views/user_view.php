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
            <div class="modal fade inactive" id="privilege" data-backdrop="true">
                <div class="right w-xl white b-l">
                    <div class="row-col">
                        <a ng-click="selectAll = false;selectAllMe();" data-dismiss="modal" class="pull-right text-muted text-lg p-a-sm m-r-sm">&times;</a>
                        <div class="p-a b-b">
                            <span class="h5">Privilege</span>
                        </div>
                        <div class="row-row">
                            <div class="row-body">
                                <div class="row-inner">
                                    <div class="list-group no-radius no-borders">
                                        <div class="col-xs-12"ng-repeat="privilege in privilegeList">



                                            <label class="md-check m-y-xs" data-target="folded">
                                                <input type="checkbox" ng-model="privilege.status" class="has-value">
                                                <i class="green"></i>
                                                <span class="hidden-folded">{{privilege.menu_caption}}</span>


                                            </label>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" b-t">
                            <div class="col-xs-12 m-t m-b ">



                                <button class="btn btn-fw success" ng-click="savePrivilege()" data-dismiss="modal">Save Privilege</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
         


           

          
            <!-- Add user show hide-->   
            <div class="row"  style="padding-left: 15px; padding-right: 15px;">
                <div class="col-sm-12">
                     <button class="btn btn-info" ng-click='addStatus = !addStatus;editState = false'> <span ng-show="!addStatus">Add User </span> <span ng-show="addStatus">Back</span></button>
                </div>
               
            </div>
               <div class="row"  style="padding-left: 15px; padding-right: 15px; margin-top: 15px;margin-bottom: 15px;">
                 <div class="col-sm-8 offset-md-2"  ng-show="$scope.usersTable < 1 || addStatus">

                <!--testarea-->
                <!--{{user}}-->

                <!--test area end--> 

                <form name="userform" class="">
                    <div class="box">
                        <div class="box-header">
                            <h2>Register Form</h2>
                        </div>
                        <div class="box-body">


                            <div class="form-group">
                                <label>Organization</label>
                                <div> 

                                    <select ng-model="user.org" ng-options="org.id as org.orgName for org in orgsList" class="form-control "ng-disabled="editState" >

                                        <option value="">--options--</option>

                                    </select>



                                </div>
                            </div>


                            <div class="form-group">
                                <label >Username </label>
                                <div> <input type="text" class=" col-sm-4 form-control" ng-model="user.userName"  required="required" ng-disabled="editState">
                                </div>
                            </div>

                            <div class="form-">
                                <label>First name </label>
                                <input name="firstname" type="text" class="form-control " ng-model="user.firstName" required="required">
                            </div>
                            <div class="form-group">
                                <label>Last Name </label>
                                <input name="lastname" type="text" class="form-control " ng-model="user.lastName"  required="required">
                            </div>

                            <div class="form-group">
                                <label>Email Id </label>
                                <input name="email" type="email" class="form-control " ng-model="user.email" required="required">
                            </div>
                            <div class="row">


                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input name="mobilenum" type="text" class="form-control " placeholder="(XXX) XXXX XXX" maxlength="10" ng-model="user.mobileNum" required="required">
                            </div>

                            <div class="form-group">
                                <label>Alternate Number</label>
                                <input name="mobilenum2" type="text" class="form-control " placeholder="(XXX) XXXX XXX" maxlength="10" ng-model="user.alternateNum"  required="">
                            </div>  

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 form-control-label" >Address 1</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address1" rows="2" ng-model="user.address1" required="required"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 form-control-label" 
                                       ">Address 2</label>
                                <div class="col-sm-10">
                                    <textarea name="address2" class="form-control" rows="2" ng-model="user.address2" ></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city"class="form-control " ng-model="user.city"  required="required">
                            </div>


                        </div>
                        <footer class="dker p-a text-right">


                            <button  class="btn btn-success" ng-click="submitUserData()" ng-disabled="userform.$invalid">{{submitBtn}}</button>


                            <button  class="btn btn-danger" ng-click="user = {};addStatus = false;editState = true">Cancel</button>
                            <button class="btn btn-info" ng-show="editState" data-toggle="modal"  data-target="#privilege" ui-toggle-class="modal-open-aside"  >Select Privilege</button>
                            <button  class="btn btn-warning" ng-show="editState" ng-click="resetDefaultPassword()">Reset Password to Default</button>
                        </footer>
                    </div>

                </form>
            </div> 
            </div>
            <div class="row" style="padding-left: 15px; padding-right: 15px; margin-top: 15px;margin-bottom: 15px;">
                 <div class="col-sm-12">

                <!--tbl-->
                <div class="box" ng-show="!addStatus">
                    <div class="box-header">
                        <h2>User Table</h2>



                    </div>
                    <div class="table-responsive">
                        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="DataTables_Table_2_length"><label>Show <select name="DataTables_Table_2_length" aria-controls="DataTables_Table_2" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="DataTables_Table_2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_2"></label></div></div></div><div class="row"><div class="col-sm-12"><table ui-jp="dataTable" ui-options="{

                                                                                                                                                                                                        }" class="table table-striped b-t b-b dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" >
                                        <thead>
                                            <tr role="row"><th  class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">S.no</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Organization</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">User Name</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Mobile Number</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Alternate Number</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Address 1 </th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Address 2 </th>                                      
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> City</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action </th>     
                                            </tr>



                                            <tr ng-repeat="usr in usersTable" >
                                                <td>{{usr.id}}</td>
                                                <td>{{usr.org}}</td>

                                                <td>{{usr.userName}}</td>
                                                <td>{{usr.email}}</td>

                                                <td>{{usr.mobileNum}}</td>
                                                <td>{{usr.alternateNum}}</td>
                                                <td>{{usr.address1}}</td>
                                                <td>{{usr.address2}}</td>
                                                <td>{{usr.city}}</td>
                                                <!--edit user-->                  <td ng-click="editUser(usr)"><span class="glyphicon glyphicon-pencil"></span></td>
                                                <td ng-click="deleteUser(usr)"><span class="glyphicon glyphicon-trash"></span></td>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="DataTables_Table_2" tabindex="0" id="DataTables_Table_2_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="DataTables_Table_2" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a href="#">5</a></li><li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a href="#">6</a></li><li class="paginate_button next" aria-controls="DataTables_Table_2" tabindex="0" id="DataTables_Table_2_next"><a href="#">Next</a></li></ul></div></div></div></div>
                    </div>
                </div>        




            </div>
            </div>
            
            




           


            <div class="app-footer">
                <div class="p-a text-xs">

                </div>
            </div>
            <div class="app-body" id="view">

                <!-- ############ PAGE START-->
                <!-- only need a height for layout 4 -->
                <div class="container" style="min-height: 200px">


                    <!-- ############ PAGE START-->
                    <div class="padding">

                    </div>

                    <!-- ############ PAGE END-->



                </div>

                <!-- ############ PAGE END-->

            </div>
        </div>
    </div>


    <?php $this->load->view('include/footer.php'); ?>
    <script src="<?php echo base_url(); ?>assets/myjs/userManagementCtrl.js"></script>
    <?php $this->load->view('include/mainfooter.php'); ?>
    <!-- ############ LAYOUT END-->

