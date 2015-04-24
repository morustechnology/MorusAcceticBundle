
function formDialog(url, callback) {
    var img_url = "{{ asset('MorusAcceticBundle/Resources/public/images/loading.gif') }}";
    alert(img_url);
    loading();
    $dlg = $('<div style="display: none"></div>');
    $screen = $('<img src="../images/loading.gif" />');
    $dlg.append($screen);
    
    $dlg.load($screen, null, function(){
        
    });
    
    // Init New Product Dialog Box
    $dlg.dialog({
        autoOpen: true, height: 220, width: 500, modal: true,
        buttons: {
            'save' : function() {
                postForm($dlg.find('form'), function(response){
                    if (response.success) {
                        callback( 'OK' );
                    }
                });
                $dlg.dialog( "close" );
            },
            'cancel': function() {
                $dlg.dialog( "close" );
            }
        },
        show: { effect: "fade", duration: 500 },
        hide: { effect: "fade", duration: 500 }
    });
    
    // $dlg.load(url).dialog('open');
    
}

// Post Form and get result
function postForm( $form, callback ){

    // Get all form values
    var values = {};
    
    $.each( $form.serializeArray(), function(i, field) {
      values[field.name] = field.value;
    });

    // Throw the form values to the server
    $.ajax({
        type        : $form.attr( 'method' ),
        url         : $form.attr( 'action' ),
        data        : values,
        success     : function(response) {
            callback( jQuery.parseJSON(response) );
        }
    });
}