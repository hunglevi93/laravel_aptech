<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        .detail-link {
            border: 0;
            color: blue;
        }

        .detail-link:hover {
            border: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h3 class="text-center m-5">Orders</h3>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
        <a href="/admin">Back</a>
            <div class="row">
                <form class="input-group mb-3 col-4" method="post" action="/admin/orders/search">
                    @csrf
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                        aria-describedby="button-addon1" name="search">
                </form>
            </div>
            <div class="cart_inner">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Total</th>
                                <th scope="col">Note</th>
                                <th scope="col">Create At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $item)
                            <tr>
                                <th scope="col">
                                    <form action="/admin/orders/detail" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" name="order_id">
                                        <button type="submit" class="detail-link bg-light">{{$item->id}}</button>
                                    </form>
                                </th>
                                <td scope="col">{{$item->Name}}</td>
                                <td scope="col">{{$item->adress}}</td>
                                <td scope="col">{{$item->phone_number}}</td>
                                <td scope="col">${{$item->total_price}}</td>
                                <td scope="col">{{$item->note}}</td>
                                <td scope="col">{{$item->created_at}}</td>
                                <th scope="col">
                                    <a href="/admin/orders/edit/{{$item->id}}">{{$item->status}}</a>
                                </th>
                                <th scope="col">
                                    <a href="/admin/orders/destroy/{{$item->id}}">Delete</a>
                                </th>
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