
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>SICS -Create Business Form</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('sics')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>SICS</span></li>
            </ol>

            <a class="sidebar-right-toggle"></a>
        </div>
    </header>


    @if(session()->has('message'))


    <div class="alert alert-primary">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
        <strong> {{ session()->get('message') }}</strong>.
    </div>

    @endif

    @if(session()->has('error'))

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">?</button>
        <strong>Error!</strong>
    </div>
    @endif
    <!-- start: page -->
    <div class="row">
        <form method="POST" action="{{url('createbusiness')}}" class="form-horizontal form-bordered" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="col-md-6">
                <div class="panel-body">


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Insured Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="title" id="title" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Level Of Business</label>
                        <div class="col-md-7">
                            <select class="form-control" id="businessDirectionCode" name="businessDirectionCode" required="true">
                                <option value="IAB">Inward Assumed Business</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Type Of Business Code</label>
                        <div class="col-md-7">



		<select class="form-control" id="typeOfBusinessCode" name="typeOfBusinessCode" required="true">
			<option value="PROPFAC">Proportional Facultative</option>
			<option value="NONPROPFAC">Non Proportional Facultative</option>
			<option value="PROPTTY">Proportional Treaty</option>
			<option value="NONPROPTTY">Non Proportional Treaty</option>
		</select>
		</div>
		</div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Underwriting Year</label>
                        <div class="col-md-7">
                            <select class="form-control" name="IPUnderwritingYear" id="IPUnderwritingYear" required="true">
                                <option>2020</option>
                                <option>2021</option>
                                <option>2019</option>
                                <option>2018</option>
                                <option>2019</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Start Date</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="startdate" id="startdate" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">End Date</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="enddate" id="enddate" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Business Partner</label>
                        <div class="col-md-7">
                            <select class="form-control" name="identifierCR" id="identifierCR" required="true">
                                <option value="A2">Zimnat</option>
                                <option value="111005">FBC INSURANCE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Currency</label>
                        <div class="col-md-7">
                            <select class="form-control" name="currency" id="currency" required="true">
                                <option value="ZWL">ZWL</option>
                                <option value="USD">USD</option>
                                <option value="ZAR">ZAR</option>
                                <option value="BWP">BWP</option>
                                <option value="GBP">GBP</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Premium Type</label>
                        <div class="col-md-7">
                            <select class="form-control" name="limPremCondRefPremiumTypeCode" id="limPremCondRefPremiumTypeCode" required="true">
                                <option value="PF_PROP">Proportional Facultative</option>
                                <option value="NPF_SLID">Non Proportional Facultative</option>

                            </select>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Liability Limit</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondAmount" id="limPremCondAmount" required="true">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Premium Amount</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondCurrencyForLimitPremiumMinimumHundredPercent" id="limPremCondCurrencyForLimitPremiumMinimumHundredPercent" required="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Number Of Instalments</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondInstalmentConditionNumberOfInstalments" id="limPremCondInstalmentConditionNumberOfInstalments" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Insured Identifier</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifierIR" id="identifierIR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Offered Share %</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="OfferedSharePerc" id="OfferedSharePerc" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Written Share %</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="WrittenSharePerc" id="WrittenSharePerc" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Deduction Commission Percent</label>
                        <div class="col-md-7">
                            <input type="number" step="1" class="form-control" name="deductionCommissionPercent" id="deductionCommissionPercent" required="true">
                        </div>
                    </div>



                    <div class=" form-group col-md-12 text-right">

                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn btn-primary modal-confirm">Submit</button>

                    </div>

                </div>


            </div>


        </form>
    </div>




    <!-- end: page -->
</section>



@include('includes.footer')
