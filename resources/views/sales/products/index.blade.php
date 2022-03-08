<x-master>

    

    <x-elements.breadcrumb>
      <x-slot name="title">
          Products
      </x-slot>
      <li class="breadcrumb-item"><a href="#">Product</a></li>
      <li class="breadcrumb-item active">Products</li>
  </x-elements.breadcrumb>

{{-- end --}}


<section class="content">
    <div class="container-fluid">
        <div>
    <a href={{ route("products.create") }} class="btn btn-primary mb-2">Create</a>
        </div>
   @if (session('message'))
    <div class="alert alert-success">
        <span class="close" data-dismiss="alert">&times;</span>
        <strong>{{ session('message') }}.</strong>
    </div>
@endif 
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>{{ $product->name }}</b></h5><br>
                <div class="card-text mb-1"><small style="font-size: 15px;">Price: {{ $product->price }}</small><br/>
                <small style="font-size: 15px;">Per Box: {{ $product->box_quantity }}</small><br/>
                <small  style="font-size: 15px;">Quantity: {{ $product->quantity }}</small></div>
                <a href={{ route("products.show", ['product'=> $product->id]) }} class="btn btn-primary">Details</a>
                <form style="display:inline" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    
                    <button onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger" type="submit">Delete</button>
                </form>
                
            </div>
            </div>
        </div>
        @endforeach

        <!-- <div class="col-md-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Maxpro 20</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Details</a>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </div>
            </div>
        </div> -->
        
        
    </div>
    </div>

    </section>

</x-master>
