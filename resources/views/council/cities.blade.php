
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>City Management</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>City Management</span></li>
            </ol>

            <a class="sidebar-right-toggle"></a>
        </div>
    </header>



    <!-- start: page -->
    <div class="row">
        <!--        <div class="col-md-12">
                    <div class="panel-group" id="accordionSuccess">
                        <div class="panel panel-accordion panel-accordion-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSuccess" href="#collapseSuccessOne">
                                        Search City
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSuccessOne" class="accordion-body collapse">
                                <div class="panel-body">
                                    <form  method="post" action="{{url('searchmember')}}" id="loginform">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="searchvalue" name="searchmember" placeholder="Search Member">
                                            <small id="emailHelp" class="form-text text-muted">You can search by national ID,name,surname</small>
                                        </div>
        
        
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus"></i> Search </button>
                                    </form>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>-->
        <div class="col-md-12 col-lg-12 col-xl-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>

                    <h2 class="panel-title">City Management</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmember">Add City <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th class="center">City ID</th>
                                <th class="center">City Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as  $data)
                            <tr class="gradeX">
                                <td class="center"><a href="{{url('city/suburbs/'.Crypt::encrypt($data->c_id))}}">{{$data->c_id}}</a></td>
                                <td class="center">{{$data->c_name}}

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>




    <!-- end: page -->
</section>
<!--

 Modal 
<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Create Principal Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width:800px ;overflow-x: auto;  max-height:800px; overflow-y: auto;">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel form-wizard" id="w1">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                    <a href="#" class="fa fa-caret-down"></a>
                                    
                                </div>

                                <h2 class="panel-title"> Principal Member Registration  Wizard</h2>
                            </header>
                            <div class="panel-body panel-body-nopadding">
                                <div class="wizard-tabs">
                                    <ul class="wizard-steps">
                                        <li class="active">
                                            <a href="#w1-account" data-toggle="tab" class="text-center">
                                                <span class="badge hidden-xs">1</span>
                                                Personal Information 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#w1-profile" data-toggle="tab" class="text-center">
                                                <span class="badge hidden-xs">2</span>
                                                Products
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#w1-confirm" data-toggle="tab" class="text-center">
                                                <span class="badge hidden-xs">3</span>
                                                Dependencies
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form id="registrationformwizard" class="form-horizontal" novalidate="novalidate">

                                    <div class="tab-content">
                                        <div id="w1-account" class="tab-pane active">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-username">First Name(s)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="fname" id="w1-fname" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-surname">Surname</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="surname" id="w1-surname"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-password">National ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="natid" id="w1-natid"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-phone">Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="phone" id="w1-phone"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-email">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control input-sm" name="email" id="w1-email"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-password">Gender</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control"  name="gender" id="w1-gender">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-dob">D.O.B</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control input-sm" name="dob" id="w1-dob" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-city">City</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="city" id="w1-city"  required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label" for="w1-address">Address</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control input-sm" name="address" id="w1-address"  required> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="w1-profile" class="tab-pane">
                                            <div class="form-group">

                                                <br>
                                                <div class="col-sm-6">


                                                    <div class="checkbox-custom checkbox-primary">
                                                        <input type="checkbox"  name="product" id="hcp"  value="hcp" >
                                                        <label for="checkboxExample2">Hospital Cash Plan</label>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">


                                                    <div class="checkbox-custom checkbox-primary">
                                                        <input type="checkbox" name="product" id="fcp"  value="fcp">
                                                        <label for="checkboxExample2">Funeral  Cash Plan</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="w1-confirm" class="tab-pane">
                                            <div class="form-group">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        <div class="panel-actions">
                                                            <a href="#" class="fa fa-caret-down"></a>
                                                        </div>

                                                        <h2 class="panel-title">Dependencies</h2>
                                                    </header>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-md">
                                                                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddependantOnReg">Add Dependant <i class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <table id="adddependantTbl" class="table table-striped mb-none">
                                                                <thead>
                                                                    <tr>

                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th>Relationship</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>


                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <ul class="pager">
                                    <li class="previous disabled">
                                        <a><i class="fa fa-angle-left"></i> Previous</a>
                                    </li>
                                    <li class="finish hidden pull-right">
                                        <a>Finish</a>
                                    </li>
                                    <li class="next">
                                        <a>Next <i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


 Modal 
<div class="modal fade" id="adddependantOnReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Dependent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Add Dependent</h2>
                    </header>
                    <div class="panel-body">
                        <form id="adddependant-form" class="form-horizontal mb-lg" novalidate="novalidate">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="dname" name="dname" class="form-control" placeholder="Type your name..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dsurname" id="dsurname" class="form-control" placeholder="Type your surname..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DOB</label>
                                <div class="col-sm-9">
                                    <input type="date" name="ddob" id="ddob" class="form-control" placeholder="Type an URL..." />
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

                        </form>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">

                                <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                                <button id="btn-adddependantOnReg" class="btn btn-primary modal-confirm">Add Depedent</button>

                            </div>
                        </div>
                    </footer>
                </section>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div >
                    
                      <label><i class="fa fa-info-circle"  style="font-size:48px;color:orange"></i>  Select at least one Product</label>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>-->

@include('includes.footer')
