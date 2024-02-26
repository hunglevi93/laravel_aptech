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
    <h3 class="text-center m-5">Comment Manager</h3>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <a href="/admin/revenue">Back</a>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $item)
                            <tr>
                                <td scope="col">{{$item->id}}</td>
                                <td scope="col">{{$item->name}}</td>
                                <td scope="col">{{$item->review}}</td>
                                <td scope="col"><a href="/admin/comment/edit/{{$item->id}}">{{$item->status}}</a></td>
                                <td scope="col"><a href="/admin/comment/delete/{{$item->id}}">{{$item->handle}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
    </section>
</body>

</html>