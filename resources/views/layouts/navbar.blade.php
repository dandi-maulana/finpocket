<nav class="navbar navbar-expand-lg navbar-dark shadow"
    style="
    background: linear-gradient(135deg, 
    #97B7E9 30%, 
    #22416E 70%, 
    #111E30 100%);
">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <span>FinPocket</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link fw-medium {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="fas fa-chart-line me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-medium {{ request()->is('users') ? 'active' : '' }}" href="/users">
                        <i class="fas fa-users me-1"></i> Users
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-medium {{ request()->is('transaction') ? 'active' : '' }}"
                        href="/transaction">
                        <i class="fas fa-exchange-alt me-1"></i> Transactions
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fw-medium {{ request()->is('category') ? 'active' : '' }}" href="/category">
                        <i class="fas fa-wallet me-1"></i> Category
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>

                </li>
            </ul>
        </div>
    </div>
</nav>
