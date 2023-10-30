<x-layout>

    <div class="container-fluid form-container d-flex justify-content-center align-items-center my-5 ">
        <div class="row">
            <div class="col-12">
                <h1>Log-in</h1>


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-control-cus">
                        <input type="email"  id="email" name="email" required>
                        <label for="email" class="@error('email') is-invalid @enderror ">Email</label>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>

                    <div class="form-control-cus">
                        <input type="password" class=" @error('password') is-invalid @enderror"
                        id="password" name="password" required>
                        <label for="password" class="form-label text-whiteCus">Password:</label>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    



                        {{-- <div class = "mb-3 form-check">
                        
                        <input name = "remember" type  = "checkbox" class  = "form-check-input"  id = "exampleCheck1">
                        
                        <label  class= "form-check-label text-whiteCus" for = "exampleCheck1">  ricordati di me </label>
                        
                    </div> --}}

                    <button type="submit" class="btn btn-main my-3 text-whiteCus login-btn">Log-in</button>

                    <p class="text">{{__('ui.dont have an account')}} <a href="{{ route('register') }}" class="text-whiteCus">{{__('ui.Register')}}</a></p>
                </form>
            </div>
        </div>
                
    </div>
    


</x-layout>
