
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><h2>Admin Dashboard</h2></div>
    </div>
    <div class="row" style="font-size: 1.2rem;">
        <div class="card col-md-3">
            <a href="{{ route('admin.index') }}">
                <div class="card-body">
                    <i class="fas fa-user" ></i>
                    <div class="card-title">User admin</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('file.index') }}">
                <div class="card-body">
                    <i class="fas fa-file"></i>
                    <div class="card-title">Fájl admin</div>
                </div>
            </a>    
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('message.create') }}">
                <div class="card-body">
                    <i class="fas fa-envelope"></i>
                    <div class="card-title">Üzenet admin</div>
                </div>
            </a>
        </div>
    </div>
</div>