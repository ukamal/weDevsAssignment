(function(){
    
    'use strict';
    
    jQuery(document).ready(function(){
        
        jQuery('.todo').on('click', 'li', function(){
            
            $.post('done.php', {
                id: $(this).data('id')
            }, function(res){
                console.log(res);
            });
            
        });
        
    });
    
    
})();