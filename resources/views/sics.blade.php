
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>SICS -Claims Form</h2>

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
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong> {{ session()->get('message') }}</strong>.
    </div>

   @endif

    @if(session()->has('error'))

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error!</strong>
    </div>
    @endif
    <!-- start: page -->
    <div class="row">
        <form  method="POST"   action="{{url('createclaim')}}" class="form-horizontal form-bordered" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="col-md-6">
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ScopeOfCoverReferenceIdentifier</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="scopeOfCoverReferenceIdentifier" id="scopeOfCoverReferenceIdentifier" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ScopeOfCoverReferenceBeginDateTime</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="scopeOfCoverReferenceBeginDateTime" id="scopeOfCoverReferenceBeginDateTime" required="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimPartialLossStartingDateVersionDay</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="claimPartialLossStartingDateVersionDay" id="claimPartialLossStartingDateVersionDay" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimPartialLossStartingDateVersionMonth</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="claimPartialLossStartingDateVersionMonth" id="claimPartialLossStartingDateVersionMonth" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimPartialLossStartingDateVersionYear</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="claimPartialLossStartingDateVersionYear" id="claimPartialLossStartingDateVersionYear" required="true">
                        </div>
                    </div>





                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-body">



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimsTriggerSubclassDate</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="claimsTriggerSubclassDate" id="claimsTriggerSubclassDate" required="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimTypeCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="claimTypeCode" id="claimTypeCode" required="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ScopeOfCoverRelationClaimAdvisedDate</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="scopeOfCoverRelationClaimAdvisedDate" id="scopeOfCoverRelationClaimAdvisedDate" required="true">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ClaimDispositionDateOfChange</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="claimDispositionDateOfChange" id="claimDispositionDateOfChange" required="true">
                        </div>
                    </div>

                    

                    <div class=" form-group col-md-12 text-right">

                        <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn btn-primary modal-confirm">Submit</button>

                    </div>

                </div>


            </div>


        </form>
    </div>




    <!-- end: page -->
</section>



@include('includes.footer')
