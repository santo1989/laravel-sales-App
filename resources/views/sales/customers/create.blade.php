<x-master>
    
    
    <section class="content">
    <div class="container-fluid">
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
       
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
      
         <div class="row">
          <div class="form-row">
    
            <div class="form-group col-md-6">
                <label for="name">Name</label>
              <input type="text" name="name" class="form-control"  placeholder="First name" value="{{ old('name') }}">
            </div>

            <input type="hidden" name="pricelist_id" value="1">
    
    
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ old('email') }}" placeholder="Email">
          </div>
          
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" value="" placeholder="Address" value="{{ old('address') }}">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Phone</label>
          <input type="number" name="phone" class="form-control" id="inputAddress2" value="" placeholder="Enter Your Phone Number" value="{{ old('phone') }}">
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
       
    </form>
    </section>
    </div>
    </x-master>