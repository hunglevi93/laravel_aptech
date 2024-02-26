<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">

    </style>
</head>

<body>
    <h3 class="text-center m-5">Order Detail</h3>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
        <a href="/admin/orders">Back</a>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Sale price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order_detail as $item)
                            <tr>
                                <td scope="col">{{$item->id}}</td>
                                <td scope="col">{{$item->name}}</td>
                                <td scope="col">
                                    <div class="d-flex">
                                        <img width='100' src="{{asset($item->img)}}" alt="">
                                    </div>
                                </td>
                                <td scope="col">&nbsp;&nbsp;&nbsp;${{$item->saleprice}}</td>
                                <td scope="col">&nbsp;&nbsp;&nbsp;{{$item->Quantity}}</td>
                                <td scope="col">&nbsp;&nbsp;&nbsp;${{$item->price_total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </section>
</body>

</html>