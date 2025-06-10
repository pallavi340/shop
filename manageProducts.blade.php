@extends("admin.adminparent")

@section('title','Manage Products')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Mange Products</h2>
           <a href="" class="btn btn-success">Insert Products</a>
        </div>

        <div class="col-12">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>image</th>
                    <th>title</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>

                @foreach($products as $item)
                 <tr>
                     <td>{{$item->id}}</td>
                     <td><img src="/images/{{$item->image}}" width="40px" alt=""></td>
                     <td>{{$item->title}}</td>
                     <td>{{$item->brand}}</td>
                     <td>₹{{$item->discount_price}}<del>₹{{$item->price}}</del></td>
                     <td>{{$item->category_id}}</td>
                     <td>
                          <div class="btn-group">
                             <a href="" class="btn btn-success">edit</a>
                             <a href="" class="btn btn-info">View</a>
                             <a href="" class="btn btn-danger">X</a>
                          </div>
                      </td>
                    </tr>
               @endforeach
           </table>
        </div>
    </div>
</div>
@endsection