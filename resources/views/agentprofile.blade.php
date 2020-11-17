
@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Agent Profile</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Agent Profile</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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
                            <span class="thumb-info-inner">{{ str_limit($agent->d_name, $limit = 14, $end = '...') }}</span>
                            <span class="thumb-info-type">Agent</span>
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
                        <a href="#edit" data-toggle="tab">Login Credentials</a>
                    </li>
                    <li>
                        <a href="#payments" data-toggle="tab">Total Premiums</a>
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
                                            <td>Name</td>
                                            <td>{{$agent->d_name}}</td>

                                        </tr>


                                        <tr>
                                            <td>Phone</td>
                                            <td> {{$agent->d_mobile}}</td>

                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$agent->d_email}}</td>

                                        </tr>


                                        <tr>
                                            <td>Employer</td>
                                            <td> FBC</td>

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

                                <h2 class="panel-title">Login Details</h2>
                            </header>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-3 control-label">UserName</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" placeholder="Type your UserName..." required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="email" class="form-control" placeholder="Type your Password..." value="qwertyuiop" disabled="true"/>
                                            </div>
                                        </div>


                                    </form>

                                    <div class="mb-md">
                                        <button  type="button" class="btn btn-success" ><i class="fa fa-refresh"></i> Reset Password </button>
                                    </div>
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

                                <h2 class="panel-title">Total Premiums</h2>
                            </header>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-md">
                                                <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#printstatement"><i class="fa fa-print"></i> Print Statement </button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped mb-none">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Member Premiums</th>
                                                <th>Dependant Premiums</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Registered</td>
                                                <td>180.00</td>
                                                <td>120.00</td>
                                                <td class="actions">
                                                    <a href=""><i class="fa fa-pencil"></i></a>
                                                    <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Add Dependant</h2>
                    </header>
                    <div class="panel-body">
                        <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Type your name..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="Type your surname..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DOB</label>
                                <div class="col-sm-9">
                                    <input type="date" name="url" class="form-control" placeholder="Type an URL..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Relationship</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" class="form-control" placeholder="Type your Relationship ..." required></textarea>
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
