<x-master>
  <x-elements.breadcrumb>
      <x-slot name="title">
          Edit Pricelist
      </x-slot>
      <li class="breadcrumb-item"><a href="#">Pricelist</a></li>
      <li class="breadcrumb-item active">Pricelist</li>
      <li class="breadcrumb-item active">Edit</li>
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
  {{-- <form action="{{ route('pricelists.update') }}" method="post"> --}}
    <form action="{{ route('pricelists.update', ['id' => $pricelist->id]) }}" method="post">
      <div>
        @csrf
        {{-- @method('patch') --}}
        

          <div class="row m-4">
              <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                  <label>Pricelist Name</label>
                  <input type="text" class="form-control" placeholder="Enter Pricelist Name" name="name" value="{{ old('name', $pricelist->name ) }}">
              </div>
              </div>

              <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                  <label>Discounted Percentage</label>
                  <input type="number" class="form-control" placeholder="Enter Discount Percentage" name="discount_percentage" value="{{ old('discount_percentage', $pricelist->discount_percentage ) }}">
              </div>
              </div>
              <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                  <label>Minumum Order</label>
                  <input type="number" class="form-control" placeholder="Enter Minimum Order Number" name="minimum_order" value="{{ old('minimum_order', $pricelist->minimum_order ) }}"/>
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