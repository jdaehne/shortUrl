var ShortUrl = function(config) {
    config = config || {};
    ShortUrl.superclass.constructor.call(this,config);
};
Ext.extend(ShortUrl,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('shorturl',ShortUrl);
ShortUrl = new ShortUrl();
