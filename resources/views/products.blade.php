<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>AJAX CRUD</title>
</head>
<body>
 <div class="container">
     <div class="row">
         <div class="col-md-8 mx-auto ">
             <h3 class="mt-5 text-center">Products</h3>
             <a href="" class="btn btn-warning my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
             <input type="text" id="search" class="form-control mb-3" placeholder="search here...">
             <div class="table-data">
                 <table class="table table-bordered">
                     <thead>
                     <tr>
                         <th >#</th>
                         <th >Product Name</th>
                         <th >Price</th>
                         <th >Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @php $i=1 @endphp
                     @foreach($products as $product)
                         <tr>
                             <td>{{ $i++ }}</td>
                             <td>{{$product->name}}</td>
                             <td>{{$product->price}}</td>
                             <td>
                                 <a href="" class="btn btn-success updateProduct"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    data-id="{{$product->id}}"
                                    data-name="{{$product->name}}"
                                    data-price="{{$product->price}}">
                                     <i class="las la-edit"></i></a>

                                 <a href="" class="btn btn-danger delete-product"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{$product->id}}"
                                 ><i class="las la-trash"></i></a>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
                 {{ $products->links() }}
             </div>

         </div>
     </div>
 </div>






 @include('products_js')
 @include('update_products_js')
 @include('delete_products_modal')
 @include('add_product_modal')
 {!! Toastr::message() !!}
</body>
</html>
