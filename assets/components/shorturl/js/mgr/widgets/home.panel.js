ShortUrl.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('shorturl')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('shorturl.items')
                ,items: [{
                    html: '<p>'+_('shorturl.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'shorturl-grid-items'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    ShortUrl.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl.panel.Home,MODx.Panel);
Ext.reg('shorturl-panel-home',ShortUrl.panel.Home);
