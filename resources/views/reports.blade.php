
@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Reports</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Reports</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Report</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="get">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" placeholder=".col-sm-2">
                                    </div>
                                    <div class="visible-xs mb-md"></div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" placeholder=".col-sm-3">
                                    </div>
                                    <div class="visible-xs mb-md"></div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary modal-confirm">Load Report</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>



        </div>

    </div>




    <!-- end: page -->
</section>

<!-- Modal -->
<div class="modal fade" id="addagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h2 class="panel-title">Add Agent</h2>
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
                                    <input type="text" name="email" class="form-control" placeholder="Type your surname..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="Type your Phone..." required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="Type your Email..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Premium</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="Type your Premium..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Child Premium</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="Type your Premium..." required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Commision</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="Type your Commision..." required/>
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
