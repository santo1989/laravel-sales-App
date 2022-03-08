<x-master>
<section class="content">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
            </div>
        </div>
    </div>
       
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
       
    <form action="{{ route('customers.update',['customer' => $customer->id]) }}" method="POST">
        @csrf
        @method('patch')
         <div class="row">
          <div class="form-row">
    
            <div class="form-group col-md-6">
                <label for="name">Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name ) }}" placeholder="First name">
            </div>
    
    
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ old('email',$customer->email ) }}"  placeholder="Email">
          </div>
          
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" value="{{ old('address',$customer->address ) }}"  placeholder="Address">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Phone</label>
          <input type="number" name="phone" class="form-control" id="inputAddress2" value="{{ old('phone',$customer->phone ) }}"  placeholder="Enter Your Phone Number">
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" id="pricelist_id" name="pricelist_id">
        <option selected>Choose...</option>
            @foreach($pricelists as $pricelist)
            
            <!-- <option value="{{ $pricelist->id }}">{{ $pricelist->name }}</option> -->
            <option value="{{ $pricelist->id }}"   {{ $pricelist->id == $customer->pricelist_id ? 'selected' : '' }} >{{ $pricelist->name }}</option>
            
            @endforeach
        </select>
        <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Options</label>
        </div>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </div>
       
    </form>
    </section>
</x-master>