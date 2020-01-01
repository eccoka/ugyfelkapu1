<div class="container">
    <div class="row" style="font-size: 1rem;">
        <div class="card col-md-3">
            <a href="{{ route('message.create') }}">
                <div class="card-body">
                    <i class="fas fa-file-upload" ></i>
                    <div class="card-title">Üzenet küldés</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('message.index') }}?buttons=1">
                <div class="card-body">
                    <i class="fas fa-list"></i>
                    <div class="card-title">Üzenet lista</div>
                </div>
            </a>
        </div>
        <div class="card col-md-3 offset-md-1">
            <a href="{{ route('message.index') }}?buttons=2">
                <div class="card-body">
                    <i class="fas fa-trash"></i>
                    <div class="card-title">Üzenet törlés</div>
                </div>
            </a>    
        </div>
    </div>
</div>