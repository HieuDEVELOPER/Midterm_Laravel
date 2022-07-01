@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="container" method="post" enctype="multipart/form-data" action="@yield('actionForm')">
    @csrf
    @if (@isset($product))
                @method('put')
            @else
                @method('post')
            @endif
    <div class="text-border mt-5">
        <h1 class="text-center col-4">Form</h1>
    </div>

    <div class="col-4">
        <label for="exampleInputEmail1" class="form-label">EnterName</label>
        <input type="text" class="form-control" id="name" name="name" value={{isset($product) ? $product->name : ""}}>
    </div>

    <div class="col-4">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value={{isset($product) ? $product->price : ""}}>
    </div>
    <div class="col-4">
        <label for="exampleInputEmail1" class="form-label">IMG</label>
        <input type="file" class="form-control" id="img" name="img">
    </div>
    <div class="col-4">
        <label for="exampleInputEmail1" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" value={{isset($product) ? $product->description : ""}}>
    </div>
    
   
    <br>

    <br>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
