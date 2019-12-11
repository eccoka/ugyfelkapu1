<div class="container">
    <div class="row" style="font-size: 1rem;">
        <div class="card col-md-3">
            <a href="{{ route('admin.create') }}">
                <div class="card-body">
                    <i class="fas fa-user-plus" ></i>
                    <div class="card-title">Admin létrehozás</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('admin.show') }}">
                <div class="card-body">
                    <i class="fas fa-user-minus"></i>
                    <div class="card-title">Admin törlés</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <div class="card-body">
                <i class="fas fa-user-slash"></i>
                <div class="card-title">User törlés</div>
            </div>
        </div>
    </div>
</div>