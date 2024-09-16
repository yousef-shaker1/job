<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin_index') }}">Job Board</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin_index') }}">Home</a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('section_index') }}">Section</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('jobs_index') }}">Jobs</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('user_index') }}">Users</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('hr_index') }}">Hr</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('blog_index') }}">Blogs</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('Customer_Messages_index') }}">Customer Messages</a>
                </li> 
                
                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="nav-link" >
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>