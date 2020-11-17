
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Dashboard</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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
                                Search Member
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSuccessOne" class="accordion-body collapse">
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Member">
                                    <small id="emailHelp" class="form-text text-muted">You can search by national ID,name,surname</small>
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

                    <h2 class="panel-title">Principal Members</h2>
                </header>
                <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addagent">Add Principal <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th class="hidden-phone">Phone</th>
                                <th class="hidden-phone">National ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeX">
                                <td><a href="{{url('principalprofile')}}">FBC45236</a></td>
                                <td>Sean
                                  
                                </td>
                                <td>Shumba</td>
                                <td class="center hidden-phone">0772563841</td>
                                <td class="center hidden-phone">41-526398V87</td>
                            </tr>
                            <tr class="gradeC">
                                <td><a href="#">FBC45231</a></td>
                                <td>Tomas
                                </td>
                                <td>Moore</td>
                                <td class="center hidden-phone">073562896</td>
                                <td class="center hidden-phone">74-859632P12</td>
                            </tr>
                            <tr class="gradeA">
                                <td><a href="#">Trident</a></td>
                                <td>Tonny</td>
                                <td>Mhenyu</td>
                                <td class="center hidden-phone">0712563863</td>
                                <td class="center hidden-phone">20-369584X76</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Tinashe</td>
                                <td>Mhofu</td>
                                <td class="center hidden-phone">0771852963</td>
                                <td class="center hidden-phone">41-253698X74</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Blessing</td>
                                <td>Chirombe</td>
                                <td class="center hidden-phone">0773456789</td>
                                <td class="center hidden-phone">31-208556C98</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Trident</td>
                                <td>Romeo</td>
                                <td>Moyo</td>
                                <td class="center hidden-phone">073563896</td>
                                <td class="center hidden-phone">0773563896</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Gecko</td>
                                <td>Takudzwa</td>
                                <td>Nyuke</td>
                                <td class="center hidden-phone">0772456987</td>
                                <td class="center hidden-phone">30-7845236V10</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Gecko</td>
                                <td>Portia</td>
                                <td>Ndlovu</td>
                                <td class="center hidden-phone">0773895632</td>
                                <td class="center hidden-phone">96-875421X89</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Gecko</td>
                                <td>Tanaka</td>
                                <td>Chiwara</td>
                                <td class="center hidden-phone">0775632417</td>
                                <td class="center hidden-phone">20-528963X45</td>
                            </tr>
                            <tr class="gradeA">
                                <td>Gecko</td>
                                <td>Ngoni</td>
                                <td>Mpofu</td>
                                <td class="center hidden-phone">0771563258</td>
                                <td class="center hidden-phone">41-963258D78</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>




    <!-- end: page -->
</section>






@include('includes.footer')
