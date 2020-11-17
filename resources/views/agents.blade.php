
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Agents</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Agents</span></li>
            </ol>

            <a class="sidebar-right-toggle" ></a>
        </div>
    </header>



    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordionSuccess">
                <div class="panel panel-accordion panel-accordion-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSuccess" href="#collapseSuccessOne">
                                Search Agent
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSuccessOne" class="accordion-body collapse">
                        <div class="panel-body">
                            <form  method="post" action="{{url('searchagent')}}" id="loginform">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="searchagent" name="searchagent" placeholder="Search Agent">
                                    <small id="emailHelp" class="form-text text-muted">You can search by email,name,surname ,phone</small>
                                </div>


                                <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus"></i> Search </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-lg-12 col-xl-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Agents</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addagent">Add Agent <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>Agent ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
<!--                                <th class="hidden-phone">Premium</th>
                                <th class="hidden-phone"> Child Premium</th>-->
                                <th class="hidden-phone">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $data)
                            <tr class="gradeX">
                                <td><a href="{{url('agentprofile/'.$data->d_agentID)}}">{{$data->d_agentID}}</a></td>
                                <td>{{$data->d_name}}</td>
                                <td>{{$data->d_email}}</td>
                                <td>{{$data->d_mobile}}</td>
<!--                                <td class="center hidden-phone">{{$data->d_agentID}}</td>
                              <td class="center hidden-phone">{{$data->d_agentID}}</td>-->
                                <td class="actions">
                                    <a href="#"  onclick="editAgent('{{$data->d_agentID}}');"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
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



<!-- Modal -->
<div class="modal fade" id="editagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <form method="post" action="{{url('editagentdata')}}" id="demo-form" class="form-horizontal mb-lg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                          <input type="hidden" name="d_agentID" id="d_agentID" value="{{ csrf_token() }}"/>
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Agent</h2>
                        </header>
                        <div class="panel-body">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="eaname" id="eaname" class="form-control" placeholder="Type your name..." required="true"/>
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="eaphone" id="eaphone" class="form-control" placeholder="Type your Phone..." required="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="eaemail" id="eaemail" class="form-control" placeholder="Type your Email..." required="true"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">

                                    <select id="eacity" name="eacity" class="form-control form-control-sm" required="true">
                                        <option value="Harare">Harare</option>
                                        <option value="Bulawayo">Bulawayo</option>
                                        <option value="Gweru">Gweru</option>
                                        <option value="Mutare">Mutare</option>
                                        <option value="Kwekwe">Kwekwe</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
<div class="modal fade" id="addagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="panel">
                    <form method="post" action="{{url('addagent')}}" id="demo-form" class="form-horizontal mb-lg">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Agent</h2>
                        </header>
                        <div class="panel-body">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Type your name..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" name="surname" id="surname" class="form-control" placeholder="Type your surname..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Type your Phone..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Type your Email..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">

                                    <select class="form-control form-control-sm">
                                        <option>Harare</option>
                                        <option>Bulawayo</option>
                                        <option>Gweru</option>
                                        <option>Mutare</option>
                                        <option>Kwekwe</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">

                                    <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

        </div>
    </div>
</div>






@include('includes.footer')
