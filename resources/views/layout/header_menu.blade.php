<nav class="flex justify-between items-center mb-4">
    <a href="/">
        <img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo">
    </a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @if (auth()->user()!=null)
        <li>
            <i class="fa fa-solid fa-user-plus"></i> Welcome {{auth()->user()->name}}
        </li>
        <li>
            <a href="/listings/manage" class="hover:text-laravel">
                <i class="fa fa-solid fa-arrow-right-to-bracket"></i>
                Manage Listing
            </a>
        </li>
        <li>
            <a href="/logout" class="hover:text-laravel">
                <i class="fa fa-solid fa-arrow-right-to-bracket"></i>
                Logout
            </a>
        </li>

        @else
        <li>
            <a href="/register" class="hover:text-laravel">
                <i class="fa fa-solid fa-user-plus"></i> Register
            </a>
        </li>
        <li>
            <a href="/login" class="hover:text-laravel">
                <i class="fa fa-solid fa-arrow-right-to-bracket"></i>
                Login
            </a>
        </li>
        @endif

    </ul>
</nav>