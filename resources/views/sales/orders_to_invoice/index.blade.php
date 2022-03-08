<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Order to Invoice
        </x-slot>
        <li class="breadcrumb-item">Orders</li>
        <li class="breadcrumb-item active">Order to Invoice</li>
    </x-elements.breadcrumb>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                <a class="btn btn-primary" href="#">Create</a>
              </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- Order-to-invoice Table goes here --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Order to Invoice</h3>

                                                <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" name="table_search"
                                                            class="form-control float-right" placeholder="Search">

                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">

                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                     
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table class="table table-head-fixed text-nowrap table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Order Date</th>
                                                        <th>Customer</th>
                                                        <th>Sales Person</th>
                                                        <th>Next Activiy</th>
                                                        <th>Total</th>
                                                        <th>Invoice Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>Order 1</th>
                                                        <th>Customer 1</th>
                                                        <th>Sales 11111</th>
                                                        <th>Ghum</th>
                                                        <th>10000</th>
                                                        <th>Invoice Status</th>
                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</x-master>


<script>
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
