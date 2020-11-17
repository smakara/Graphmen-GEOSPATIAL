
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
                    <div id="container" style="width: 100%;">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </section>

        </div>

    </div>




    <!-- end: page -->
</section>





@include('includes.footer')
