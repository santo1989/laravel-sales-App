<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Customers
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">customer</li>
    </x-elements.breadcrumb>

    <section class="content">
        <div class="container-fluid">

            @if (session('message'))
                <div class="alert alert-success">
                    <span class="close" data-dismiss="alert">&times;</span>
                    <strong>{{ session('message') }}.</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary" href={{ route('customers.create') }}>Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- customer Table goes here --}}

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Total Order</th>
                                        <th>Pricelist</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->orderCount }}</td>
                                            <td>{{ $customer->pricelist->name }}</td>
                                            
                                            <td>
                                                <a class="btn btn-primary"
                                                    href={{ route('customers.edit', $customer->id) }}>Edit</a>
                                                    
                                                
                                                <form action={{ route('customers.destroy', $customer->id) }}
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
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
