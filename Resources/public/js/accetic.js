(function ( $ ) {
    $.fn.greenify = function() {
        this.css( "color", "red" );
        return this;
    };
        
    $.loading = function( opts ) {
        var options = $.extend({
            message: "<div>Loading</div>"
        }, opts);
        
        $.blockUI({ 
            message: options.message, 
            css: { 
                border: 'none', 
                padding: '5px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: 0.8, 
                color: '#fff'  
            } 
        });
    };
    
    $.dialog = function( opts ) {
        var options = $.extend({
            title       : 'Dialog',
            loading_msg : 'Loading...',
            error_msg   : 'Error connecting server',
            save_btn    : 'Save',
            cancel_btn  : 'Cancel',
            height      : 250,
            width       : 500,
            
            success: function( response ) {}
        }, opts);
        
        // Loading Message
        var loading_msg = "";
        if (typeof options.loading_icon == 'undefined') {
            loading_msg = "<div>" + options.loading_msg + "</div>";
        } else {
            loading_msg = "<div><img src='" + options.loading_icon + "' style='width: 30px' /><br/>" + options.loading_msg + "</div>";
        }
        
        // Init Error Message
        var error_msg = "";
        if (typeof options.loading_icon == 'undefined') {
            error_msg = "<div>" + options.loading_msg + "</div>";
        } else {
            error_msg = "<div><img src='" + options.loading_icon + "' style='width: 30px' /><br/>" + options.loading_msg + "</div>";
        }
         
        // Start popup dialog
        $.loading({ message: loading_msg});
        
        
        $dlg = $('<div style="display: none" title=' + options.title + '></div>');
        $dlg.load(options.url, null, function(){
            $dlg.dialog('open');
        });
        
        var dialog_buttons = {};
        dialog_buttons[options.save_btn] = function() {
            $dlg.find('form').submit(function(event){
                event.preventDefault();
                

                $.loading({ message: loading_msg});

                $form = $dlg.find('form');

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
                    success     : function(response, status, xhr) {
                        
                        //var r = jQuery.parseJSON(response);
                        var ct = xhr.getResponseHeader("content-type") || "";
                        if (ct.indexOf('html') > -1 ) {  // if return is html
                            $.unblockUI();
                            $dlg.find('form').remove();
                            $dlg.append(response);
                        }
                        if (ct.indexOf('json') > -1 ) { // if return is json
                            $dlg.dialog('close');
                            $dlg.dialog('destroy');
                            $.unblockUI();
                            options.success.call(this, jQuery.parseJSON(response));
                        }
                    },
                    error       : function(jqXHR, textStatus, errorThrown){
                        $.loading({message : error_msg});
                        setTimeout($.unblockUI(), 4000); 
                    }
                });
            });
            $dlg.find(':submit').click();
        };
        dialog_buttons[options.cancel_btn] = function() {
            $dlg.dialog( "close" );
            $dlg.dialog( "destroy" );
        };

        $dlg.dialog({
            autoOpen: false, height: options.height, width: options.width, modal: true,
            open: function( event, ui ) {
                $.unblockUI();
            },
            buttons: dialog_buttons,
            show: { effect: "fade", duration: 300 },
            hide: { effect: "fade", duration: 300 }
        });
    };
    
    // Post Form and get result
    function postForm( $form, callback ){
        $.loading();
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
            timeout     : 10000,
            success     : function(response) {
                callback( jQuery.parseJSON(response) );
            },
            error       : function(jqXHR, textStatus, errorThrown){
                $.loading({message : "<div>Error</div>"});
                setTimeout($.unblockUI(), 4000); 
            }
        });
    }
}(jQuery));




