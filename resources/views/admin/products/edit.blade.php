<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .backlink{
            display: block;
            text-align: center;
            margin-bottom: 50px;
        }
        .backlink:hover{
            cursor: pointer;
        }
        span{
            color: red
        }
    </style>
</head>

<body>
    <h1 class="text-center my-5">Add product</h1>
    <div class="container">
        <form method="POST" action="/admin/products/update/{{$products->id}}">
            @method('PATCH')
            @csrf       
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Code</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Code" placeholder="Code" value='{{$products->code}}'>
                <span>{{ $errors->first('Code') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Name" placeholder="Name" value='{{$products->name}}'>
                <span>{{ $errors->first('Name') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="Description">{{$products->description}}</textarea>
                <span>{{ $errors->first('Description') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Image link</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Image" placeholder="Image link" value='{{$products->img}}'>
                <span>{{ $errors->first('Image') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Old price</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="oldprice" placeholder="Old price" value='{{$products->oldprice}}'>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Sale price</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="saleprice" placeholder="Sale price" value='{{$products->saleprice}}'>
                <span>{{ $errors->first('saleprice') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Type</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="type" placeholder="Type" value='{{$products->type}}'>
                <span>{{ $errors->first('type') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Color</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="color" placeholder="Color" value='{{$products->color}}'>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Status</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="status" placeholder="Status" value='{{$products->status}}' >
                <span>{{ $errors->first('status') }}</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Quantity</label>
                <input type="number" min="0" class="form-control" id="exampleFormControlInput1" name="quantity" placeholder="Quantity" value='{{$products->quantity}}'>
            </div>
            <div class="my-5">
                <input type="submit" class="form-control btn-primary" value="Save">
            </div>
        </form>
        <a class="backlink" href="{{ route('products_display') }}">Back</a>
    </div>

</body>

</html>
</body>
</html>