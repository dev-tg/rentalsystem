<!DOCTYPE html>
<html lang="en">
    <!-- ############ LAYOUT START-->
    <?php
    $this->load->view('include/header.php');
    ?>
    <!-- / -->

    <!-- content -->

    <div ng-controller="ImportController">
        <div id="content" class="app-content box-shadow-z0" role="main" >
            <?php
            $this->load->view('include/menu.php');
            ?>

            <div class='container'>      

                <!--                inline form Starts-->
                <div class="row">
                    <div class =" col-sm-12" ng-show='!editState'   >
                        <div class="box">
                            <div class="box-header">
                                <h2>Request data for Table</h2>
                                
                            </div>
                            <div class="box-divider m-a-0"></div>
                            <div class="box-body p-v-md">
                                <form class="form-inline" name="dataReqForm" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                        <select required="required" class="form-control select2"ng-model="dataReq.year" ng-options="year as year for year in years ">

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

                                    <button ng-disabled="dataReqForm.$invalid" type="submit" class="btn btn-fw info offset-sm-1" ng-click="getImportTableData()">Get Data</button>
                                </form>
                            </div>
                            
                            
                             <!--Uploader Starts-->
                <div class="row" ng-show='!editState'>
                    <div class="box">
                        <form >
                            <div class="col-sm-12">
                                <input type="file" nv-file-select="" uploader="uploader" multiple="">
                                <p>Attached length: {{ uploader.queue.length}}</p>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="50%">Name</th>
                                            <th ng-show="uploader.isHTML5">Size</th>
                                            <th ng-show="uploader.isHTML5">Progress</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat="item in uploader.queue">
                                            <td><strong>{{ item.file.name}}</strong></td>
                                            <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size / 1024 / 1024|number:2 }} MB</td>
                                            <td ng-show="uploader.isHTML5">
                                                <div class="progress" style="margin-bottom: 0;">
                                                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">

                                                <span ng-show="tmpResponce[$index].status === 'TRUESAVE'"><i class="glyphicon glyphicon-ok"></i></span>
                                                <span ng-show="tmpResponce[$index].status != 'TRUESAVE'"><i class="glyphicon glyphicon-remove"></i></span>
                                                <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
                                                <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
                                            </td>
                                            <td class="text-center">
                                                <span ng-show="tmpResponce[$index].status === 'TRUESAVE'">{{tmpResponce[$index].message}}</span>
                                                <span ng-show="tmpResponce[$index].status === 'ERRINPUT'">Data error in Csv file..!!</span>
                                                <span ng-show="tmpResponce[$index].status === 'ERROR'">Please Upload CSV file</span>
                                            </td>
                                            <td nowrap>
                                                <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                                                    <span class="glyphicon glyphicon-upload"></span> Upload
                                                </button>
                                                <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                                                    <span class="glyphicon glyphicon-ban-circle"></span> Cancel
                                                </button>
                                                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                                                    <span class="glyphicon glyphicon-trash"></span> Remove
                                                </button>
                                            </td>   
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <div>
                                        Queue progress:
                                        <div class="progress" >
                                            <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-s" ng-click="uploader.uploadAll()" >
                                        <span class="glyphicon glyphicon-upload"></span> Upload all
                                    </button>
                                    <button type="button" class="btn btn-warning btn-s" ng-click="" >
                                        <span class="glyphicon glyphicon-ban-circle"></span> Cancel all
                                    </button>
                                    <button type="button" class="btn btn-danger btn-s" ng-click="" ng-disabled="">
                                        <span class="glyphicon glyphicon-trash"></span> Remove all
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Uploader ends-->

               
                            
                            
                            
                        </div>
                                     
                <!--table starts -->  <div class='row'>





                 <div class="col-sm-12" ng-show="!editState && importDataTable.length > 0">
                        <div class="box">
                            <div class="box-header">
                                <h2>Imported data</h2>
                            </div>
                            <div class="table-responsive">
                                <table ui-jp="dataTable"  class="table table-striped b-t b-b">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>GT NO</th>
                                            <th>Last Shutdown on</th>
                                            <th>Reason For shutdown</th>
                                            <th>Outage category Code</th>
                                            <th>Start Time in O/C</th>
                                            <th>Stop Time in O/C</th>
                                            <th>Actual Gen in O/C (MU)</th>
                                            <th>Start Up Remark (if any)</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="importData in importDataTable">
                                            <td>{{importData.id}}</td>
                                            <td>{{importData.stationId}}</td>
                                            <td>{{importData.lastShut|date:'dd-MM-YYYY'}}</td>
                                            <td>{{importData.shutReason}}</td>
                                            <td>{{importData.ocCode}}</td>
                                            <td>{{importData.ocStart}}</td>
                                            <td>{{importData.ocStop}}</td>
                                            <td>{{importData.ocActualgen}}</td>
                                            <td>{{importData.statupRem}}</td>
                                            <td ng-click="editImportData(importData)"><span class='glyphicon glyphicon-pencil'></span>

                                            </td>
                                            <td ng-click="deleteImportData(importData)"><span class='glyphicon glyphicon-trash'></span></td>

                                        </tr>    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>






                </div>
                <!--table ends-->
                
                        
                        
                    </div>
                </div>

                <!--                inline form ends-->


               
                <!--Form Start-->
                <div class="padding" >
                    <div class="row">   
                   
                     <!--box-->
                        
                        <div class="col-md-8 offset-md-2"ng-show="editState">
                             <div class="box">
                                <div class="box-header">
                                    <h2>Edit Import data </h2>
                                   
                                </div>
                                <div class="box-divider m-a-0"></div>
                                <div class="box-body">
                                    <form role="form" name="ImportForm">

                                        <div class="form-group">
                                            <label for="default">GT No</label>

                                            <select class="form-control select2" ng-disabled="true" ng-model="importForm.stationId" ng-options="station.id as station.orgName for station in StationsList">
                                                <option value=''>Select GT </option>
                                            
                                                
                                            </select>
                                        </div>

                                        <div>
                                            <div class="form-group col-md-5">
                                                <label for="exampleInputEmail1"> Last Shutdown Date and Time </label> 
                                                <div style="">
                                                    <p class="input-group">
                                                        <input required="required" name="lastShutdt" ng-disabled="true"placeholder="Last Shutdown date  " type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="importForm.lastShut"is-open="LstShtDtToggle" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default" ng-click=" LstShtDtToggle = LstShtDtToggle ? false:true"><i class="glyphicon glyphicon-calendar"></i></button>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <div required="required" name="lastShutTime" ng-disabled="true "uib-timepicker ng-model="importForm.lastShut" ng-change="changed()" hour-step="1" minute-step="1" show-meridian="ismeridian" ></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reason for Shutdown</label>
                                            <input  required="required" name=shutReason type="text" class="form-control" placeholder="Enter Shutdown Reason"ng-model="importForm.shutReason" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" >Outage Category Code </label>
                                            <input ng-disabled="true" type="text" class="form-control "placeholder='Enter Outage Catergory Code ' ng-model="importForm.ocCode" >
                                        </div>

                                        <div>
                                            <div class="form-group col-md-5">
                                                <label for="exampleInputEmail1"> Start Date & Time in O/C </label>
                                                <div style="padding-top: 12px;">
                                                    <p class="input-group">
                                                        <input required="required" name="startDate"placeholder="Start Date" type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="importForm.ocStart" is-open="startDateToggle" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default" ng-click="startDateToggle = startDateToggle ? false:true"><i class="glyphicon glyphicon-calendar"></i></button>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <div name="startTime" required="required" uib-timepicker ng-model="importForm.ocStart" ng-change="changed()" hour-step="1" minute-step="1" show-meridian="ismeridian" ></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group col-md-5">
                                                <label for="exampleInputEmail1"> Stop Date & Time in O/C</label>
                                                <div style="padding-top: 12px;">
                                                    <p class="input-group">
                                                        <input name="stopDate" required="required" placeholder="Last stop date " type="text" class="form-control" uib-datepicker-popup="{{format}}" ng-model="importForm.ocStop" is-open="stopDateToggle" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default" ng-click="stopDateToggle = stopDateToggle ? false:true"><i class="glyphicon glyphicon-calendar"></i></button>
                                                        </span> 
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <div  name="stopTime" required="required"uib-timepicker  ng-change="changed()" hour-step="1" minute-step="1" show-meridian="ismeridian" ng-model="importForm.ocStop" ></div>
                                            </div>
                                        </div>






                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Actual Gen in O/C (MU) </label>
                                            <input textbox ng-disabled="true" placeholder=" Enter Actual Gen in O/C (MU)"class="form-control"ng-model="importForm.ocActualgen"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Start Up Remark (if any) </label>
                                            <input ng-disabled="true" textbox  placeholder=" Enter the Startup Remark"class="form-control" ng-model="importForm.statupRem"  >
                                        </div>

                                        <button type="submit" class="btn white m-b" ng-click="updateImportData()">Submit </button>
                                        <button type="submit" class="btn white m-b" ng-click="editState=false;getImportTableData();">Cancel </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    
                <!--form Ends-->
</div>
            <?php $this->load->view('include/footer.php'); ?>
            <script src="<?php echo base_url(); ?>assets/myjs/ImportController.js"></script>
            <?php $this->load->view('include/mainfooter.php'); ?>
            <!-- ############ LAYOUT END-->
