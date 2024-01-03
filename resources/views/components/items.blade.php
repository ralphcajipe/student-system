<ul class="flex flex-col md:flex-row px-4">
    @auth
        <li>
            <a href="/add/student" class="py-2 pr-4 pl-3 flex items-center">
                <span class="material-icons text-white mr-1">
                    add
                </span>
                Add Student
            </a>
        </li>
        <li>
            <form action="/logout" method="POST">
                <!-- Cross Site Request Forgery -->
                @csrf
                <button class="block py-2 pr-4 pl-3 flex items-center">
                    <span class="material-icons text-white mr-1">
                        logout
                    </span>
                    Logout
                </button>
            </form>
        </li>
    @else
        <li>
            <a href="/login" class="block py-2 pr-4 pl-3">
                Sign In
            </a>
        </li>
        <li>
            <a href="/register" class="block py-2 pr-4 pl-3">
                Sign Up
            </a>
        </li>
    @endauth
</ul>
