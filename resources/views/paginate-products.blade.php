<table class="table">
    <thead>
    <tr>
        <th >Sl</th>
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
