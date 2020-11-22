
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Products Setup</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>   
                <li><span>Products List</span></li>
            </ol>

            <a class="sidebar-right-toggle" ></a>
        </div>
    </header>



    <!-- start: page -->
    <div class="row">

        <div class="col-md-6 col-lg-6 col-xl-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Products List</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add Product <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>


                    <table id="adddependantTbl" class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($products as  $data)
                            <tr class="gradeX">
                                <td><a href="">{{$data->e_assurance_typeID}}</a></td>
                                <td>{{$data->e_name}} </td>
                                <td class="actions">
                                    <a href="#" onclick="viewProduct('{{$data->e_assurance_typeID}}');" class="mb-xs mt-xs mr-xs btn btn-default" data-toggle="tooltip" data-placement="top" title="view product details"><i class="fa fa-eye"></i></a>
<!--                                    <a href="#" onclick="deleteProduct('{{$data->e_name}}');" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-pencil"></i></a>
                                    <a href="#" onclick="deleteProduct('{{$data->e_name}}');" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></a>-->
                                </td>
                            </tr>
                            @endforeach

                            </tr>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="col-md-12">

                <div data-collapsed="0" class="panel">

                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>

                            <h2 class="panel-title">Product Details</h2>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div id="productdetailsDiv" class="row" style="display: none">


                            <div class="col-md-12 form-group">

                                <section class="panel">

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="productDetailsTable" class="table table-striped mb-none">

                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <button type="button" onclick="deleteProduct();" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Refresh product details"> <i class="fa fa-refresh"></i> </button>
                                        <button type="button" onclick="deleteProduct();" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Edit product details"> <i class="fa fa-pencil"></i> </button>
                                        <button type="button" onclick="deleteProduct();" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Delete product"> <i class="fa fa-trash-o"></i> </button>

                                    </div>
                                </section>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>
    </div>

</div>




<!-- end: page -->
</section>


<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name:</label>
                        <input  id="product_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Product Description:</label>
                        <textarea class="form-control" id="product_desc"></textarea>
                    </div>

                    <div class="form-group">
                        <select class="form-control input-sm mb-md" id="product_currency">
                            <option>--Select Currency--</option>
                            <option value="ZWL">ZWL</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>




                    <div class="form-group">
                        <select class="form-control input-sm mb-md" id="prem_contri_type">
                            <option>--Prem/Contribution Type --</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>

                    </div>


                    <div class="form-group">
                        <select class="form-control input-sm mb-md" id="prem_freq">
                            <option>--Premium Frequency --</option>
                            <option value="1">Monthly</option>
                            <option value="3">Quarterly</option>
                            <option value="6">Half Yearly</option>
                            <option value="12">Annualy</option>
                        </select>

                    </div>


                    <div class="form-group">
                        <div class="input-group mb-md">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">C/Premium</button>

                            </span>
                            <input  id="childpremium" type="number"  min="1" step="0.01" class="form-control" placeholder="Child Premium">
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="input-group mb-md">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Premium</button>

                            </span>
                            <input  id="premium" type="number"  min="1" step="0.01" class="form-control" placeholder="Premium">
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="input-group mb-md">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Days</button>

                            </span>
                            <input  id="waitingperiod" type="number" min="1" class="form-control" placeholder="Waiting Period">
                        </div>


                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button  id="btnaddproduct" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
