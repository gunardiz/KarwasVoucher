(function($){
    $.fn.Sidepop = function( options ){
        var defaults = {
        };

        var $this = $(this)
            ;

        var clearSidepop = function(){
            $(".side-pop").each(function(){
                if ( $(this).css('position') == 'fixed' ) return;
                $(this).slideUp('fast', function(){});
                $(this).parent().removeClass("active");
            });
        }

        var initSelectors = function(selectors){
            selectors.on('click', function(e){
                e.stopPropagation();
                //$("[data-role=Sidepop]").removeClass("active");

                clearSidepop();
                $(this).parents("div").css("overflow", "visible");

                var $m = $(this).children(".side-pop .sidebar-side-pop");
                if ($m.css('display') == "block") {
                    $m.slideUp('fast');
                    $(this).removeClass("active");
                } else {
                    $m.slideDown('fast');
                    $(this).addClass("active");
                }
            }).on("mouseleave", function(){
                //$(this).children(".Sidepop-menu").hide();
            });
            $('html').on("click", function(e){
                clearSidepop();
            });
        }

        return this.each(function(){
            if ( options ) {
                $.extend(defaults, options)
            }

            initSelectors($this);
        });
    }

    $(function () {
        $('[data-role="Sidepop"]').each(function () {
            $(this).Sidepop();
        })
    })
})(window.jQuery);


(function($){
    $.fn.PullDown = function( options ){
        var defaults = {
        };

        var $this = $(this)
            ;

        var initSelectors = function(selectors){

            selectors.on('click', function(e){
                e.preventDefault();
                var $m = $this.parent().children("ul");
                //console.log($m);
                if ($m.css('display') == "block") {
                    $m.slideUp('fast');
                } else {
                    $m.slideDown('fast');
                }
                //$(this).toggleClass("active");
            });
        }

        return this.each(function(){
            if ( options ) {
                $.extend(defaults, options)
            }

            initSelectors($this);
        });
    }

    $(function () {
        $('.pull-menu, .menu-pull').each(function () {
            $(this).PullDown();
        })
    })
})(window.jQuery);