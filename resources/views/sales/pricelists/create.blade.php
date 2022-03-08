<x-master>
  <x-elements.breadcrumb>
      <x-slot name="title">
          Create Pricelist
      </x-slot>
      <li class="breadcrumb-item"><a href="#">Pricelist</a></li>
      <li class="breadcrumb-item active">Pricelist</li>
      <li class="breadcrumb-item active">Create New</li>
  </x-elements.breadcrumb>


  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
  <form action="{{ route('pricelists.store') }}"  method="post">
      <div>
         @csrf
          <div class="row m-4">
              <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                  <label>Pricelist Name</label>
                  <input type="text" class="form-control" placeholder="Enter Pricelist Name" name="name">
              </div>
              </div>

              <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                  <label>Discounted Percentage</label>
                  <input type="number" class="form-control" placeholder="Enter Discount Percentage" name="discount_percentage">
              </div>
              </div>
              <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                  <label>Minumum Order</label>
                  <input type="number" class="form-control" placeholder="Enter Minimum Order Number" name="minimum_order">
              </div>
              </div>
              
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
      </div>
    </form>


</x-master>


<script>
      // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

  //   Date picker JS
</script>