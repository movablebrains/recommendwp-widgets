(function($){
    $(document).on('panelsopen', function(e){
        var dialog = $(e.target);
        if ( !dialog.has('.siteorigin-widget-form-main-rwp-features-widget') ) return;
        
        /* $('.siteorigin-widget-field-icon_image').find('select').each(function(e){
            var $this = $(this);
            test($this);
            $this.bind('change', function(){
                test($(this).val());
            });
            $this.trigger('change');
        }); */
        foundIt();
    });
    $(document).ready(function(){
        foundIt();
    });
    //https://wordpress.stackexchange.com/questions/130084/executing-javascript-when-a-widget-is-added-in-the-backend
    $(document).on('widget-updated widget-added', function(){
        foundIt();
    });
    $(document).ajaxStop(function(){
        foundIt();
    });
    function foundIt() {
        var widgetID = $('.siteorigin-widget-field-repeater-item');
        widgetID.each(function(e){
            var $this = $(this);
            var selectThis = $this.find('div[class*=icon_image]').find('select');
            switch(selectThis.val()) {
                case 'image':
                    $this.find('.siteorigin-widget-field-icon').hide();
                    $this.find('.siteorigin-widget-field-icon_color').hide();
                    $this.find('.siteorigin-widget-field-icon_size').hide();
                    $this.find('.siteorigin-widget-field-image').show();
                    break;
                case 'icon':
                default:
                    $this.find('.siteorigin-widget-field-image').hide();
                    $this.find('.siteorigin-widget-field-icon').show();
                    $this.find('.siteorigin-widget-field-icon_size').show();
                    $this.find('.siteorigin-widget-field-icon_color').show();
                    break;
            }
            selectThis.on('change', function(){
                selection = $(this).val();
                // console.log(selection);
                switch(selection) {
                    case 'image':
                        $this.find('.siteorigin-widget-field-icon').hide();
                        $this.find('.siteorigin-widget-field-icon_color').hide();
                        $this.find('.siteorigin-widget-field-icon_size').hide();
                        $this.find('.siteorigin-widget-field-image').show();
                        break;
                    case 'icon':
                    default:
                        $this.find('.siteorigin-widget-field-image').hide();
                        $this.find('.siteorigin-widget-field-icon').show();
                        $this.find('.siteorigin-widget-field-icon_size').show();
                        $this.find('.siteorigin-widget-field-icon_color').show();
                        break;
                }
            });
        });
    }
})(jQuery);