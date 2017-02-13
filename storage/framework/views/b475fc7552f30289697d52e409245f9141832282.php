<div class="row">
    <?php if(session('erro')): ?>
       <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
             <?php echo session('erro'); ?>

        </div>
           
        
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
             <?php echo session('success'); ?>

        </div>
           
    <?php endif; ?>
    
</div>