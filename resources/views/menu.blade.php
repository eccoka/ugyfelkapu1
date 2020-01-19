<div class="container">
    <div class="row" style="font-size: 1.2rem;">
        <div class="card col-md-3">
            <a href="{{ route('personal') }}">
                <div class="card-body">
                    <i class="fas fa-user" ></i>
                    <div class="card-title">Adatmódosítás</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('files') }}">
                <div class="card-body">
                    <i class="fas fa-file"></i>
                    <div class="card-title">Dokumentumok</div>
                </div>
            </a>    
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('messages') }}">
                <div class="card-body">
                    <i class="fas fa-envelope"></i>
                    <div class="card-title">Üzenetek</div>
                </div>
            </a>
        </div> 
    </div>
</div>