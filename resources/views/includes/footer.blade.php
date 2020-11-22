</div>

<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Travel Arrangements</h1>
            </div>
            <div class="modal-body">
                <form   id="createnewrequestform">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="tabs">
                        <ul class="nav nav-tabs tabs-primary">
                            <li class="active">
                                <a href="#overview" data-toggle="tab">Trip Details</a>
                            </li>
                            <li>
                                <a href="#edit" data-toggle="tab">Estimated Expenses</a>
                            </li>

                            <li>
                                <a href="#documents" data-toggle="tab">Submit</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="reason" id="reason" placeholder="Reason For Travel">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="destination" data-toggle="tooltip" data-placement="top" title="Destination" placeholder="Destination">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="date" class="form-control input-sm" name="departuredate" data-toggle="tooltip" data-placement="top" title="Departure Date">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="date" class="form-control input-sm" name="returndate" data-toggle="tooltip" data-placement="top" title="Return Date">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="airline" placeholder="Airline Preferred" id="airline" data-toggle="tooltip" data-placement="top" title="Airline">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" placeholder="Seat Preferred eg(Window ,aisle)" id="seat" name="seat" data-toggle="tooltip" data-placement="top" title="Seat Preferred eg(Window ,aisle)">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"  id="car" name="car"> Car Needed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="hotel" id="hotel"> Hotel Needed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="hotelname" id="hotelname" placeholder="Hotel name"  data-toggle="tooltip" data-placement="top" title="Hotel Name">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" placeholder="Number Of Nights"  name="nights" id="nights" data-toggle="tooltip" data-placement="top" title="Number Of Nights">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <p></p>





                            </div>
                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <select id="expensecategory" name="expensecategory" class="form-control mb-md" data-toggle="tooltip" data-placement="top" title="Select Category">
                                                    <option value="">--Select Category--</option>
                                                    <option value="AirFare">AirFare</option>
                                                    <option value="Personal Vehicle">Personal Vehicle</option>
                                                    <option value="Rental Vehicle">Rental Vehicle</option>
                                                    <option value="Other Transportation">Other Transportation</option>
                                                    <option value="Lodging">Lodging</option>
                                                    <option value="Registration Fee">Registration Fee</option>
                                                    <option value="Meals">Meals</option>
                                                    <option value="Other Expenses">Other Expenses</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" id="km" name="km" data-toggle="tooltip" data-placement="top" title="Est Kilometers" placeholder="Est Kilometers">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="descriptionexpense" placeholder="description" id="descriptionexpense" data-toggle="tooltip" data-placement="top" title="description">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" min="0" value="0" step="0.01" name="estcost" id="estcost" data-toggle="tooltip" data-placement="top" title="Est.Cost">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <p></p> 
                                <div>
                                    <i class="glyphicon glyphicon-arrow-down"></i> 
                                    <input id="btnaddtoexpensetable" class="btn btn-success" type="button" value="Add to Expense Table" name="hy" />
                                </div>
                                <p></p> 
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <section class="panel-featured-primary ">
                                            <header class="panel-heading panel-heading-transparent">
                                                <div class="panel-actions">
                                                    <a href="#" class="fa fa-caret-down"></a>
                                                    <a href="#" class="fa fa-times"></a>
                                                </div>

                                                <h2 class="panel-title">Estimated Expenses</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table id="tblexpense" class="table table-striped mb-none">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Kms</th>
                                                                <th>Description</th>
                                                                <th>Cost(Est)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                </div>


                            </div>
                            <div id="documents" class="tab-pane">

                                <!--                                <div class="row">
                                                                    <div class="col-xs-12">
                                
                                                                        <div class="panel-body">
                                                                            <div class="col-lg-12">
                                                                                <div id="msg"></div>
                                                                                <form method="post" id="image-form">
                                                                                    <input style="visibility: hidden; position: absolute;" type="file" name="img[]" class="file" accept="image/*">
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" class="browse btn btn-primary">Browse...</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <div class="form-group">
                                    <div>
                                        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input  type="button" id="btncreatenewrequest"  value="Save" class="btn btn-success"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal HTML Markup -->
