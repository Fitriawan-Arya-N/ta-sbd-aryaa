<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav container ">

        <a class="nav-link" href="{{ route('cust_store.index') }}">Customer</a>

        <a class="nav-link" href="{{ route('supplier.index') }}">Supplier</a>

        <a class="nav-link" href="{{ route('furniture.index') }}">Furniture</a>

        <a class="nav-link" href="{{ route('users.index') }}">User</a>
        <a class="nav-link" href="{{ route('gabung.index') }}">Join Table</a>

        <div class="ms-auto">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </div>
                
            </div>

        </div>
    </div>
</nav>