@extends("parent")

@section("title", "Register Page")

@section('content')
<div class="container">
    <div class="col-4 mx-auto mt-4">
        <div class="card">
            <div class="card-header">Create An Account</div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mt-3">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                        @error('name')
                           <div class="invaild-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="e.g pallavi@gmail.com" class="form-control">
                        @error('email')
                           <div class="invaild-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control">
                        @error('password')
                          <div class="invaild-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for=""> Confirm Password</label>
                        <input type="password" name="password" placeholder="Enter Confirm Password" class="form-control">
                        @error('password')
                          <div class="invaild-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-3">
                    <p class="mb-0">Already have an account?<a href="{{route('login')}}" class="text-primary">Login here..</a></p>
                </div>

                    <div class="mt-3">
                        <input type="submit" name="register" class="btn btn-dark w-100" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
