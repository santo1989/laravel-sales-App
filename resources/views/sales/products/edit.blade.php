<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Edit Product
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">Product</li>
        <li class="breadcrumb-item active">Edit</li>
    </x-elements.breadcrumb>


    <section class="content">
    <div class="container-fluid">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              
              <form action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="{{ old('name', $product->name ) }}">
                  </div>

                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description" >{{ old('description', $product->description) }}</textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter ..." name="price" value="{{ old('price', $product->price ) }}" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="quantity"  value="{{ old('quantity', $product->quantity ) }}">
                      </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Box Quantity</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="box_quantity"  value="{{ old('box_quantity', $product->box_quantity ) }}">
                    </div>
                    </div>

                  
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="picture">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>

                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
    </div>
    </section>


</x-master>


<script>
    // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

    //   Date picker JS
</script>
