<div class="row justify-content-center" style="padding: 5rem 0 0 0;">
    <div class="col-md-3">
        <div class="card">
            <h3 class="card-header bg-dark text-light text-center">User login</h3>
            <form action="{{ route('login.request') }}" method="POST" class="card-body border border-1 border-dark rounded-bottom">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <button type="submit" class="btn btn-dark w-100 mt-2 fs-6 fw-semibold">Login</button>
                <div class="text-center pt-1"><a href="{{ route('register') }}">Create a new account?</a></div>
            </form>
        </div>
    </div>
</div>