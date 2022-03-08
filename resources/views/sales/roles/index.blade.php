<x-master>
  <x-elements.breadcrumb>
      <x-slot name="title">
          role
      </x-slot>
      <li class="breadcrumb-item"><a href="#">Product</a></li>
      <li class="breadcrumb-item active">role</li>
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
              <a class="btn btn-primary" href={{ route("roles.create") }}>Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- role Table goes here --}}

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>Sl#</th>
                      <th>Name</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php $sl=0 @endphp
                    @foreach ($roles as $role)
                      <tr>
                          <td>{{ ++$sl }}</td>
                          <td>{{ $role->name }}</td>
                        <td>
                          <a class="btn btn-primary" href={{ route("roles.edit", ['role'=>$role->id]) }}>Edit</a>
                          <form action={{ route("roles.destroy", $role->id) }} method="POST" class="d-inline">
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