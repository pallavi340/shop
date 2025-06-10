@extends("admin.adminparent")

@section('title', 'Manage Category')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-9">
            @session('msg')
                <div class="alert alert-danger" role="alert">
                   <p class="small text-danger">{{session('msg')}}</p>
               </div>
            @endsession

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                        <th>Description</th>
                        <th>Parent ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
<!-- Modal -->
<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="editModal " aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModal{{$category->id}}">Edit {{$category->cat_title . "'s Record"}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body">
                    <form action="{{route('admin.updateCategory', $category->id)}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="cat_title" class="form-label">Category Title</label>
                            <input type="text" class="form-control" id="cat_title" name="cat_title" value="{{ $category->cat_title }}" required>
                            @error('cat_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cat_description" class="form-label">Category Description</label>
                            <textarea rows="4" class="form-control" id="cat_description" name="cat_description" required>{{ $category->cat_description }}</textarea>
                            @error('cat_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="parent_category" class="form-label">Parent Category</label>
                            <select name="category_id" class="form-select">
                                <option value="{{$category->category_id}}">Selected : {{ $category->cat_title }}</option>
                                @foreach ($parent_categories as $parentcategory)
                                  <option value="{{ $category->id }}">{{ $parentcategory->cat_title }}</option>
                               @endforeach
                          </select>
                          @error('category_id')
                               <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Create Category" class="w-100 btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
                

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->cat_title }}</td>
                            <td>{{$category->cat_description}}.....</td>
                             <td>{{ $category->parent ? $category->parent->cat_title : NULL}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a data-bs-toggle="modal" href="#editModal{{$category->id}}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('admin.deleteCategory', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                     @csrf
                                      @method('delete')
                                     <button type="submit" class="btn btn-danger">X</button>
                                    </form>
 
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $categories->links() }}
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.createCategory')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cat_title" class="form-label">Category Title</label>
                            <input type="text" class="form-control" id="cat_title" name="cat_title" value="{{ old('cat_title') }}" required>
                            @error('cat_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cat_description" class="form-label">Category Description</label>
                            <textarea rows="4" class="form-control" id="cat_description" name="cat_description" required>{{ old('cat_description') }}</textarea>
                            @error('cat_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="parent_category" class="form-label">Parent Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Parent Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                               @endforeach
                          </select>
                          @error('category_id')
                               <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Create Category" class="w-100 btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
