<x-layout>

    <div class="container-fluid form-container d-flex justify-content-center align-items-center my-5 ">
        <div class="row">
            <div class="col-12">
                <h1>{{__('ui.Register')}}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-control-cus">
                        <input type="text" class="form-control" id="name" name="name" required>
                        <label for="name"
                            class="form-label @error('name') is-invalid @enderror text-whiteCus">{{__('ui.name')}}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-control-cus">
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="email"class="form-label @error('email') is-invalid @enderror text-whiteCus">Email:</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-control-cus">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                            <label for="password" class="form-label text-whiteCus">Password:</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-control-cus">
                        <input type="password"
                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                            id="confirm-password" name="password_confirmation" required>
                            <label for="password" class="form-label text-whiteCus">{{__('ui.Confirm Password')}}</label>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="login-btn btn my-3">{{__('ui.Register')}}</button>
                    <p class="text">{{__('ui.already have an account')}} <a href="{{ route('login') }}" class="text-whiteCus">Login</a></p>

                </form>
                
            </div>
        </div>

    </div>

</x-layout>
