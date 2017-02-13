<div class="container-fluid">
    <div class="row">
        @if (session('erro'))
           <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                 {!! session('erro') !!}
            </div>
               
            
        @endif
        @if (session('success'))
            <div class="alert alert-success fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                 {!! session('success') !!}
            </div>
               
        @endif
        
    </div>
</div>