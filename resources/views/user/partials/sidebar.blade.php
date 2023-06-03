<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3"> User Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">   
    <li class="nav-item "> <a class="nav-link" href="{{ route('quiz.index')}}">List</a></li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="fas fa-cogs"></i>
            </span>
            <span class="menu-title">Quiz Question</span>
    
            <i class="menu-arrow"></i>
        </a>
    <li class="nav-item "> <a class="nav-link" href="{{ route('quizquestion.create')}}">Create</a></li>
    
</ul>