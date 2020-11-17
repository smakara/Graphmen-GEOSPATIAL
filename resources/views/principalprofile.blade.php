
@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <input type="hidden" name="global_principleID"  id="global_principleID" value="{{ $principles->a_principleID }}"/>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <header class="page-header">
        <h2>Principal Profile</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Principal Profile</span></li>
            </ol>

            <a class="sidebar-right-toggle" ></a>


        </div>


    </header>

    <!-- start: page -->

    <div class="row">
        <div class="col-md-4 col-lg-3">

            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        <img src="{{asset('template/assets/images/!logged-user.jpg')}}" class="rounded img-responsive" alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$principles->a_firstname}} <br>{{$principles->a_surname}}</span>
                            <span class="thumb-info-type">{{$principles->a_firstname}}</span>
                        </div>
                    </div>

                </div>
            </section>


        </div>
        <div class="col-md-8 col-lg-9">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#edit" data-toggle="tab">Dependencies</a>
                    </li>
                    <li>
                        <a href="#payments" data-toggle="tab">Payment History</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <h4 class="mb-md">Personal Details</h4>

                        <section class="simple-compose-box mb-xlg">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover  table-borderless mb-none">

                                    <tbody>

                                        <tr>
                                            <td>Policy Number</td>
                                            <td>{{$principles->a_account}}</td>

                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$principles->a_firstname}}</td>

                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>{{$principles->a_surname}}</td>

                                        </tr>
                                        <tr>
                                            <td>Employer</td>
                                            <td>{{$principles->a_firstname}}</td>

                                        </tr>
                                        <tr>
                                            <td>National ID</td>
                                            <td>{{$principles->a_IDNumber}}</td>

                                        </tr>
                                        <tr>
                                            <td>DOB</td>
                                            <td> {{$principles->a_birthdate}}</td>

                                        </tr>

                                        <tr>
                                            <td>Phone</td>
                                            <td> {{$principles->a_mobile}}</td>

                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$principles->a_address2}}</td>

                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td> {{$principles->a_address1}}</td>

                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            @if($principles->a_male_female=='1')
                                            <td>Male</td>
                                            @else
                                            <td>Female</td>
                                            @endif
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </section>

                    </div>
                    <div id="edit" class="tab-pane">

                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="fa fa-caret-down"></a>
                                    <a href="#" class="fa fa-times"></a>
                                </div>

                                <h2 class="panel-title">Dependencies</h2>
                            </header>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-md">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Dependant <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped mb-none">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Relationship</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($beneficiaries as $data)
                                            <tr>
                                                <td>{{$data->g_firstname}}</td>
                                                <td>{{$data->g_surname}}</td>
                                                @if($data->g_male_female=='1')
                                                <td>Male</td>
                                                @else
                                                <td>Female</td>
                                                @endif

                                                @if($data->g_beneficiary_typeID=='1')
                                                <td>Child</td>
                                                @else
                                                <td>Spouse</td>
                                                @endif

                                                <td class="actions">
                                                    <a href="#" onclick="editDependantByPrincipal('{{$data->g_beneficiaryID}}');"><i class="fa fa-pencil "></i></a>
                                                    <a href="#" onclick="deleteDependantByPrincipal('{{$data->g_beneficiaryID}}');" class="delete-row"><i class="fa fa-trash-o danger"></i></a>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

                    </div>
                    <div id="payments" class="tab-pane">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="fa fa-caret-down"></a>
                                    <a href="#" class="fa fa-times"></a>
                                </div>

                                <h2 class="panel-title">Payments History</h2>
                            </header>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="panel-body">
                                            <div class="panel-body">
                                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#makepayments">Make Payment <i class="fa fa-plus"></i></button>
                                                <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#printstatement"><i class="fa fa-print"></i> Print Statement </button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped mb-none">
                                        <thead>
                                            <tr>
                                                <th>Transactions ID</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $data)
                                            <tr>
                                                <td>{{$data->n_transactionID}}</td>
                                                <td>{{$data->n_date}}</td>
                                                <td>{{$data->n_amount}}</td>
                                                @if($data->n_debitID >0)
                                                <td><i class="fa fa-check primary"></i></td>
                                                @else
                                                <td></td>
                                                @endif

                                                @if($data->n_creditID >0)
                                                <td><i class="fa fa-check primary"></i></td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end: page -->
</section>

<!-- Modal -->
<div class="modal fade" id="editDependant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Edit Dependant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <form method="post" action="{{url('/editdependant')}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="g_beneficiaryID" id="g_beneficiaryID" />
                        <input type="hidden" name="a_principleID" value="{{ $principles->a_principleID }}"/>
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Dependant</h2>
                        </header>
                        <div class="panel-body">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ename" id="ename" class="form-control" placeholder="Type your name..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" name="esurname" id="esurname" class="form-control" placeholder="Type your surname..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DOB</label>
                                <div class="col-sm-9">
                                    <input type="date" name="edob" id="edob" class="form-control" required placeholder="Type an URL..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w1-password">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control"  id="egender" name="egender" id="dgender">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w1-dbeneficiarytype">Beneficiary Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control"  name="edbeneficiarytype" id="edbeneficiarytype" id="dbeneficiarytype">
                                        <option value="1">Child</option>
                                        <option value="2">Spouse</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                                    <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Add Dependant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <form method="post" action="{{url('/adddependant')}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="a_principleID" value="{{ $principles->a_principleID }}"/>
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Dependant</h2>
                        </header>
                        <div class="panel-body">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Type your name..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" name="surname" class="form-control" placeholder="Type your surname..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DOB</label>
                                <div class="col-sm-9">
                                    <input type="date" name="dob" class="form-control" required placeholder="Type an URL..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w1-password">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control"  name="gender" id="dgender">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="w1-dbeneficiarytype">Beneficiary Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control"  name="dbeneficiarytype" id="dbeneficiarytype">
                                        <option value="1">Child</option>
                                        <option value="2">Spouse</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                                    <button type="submit" class="btn btn-primary modal-confirm">Submit</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal modal-block-primary fade" id="makepayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Payments Details</h2>
                    </header>
                    <div class="panel-body">
                        <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                            <div class="modal-wrapper">
                                <div class="modal-icon">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <div class="modal-text">
                                    Payment Details

                                </div>
                            </div>
                        </form>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm">Submit</button>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="printstatement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Statements</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Statements</h2>
                    </header>
                    <div class="panel-body">
                        <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">From</label>
                                <div class="col-sm-9">
                                    <input type="date" name="name" class="form-control" placeholder="Type your name..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">To</label>
                                <div class="col-sm-9">
                                    <input type="date" name="email" class="form-control" placeholder="Type your surname..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">File Formart</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Pdf</option>
                                        <option>Excel</option>
                                        <option>Text</option>
                                        <option>Csv</option>
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm">Preview</button>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>

        </div>
    </div>
</div>




@include('includes.footer')
