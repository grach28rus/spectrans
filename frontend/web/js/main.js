var StickyElement = function(node){
    var doc = $(document),
        fixed = false,
        anchor = node.find('.anchor'),
        content = node.find('#nav-trans');

    var onScroll = function(e){
        var docTop = doc.scrollTop(),
            anchorTop = anchor.offset().top;

        console.log('scroll', docTop, anchorTop);
        if(docTop > anchorTop){
            if(!fixed){
                anchor.height(content.outerHeight());
                content.addClass('navbar-fixed-top');
                fixed = true;
            }
        }  else   {
            if(fixed){
                anchor.height(0);
                content.removeClass('navbar-fixed-top');
                fixed = false;
            }
        }
    };

    $(window).on('scroll', onScroll);
};

var action = new StickyElement($('#float-nav-bar'));
