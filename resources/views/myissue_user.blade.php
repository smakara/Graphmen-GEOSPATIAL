@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>User Profile</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pages</span></li>
                <li><span>User Profile</span></li>
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
                        <img src="{{asset('template/assets/images/avatar.jpg')}}" class="rounded img-responsive" alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$iss_from}}</span>
                            <span class="thumb-info-type">CEO</span>
                        </div>
                    </div>



                    <hr class="dotted short">

                    <h6 class="text-muted">Trip Detail</h6>
                    <p>{{$subject}}</p>
                    <p>Est. Cost : $ {{$cost}}</p>
                    <div class="clearfix">
                        <!--<a class="text-uppercase text-muted pull-right" href="#">(View All)</a>-->
                    </div>

                    <hr class="dotted short">
                    <label style="font-size: 16px; " class=" bg-danger">Request Status : {{$status}} </label>


                    <!--                    <div class="social-icons-list">
                                            <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                                            <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                            <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                                        </div>-->

                </div>
            </section>



            <!--            <div class="input-group mb-md">
                            <input type="text" class="form-control">
                            <div class="input-group-btn">
                                <button tabindex="-1" class="btn btn-primary" type="button">Action</button>
                                <button tabindex="-1" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                    <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>-->

        </div>
        <div class="col-md-8 col-lg-6">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab">Overview</a>
                    </li>
                    <li>
                        <a href="#edit" data-toggle="tab">Trip Details</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <h4 class="mb-md">Trip : {{$subject}}</h4>

                        <section class="simple-compose-box mb-xlg">


                        </section>

                        <h4 class="mb-xlg">Timeline</h4>
                        <?php $date = ""; ?>
                        <?php ?>

                        <div class="timeline timeline-simple mt-xlg mb-md">
                            @foreach($timeline as $data)
                            <div class="tm-body">
                                <ol class="tm-items">
                                    <li>
                                        <div class="tm-box">
                                            <p class="text-muted mb-none">{{$data->ih_date}}</p>
                                            <p>
                                                The <span class="text-primary">{{$subject}}</span> trip request was Assigned to <span class="text-primary">#{{$data->name}} {{$data->surname}}</span> and the currrent status is : <span class="text-primary">{{$data->ih_status}}</span>
                                            </p>
                                        </div>
                                    </li>

                                </ol>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="edit" class="tab-pane">

                        <form class="form-horizontal" method="get">
                            <h4 class="mb-xlg">Trip Details :({{$subject}}) </h4>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">Destination</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileFirstName" disabled="" value="{{$destination}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileLastName">From - T0</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileLastName" disabled="" value="{{$dates}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileAddress">Airline</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileAddress" disabled="" value="{{$airline}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileCompany">Preferredseat</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileCompany" disabled="" value="{{$preferredseat}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileFirstName">Hotel</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileFirstName" disabled="" value="{{$hotel}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileLastName">No. Nights</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileLastName" disabled="" value="{{$nights}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileAddress">Exp. Category</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileAddress" disabled="" value="{{$expensecategory}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileCompany">Est. Cost</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="profileCompany" disabled="" value="${{$cost}}">
                                    </div>
                                </div>
                            </fieldset>
                            <hr class="dotted tall">


                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">

            <h4 class="mb-md">Travelling Stats</h4>
            <ul class="simple-card-list mb-xlg">
                <li class="primary">
                    <h3>{{$accepted}}</h3>
                    <p>Accepted Trips</p>
                </li>
                <li class="danger">
                    <h3>{{$rejected}}</h3>
                    <p>Rejected Trips</p>
                </li>
                <li class="warning">
                    <h3>{{$pending}}</h3>
                    <p>Pending Trips</p>
                </li>
            </ul>

        </div>

    </div>
    <!-- end: page -->
</section>

@include('includes.footer')