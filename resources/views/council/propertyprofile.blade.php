
@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">

    <header class="page-header">
        <h2>Property Profile - {{$property->sub_name}}</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Property Profile</span></li>
            </ol>

            <a class="sidebar-right-toggle" ></a>


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
        <strong>{{ session()->get('error') }}</strong> 
    </div>
    @endif

    <!-- start: page -->

    <div class="row">
        <div class="col-md-4 col-lg-3">

            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        <img src="{{asset('template/assets/images/!logged-user.jpg')}}" class="rounded img-responsive" alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$property-> pro_owner}}</span>
                            <span class="thumb-info-type">Stand</span>
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
                    <li>
                        <a href="#makepayments" data-toggle="tab">Make Payment</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <h4 class="mb-md">Owener Details</h4>

                        <section class="simple-compose-box mb-xlg">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover  table-borderless mb-none">

                                    <tbody>

                                        <tr>
                                            <td>Stand Number</td>
                                            <td>{{$property->pro_stand_number}}</td>

                                        </tr
                                        <tr>
                                            <td>Owner</td>
                                            <td>{{$property-> pro_owner}}</td>

                                        </tr>

                                        <tr>
                                            <td>Situation</td>
                                            <td>{{$property-> pro_situation}}</td>

                                        </tr>







                                        <tr>
                                            <td>Land use</td>
                                            <td>{{$property-> pro_land_use}}</td>

                                        </tr>
                                        <tr>
                                            <td>Stand Size (sqmeters)</td>
                                            <td>{{$property-> pro_size}}</td>

                                        </tr>
                                        <tr>
                                            <td>Suburb Name</td>
                                            <td>{{$property-> sub_name}}</td>

                                        </tr>
                                        <tr>
                                            <td>Population</td>
                                            <td>{{$property-> sub_population}}</td>

                                        </tr>
                                        <tr>
                                            <td>City name</td>
                                            <td>{{$property-> c_name}}</td>

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

                                    </div>

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






@include('includes.footer')
