

@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>My Requests</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>My Requests</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <div class="panel-body">
        <button  id="btnnewrequest" type="button" class="mb-xs mt-xs mr-xs btn btn-success"> <i class="glyphicon glyphicon-plus-sign"></i> New Request</button>
    </div>
    <!-- start: page -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title"> Requests</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>Trip Number</th>
                        <th>Trip Description</th>
                        <th class="hidden-phone">Destination</th>
                        <th>Date Created</th>
                        <th class="hidden-phone">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $data)
                    <tr class="gradeX">
                        <td>
                            <a href="{{url('/myissue/'.$data->iss_id)}}"> {{$data->iss_id}}</a>
                        </td>
                        <td>{{$data->iss_subject}}
                        </td>
                        <td class="center hidden-phone">{{$data->destination}}</td>
                        <td>{{$data->iss_date}}</td>
                        <td class="center hidden-phone">{{$data->iss_status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" action="{{url('/meritsetting')}}" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3><i class="glyphicon glyphicon-plus-sign"></i> New Request</h3>
                    </div>
                    <div class="modal-body">


                        <div class="form-group has-warning col-md-6">
                            <input type="text" class="form-control" placeholder="Name" id="Name">
                        </div>
                        <div class="form-group has-warning col-md-6">

                            <input type="text" class="form-control" id="surname" placeholder="surname">
                        </div>


                        <div class="form-group has-warning col-md-6">
                            <input type="text" class="form-control" id="username" placeholder="username">
                        </div>
                        <div class="form-group has-warning col-md-6" >

                            <input type="text" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="form-group has-warning col-md-12" >

                            <select id="role" class="form-control" id="selectError" data-rel="chosen" >
                                <option>Administrator</option>
                                <option>Head</option>
                                <option>Senior Master</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                            <a href="#" class="btn btn-primary" id="btnsaveuser">Save changes</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="orangeForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-deep-orange">Sign up</button>
                </div>
            </div>
        </div>
    </div>


    <!-- end: page -->
</section>
@include('includes.footer')