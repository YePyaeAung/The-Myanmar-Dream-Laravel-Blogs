<x-layout>
    @if (session('login_error'))
        <div class="alert alert-danger text-center">
            {{ session('login_error') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card my-5 py-5 px-3 shadow-sm">
                    <div class="card-header bg-primary border border-0 mb-5"><h3 class="text-center text-white">Login Form</h3></div>
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                            <br>
                            <x-error err='email'/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <br>
                            <x-error err='password'/>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>