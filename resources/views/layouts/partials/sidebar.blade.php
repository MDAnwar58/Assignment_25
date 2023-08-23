<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="pt-3 sticky-top">
        {{-- <div class=" bg-secondary w-100 px-4 py-3 d-flex">
            <div class="img">
                <img src="{{ url('assets/images/profile.png') }}" 
                class="border border-2 rounded-circle"
                style="width: 50px; height: 50px;" alt="">
            </div>
            <div class="d-flex align-items-center">
                <a href="" class="text-light text-decoration-none ps-3">Profile</a>
            </div>
        </div> --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.user') ? 'active' : '' }}" href="{{ route('admin.user') }}">
                    Employee
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.leave_category') ? 'active' : '' }}" href="{{ route('admin.leave_category') }}">
                    Leave Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.leave_request') ? 'active' : '' }} {{ Route::is('admin.leave_request.create') ? 'active' : '' }} {{ Route::is('admin.leave_request.edit') ? 'active' : '' }} {{ Route::is('admin.leave_request.show') ? 'active' : '' }}" href="{{ route('admin.leave_request') }}">
                    Leave Request
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.leave_balance') ? 'active' : '' }}" href="{{ route('admin.leave_balance') }}">
                    Leave Balances
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.leave_report') ? 'active' : '' }}" href="{{ route('admin.leave_report') }}">
                    Reports
                </a>
            </li>
        </ul>
    </div>
</nav>
