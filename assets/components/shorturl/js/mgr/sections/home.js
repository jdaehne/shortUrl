Ext.onReady(function() {
    MODx.load({ xtype: 'shorturl-page-home'});
});

ShortUrl.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'shorturl-panel-home'
            ,renderTo: 'shorturl-panel-home'
        }]
    });
    ShortUrl.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl.page.Home,MODx.Component);
Ext.reg('shorturl-page-home',ShortUrl.page.Home);
