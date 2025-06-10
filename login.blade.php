@extends("parent")

@section("title","login page")

@section('content')
<div class="container">
    <div class="col-4 mx-auto mt-4">
        <div class="card">
            <div class="card-header">Login Here</div>
            <div class="card-body">
                @session('msg')
                 <p>{{session('msg')}}</p>
                @endsession
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="mt-3">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="e.g pallavi@gmail.com" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="text" name="password" placeholder="e.g ********" class="form-control">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="login" class="btn btn-dark w-100">
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p class="mb-0">Don't have an account?<a href="{{route('register')}}" class="text-primary">Create new account</a></p>
                </div>
            </div>
        </div>

    </div>
</div>







@endsection