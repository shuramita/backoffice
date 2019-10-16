module.exports = {
    dom:{
        sidebar:"#sidebar",
        toggle:"#sidebarCollapse"
    },

    controllers:function(){
        var _m = this;
        return {
            toggle_nav : function(){
                console.log(_m);
                console.log($);
                $(_m.dom.sidebar).toggleClass('active');
            }
        }
    },
    events:function(){
        $(this.dom.toggle).on('click',this.controllers().toggle_nav);
    }

};
