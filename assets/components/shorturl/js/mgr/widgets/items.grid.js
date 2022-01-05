
ShortUrl.grid.Items = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'shorturl-grid-items'
        ,url: ShortUrl.config.connectorUrl
        ,baseParams: {
            action: 'mgr/item/getlist'
        }
        ,fields: ['id','url','short', 'clicks']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
            ,hidden: true
        },{
            header: _('shorturl.url')
            ,dataIndex: 'url'
            ,width: 200
        },{
            header: _('shorturl.short')
            ,dataIndex: 'short'
            ,width: 250
        },{
            header: _('shorturl.clicks')
            ,dataIndex: 'clicks'
            ,width: 250
        }]
        ,tbar: [{
            text: _('shorturl.item_create')
            ,handler: this.createItem
            ,scope: this
        },'->',{
            xtype: 'textfield'
            ,id: 'shorturl-search-filter'
            ,emptyText: _('shorturl.search') + '...'
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
    });
    ShortUrl.grid.Items.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl.grid.Items,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        return [{
            text: _('shorturl.item_update')
            ,handler: this.updateItem
        },'-',{
            text: _('shorturl.item_remove')
            ,handler: this.removeItem
        }];
    }

    ,createItem: function(btn,e) {
        this.windows.createItem = MODx.load({
            xtype: 'shorturl-window-item-create'
            ,title: _('shorturl.item_create')
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        this.windows.createItem.fp.getForm().reset();
        this.windows.createItem.show(e.target);
    }

    ,updateItem: function(btn,e) {
        var r = this.menu.record;

        this.windows.createItem = MODx.load({
            xtype: 'shorturl-window-item-update'
            ,title: _('shorturl.item_update')
            ,record: r
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        this.windows.createItem.fp.getForm().reset();
        this.windows.createItem.fp.getForm().setValues(r);
        this.windows.createItem.show(e.target);
    }

    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;

        MODx.msg.confirm({
            title: _('shorturl.item_remove')
            ,text: _('shorturl.item_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/item/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }

    ,search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('shorturl-grid-items',ShortUrl.grid.Items);

ShortUrl.window.CreateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'shorturl-window-item-create';
    Ext.applyIf(config,{
        id: this.ident
        ,height: 200
        ,width: 475
        ,closeAction: 'close'
        ,url: ShortUrl.config.connectorUrl
        ,action: 'mgr/item/create'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,id: this.ident+'-id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('shorturl.url')
            ,name: 'url'
            ,id: this.ident+'-url'
            ,anchor: '100%'
        }]
    });
    ShortUrl.window.CreateItem.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl.window.CreateItem,MODx.Window);
Ext.reg('shorturl-window-item-create',ShortUrl.window.CreateItem);


ShortUrl.window.UpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'shorturl-window-item-update';
    Ext.applyIf(config,{
        id: this.ident
        ,height: 250
        ,width: 475
        ,closeAction: 'close'
        ,url: ShortUrl.config.connectorUrl
        ,action: 'mgr/item/update'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,id: this.ident+'-id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('shorturl.url')
            ,name: 'url'
            ,id: this.ident+'-url'
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('shorturl.short')
            ,name: 'short'
            ,id: this.ident+'-short'
            ,anchor: '100%'
        }]
    });
    ShortUrl.window.UpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl.window.UpdateItem,MODx.Window);
Ext.reg('shorturl-window-item-update',ShortUrl.window.UpdateItem);
