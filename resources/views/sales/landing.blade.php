<x-master>


    <!-- Content Header (Page header) -->
    <x-elements.breadcrumb>
        <x-slot name="title">Dashboard</x-slot>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard v1</li>
    </x-elements.breadcrumb>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $ordersToday ?? '0'}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalCustomers ?? '0'}}</h3>

                <p>Total Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $newCustomersToday ?? '0'}}</h3>

                <p>Today's New Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalEarningToday ?? '0' }}</h3>

                <p>Today Earings</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
          <section >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Monthly Report
                </h3>
                <!-- <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      
                      <th>Month</th>
                      <th>Total Sale</th>
                      <th>Total Amount</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    
                   @foreach($monthlyDatas as $monthlyData)
                      <tr>
                   @foreach($monthlyData as $key => $value)
                      
                        <td>{{$value}}</td>
                        @endforeach
                        <!-- <td>
                          <a class="btn btn-primary" href='#'>Edit</a>
                          <form action='#' method="POST" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </td> -->
                      </tr>
                      @endforeach
                  
                  </tbody>
                </table>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!-- /.card -->
          </section>
        </div>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <div class="col-md-4 alert alert-info">
            <h3>Notifications</h3>
            @foreach ($notifications as $notification)
              <a href="{{ $notification->link }}" >
                <div style="border:1px solid black;  background-color: {{ $notification->color }}">
                <p style="color:'black'">{{ $notification->name }}</p>
                <p style="color:'black'">{{ $notification->created_at->diffForHumans() }}</p>
              </div>
            </a>
            @endforeach
          </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-master>