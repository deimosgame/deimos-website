// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();


$(document).ready(function()
{
	$('form.ajaxed').on('submit', function() {
 
        $.ajax({
            url: $(this).attr('action'), 
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(json) {
                
            }
        });

        return false; // j'empêche le navigateur de soumettre lui-même le formulaire
    });
});