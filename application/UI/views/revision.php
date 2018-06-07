<!DOCTYPE html>
<html lang="en">
    <!-- ############ LAYOUT START-->
    <?php
    $this->load->view('include/header.php');
    ?>
    <!-- / -->

    <!-- content -->
    <div ng-controller="revisionController">
        <div id="content" class="app-content box-shadow-z0" role="main" >
            <?php
            $this->load->view('include/menu.php');
            ?>

            <div class='container'>      


                <div class="row">
                    <div class ="col-sm-12"    >
                        <div class="box">
                            <div class="box-header">
                                <h2> Certificate Revision</h2>


                            </div>
                            <div class="box-divider m-a-0"></div>
                            <div class="box-body p-v-md  offset-sm-3">
                                <form class="form-inline" name="dataReqForm" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <select required="required" class="form-control select2"ng-model="dataReq.year" ng-options="year as year for year in years">

                                            <option value="">Select Year</option> 




                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select required="required" class="form-control select2" ng-model="dataReq.month" ng-options="month.month_no as month.month_name for month in months">
                                                <option value=""> Select Month </select>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                        <select required="required" class="form-control select2" ng-model="dataReq.stationId" ng-options="station.id as station.orgName for station in StationsList">
                                            <option value="">Select GT</option> 

                                        </select>

                                    </div>


                                    <button ng-disabled="dataReqForm.$invalid" type="submit" class="btn btn-info offset-sm-1" ng-click="getRevTableData()">View</button>
                                    <input type="submit" class="btn btn-danger" ng-click="dataReq = {}" value="Cancel">
                                </form>
                            </div>


                            <div class="col" >
                                <div class="box">
                                    <div class="box-header">
                                        <h2> Revision Data</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table ui-jp="dataTable"  class="table table-striped b-t b-b">
                                            <thead>
                                                <tr>    <th>S.NO</th>
                                                    <th>Station name</th>
                                                    <th ng-repeat="certDate in certTableData[0].outage">{{certDate.month}}</th>
                                                    <th ng-if="actionDataVisibility">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat=" certificate in certTableData" >
                                                    <td>{{certificate.0}}</td>
                                                    <td>{{certificate.orgName}}</td>
                                                    <td ng-repeat="outg in certificate.outage">{{outg.value}}</td>
                                                    <td style="width: 87px"><button class="btn btn-outline rounded b-primary text-primary b-2x" ng-click="editRevision(certificate) " data-toggle="modal" data-target="#m-a-a" ui-toggle-class="zoom" ui-target="#animate" ng-if="actionDataVisibility" > <span  class="glyphicon glyphicon-pencil" ></span></button></td>
                                                    <td style="width: 105px"ng-if="actionDataVisibility"> <button ng-click="deleteRevision(certificate)"class="btn btn-outline rounded b-danger text-danger b-2x"><span class="glyphicon glyphicon-trash"></span></button></td>
                                                </tr>    

                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                            </div> 


                        </div>




                    </div>
                </div>








                <!-- .modal -->

                <div id="m-a-a" class="modal fade animate" data-backdrop="true">
                    <div class="modal-dialog" id="animate">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title"> Outage for {{outagemonth}} <a class=" "href="#" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="zoom" ui-target="#animate" ><span style="left: 430px"class=" glyphicon glyphicon-remove-circle "></span></a></h5>

                            </div>
              
                            <div class="modal-body text-center p-lg">
                                <form class="form-inline" name="revisionform">

                                    <div class="form-group">
                                        <label for="outage">Outage:</label>
                                        <input type="text" class="form-control" ng-model="revisionData.outage" name="outage" >

                                    </div>
                                    <div class="row">
                                        <label for="email">Remark:</label>
                                        <div class="form-group">

                                            <textarea style=" margin-top:26px" rows="4" cols="25"ng-model="revisionData.ms_remark" ></textarea>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="modal-footer">

                                <button ng-click="sendRevisionInfo(certificate)"  ng-disabled="revisionform.$invalid" class="btn btn-outline-info" data-dismiss="modal">Save</button>

                            </div>
                        </div><!-- /.modal-content -->
                    </div>
                </div>
                <!-- / .modal -->   
            </div>
            <?php $this->load->view('include/footer.php'); ?>
            <script src="<?php echo base_url(); ?>assets/myjs/revisionController.js"></script>
            <?php $this->load->view('include/mainfooter.php'); ?>
            <!-- ############ LAYOUT END-->