<div id="Modaladduder" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Travel Arrangements</h1>
            </div>
            <div class="modal-body">
                <form   id="createnewrequestform">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="tabs">
                        <ul class="nav nav-tabs tabs-primary">
                            <li class="active">
                                <a href="#overview" data-toggle="tab">Trip Details</a>
                            </li>
                            <li>
                                <a href="#edit" data-toggle="tab">Estimated Expenses</a>
                            </li>

                            <li>
                                <a href="#documents" data-toggle="tab">Import supporting documents</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="reason" id="reason" placeholder="Reason For Travel">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="destination" data-toggle="tooltip" data-placement="top" title="Destination" placeholder="Destination">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="date" class="form-control input-sm" name="departuredate" data-toggle="tooltip" data-placement="top" title="Departure Date">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="date" class="form-control input-sm" name="returndate" data-toggle="tooltip" data-placement="top" title="Return Date">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="airline" placeholder="Airline Preferred" id="airline" data-toggle="tooltip" data-placement="top" title="Airline">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" placeholder="Seat Preferred eg(Window ,aisle)" id="seat" name="seat" data-toggle="tooltip" data-placement="top" title="Seat Preferred eg(Window ,aisle)">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"  id="car" name="car"> Car Needed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="hotel" id="hotel"> Hotel Needed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="hotelname" id="hotelname" placeholder="Hotel name"  data-toggle="tooltip" data-placement="top" title="Hotel Name">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" placeholder="Number Of Nights"  name="nights" id="nights" data-toggle="tooltip" data-placement="top" title="Number Of Nights">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <p></p>





                            </div>
                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <select id="expensecategory" name="expensecategory" class="form-control mb-md" data-toggle="tooltip" data-placement="top" title="Select Category">
                                                    <option value="">--Select Category--</option>
                                                    <option value="AirFare">AirFare</option>
                                                    <option value="Personal Vehicle">Personal Vehicle</option>
                                                    <option value="Rental Vehicle">Rental Vehicle</option>
                                                    <option value="Other Transportation">Other Transportation</option>
                                                    <option value="Lodging">Lodging</option>
                                                    <option value="Registration Fee">Registration Fee</option>
                                                    <option value="Meals">Meals</option>
                                                    <option value="Other Expenses">Other Expenses</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" id="km" name="km" data-toggle="tooltip" data-placement="top" title="Est Kilometers" placeholder="Est Kilometers">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="text" class="form-control input-sm" name="descriptionexpense" placeholder="description" id="descriptionexpense" data-toggle="tooltip" data-placement="top" title="description">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div >
                                                <input type="number" class="form-control input-sm" min="0" value="0" step="0.01" name="estcost" id="estcost" data-toggle="tooltip" data-placement="top" title="Est.Cost">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <p></p> 
                                <div>
                                    <i class="glyphicon glyphicon-arrow-down"></i> 
                                    <input id="btnaddtoexpensetable" class="btn btn-success" type="button" value="Add to Expense Table" name="hy" />
                                </div>
                                <p></p> 
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <section class="panel-featured-primary ">
                                            <header class="panel-heading panel-heading-transparent">
                                                <div class="panel-actions">
                                                    <a href="#" class="fa fa-caret-down"></a>
                                                    <a href="#" class="fa fa-times"></a>
                                                </div>

                                                <h2 class="panel-title">Estimated Expenses</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table id="tblexpense" class="table table-striped mb-none">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Kms</th>
                                                                <th>Description</th>
                                                                <th>Cost(Est)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                </div>


                            </div>
                            <div id="documents" class="tab-pane">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <div class="panel-actions">
                                                    <a href="#" class="fa fa-caret-down"></a>
                                                    <a href="#" class="fa fa-times"></a>
                                                </div>

                                                <h2 class="panel-title">File Upload Drag'n Drop</h2>
                                            </header>
                                            <div class="panel-body">
                                                <!--<form action="/upload" class="dropzone dz-square" id="dropzone-example"></form>-->
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input  type="button" id="btncreatenewrequest"  value="Save" class="btn btn-success"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /.modal-->





<div id="modalInfoqq" class="modal">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Information</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fa fa-info-circle"></i>
                </div>
                <div class="modal-text">
                    <h4>Info</h4>
                    <p>This is a information message.</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-info modal-dismiss">OK</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<!-- /.modal-->
</section>

<!-- Vendor -->
<script src="{{asset('template/assets/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('template/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('template/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

<!-- Specific Page Vendor -->
<script src="{{asset('template/assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>



<script src="{{asset('template/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
<script src="{{asset('template/assets/vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('template/assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
<script src="{{asset('template/assets/vendor/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('template/assets/vendor/flot/jquery.flot.categories.js')}}"></script>
<script src="{{asset('template/assets/vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
<script src="{{asset('template/assets/vendor/raphael/raphael.js')}}"></script>
<script src="{{asset('template/assets/vendor/morris/morris.js')}}"></script>
<script src="{{asset('template/assets/vendor/gauge/gauge.js')}}"></script>
<script src="{{asset('template/assets/vendor/snap-svg/snap.svg.js')}}"></script>
<script src="{{asset('template/assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
<script src="{{asset('template/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

<!--
<script src="{{asset('template/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
<script src="{{asset('template/assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('template/assets/vendor/fuelux/js/spinner.js')}}"></script>
<script src="{{asset('template/assets/vendor/dropzone/dropzone.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/lib/codemirror.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/addon/selection/active-line.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/addon/edit/matchbrackets.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script src="{{asset('template/assets/vendor/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('template/assets/vendor/summernote/summernote.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('template/assets/vendor/ios7-switch/ios7-switch.js')}}"></script>-->




<!-- Specific Page Vendor -->
<script src="{{asset('template/assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>

<!-- Examples -->
<script src="{{asset('template/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{asset('template/assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
<script src="{{asset('template/assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
<!-- Examples -->
<script src="{{asset('template/assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
<script src="{{asset('template/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('template/chartjs/utils.js')}}"></script>
<script src="{{asset('template/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="{{asset('template/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('template/assets/javascripts/theme.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('template/assets/javascripts/theme.custom.js')}}"></script>

<script src="{{asset('template/assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('template/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('template/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
<!-- Examples -->
<script src="{{asset('template/assets/javascripts/ui-elements/examples.notifications.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('template/assets/javascripts/theme.init.js')}}"></script>

<script src="{{asset('template/assets/javascripts/forms/examples.wizard.js')}}"></script>
<script src="{{asset('template/pointofsale.js')}}"></script>

</body>
</html>

