<div class="row justify-content-center" style="padding: 5rem 0 0 0;">
    <div class="col-md-3">
        <div class="card">
            <h3 class="card-header bg-dark text-light text-center">User Registration</h3>
            <form action="{{ route('register.request') }}" method="POST" class="card-body border border-1 border-dark rounded-bottom">
                @csrf
                <label for="name">Email</label>
                <input type="text" name="name" class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                <button type="submit" class="btn btn-dark w-100 mt-2 fs-6 fw-semibold">Register</button>
                <div class="text-center pt-1"><a href="{{ route('login') }}">Already have an account?</a></div>
            </form>
        </div>
    </div>
</div>