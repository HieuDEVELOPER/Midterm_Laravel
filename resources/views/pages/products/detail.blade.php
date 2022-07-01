<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
    <link rel="stylesheet" href="../css/showdatabase.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
</head>

<body>
    <div class="container">
        <form class="row g-3">
            <div>product {{ $product['id'] }}</div>
            <div class="d-flex form">
                <div class="col-md-4">
                   <img class="img-thumbnail" src="/images/{{ $product->img }}" width="300px" height="230px">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label"><h2>name</h2></label>
                    <input type="text" class="form-control" id="getName" value="{{ $product['name'] }}">
                     <label for="inputAddress" class="form-label">Price</label>
                    <input type="text" class="form-control" id="getPrice" value="{{ $product['price'] }}">
                    <label for="inputEmail4" class="form-label">Description </label>
                    <input type="text" class="form-control" id="description " value="{{ $product['description'] }}">
                </div>
            </div>
        </form>
      
    </div>
</body>

</html>
