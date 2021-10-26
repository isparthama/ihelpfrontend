$.ajaxPrefilter( function(options) {
    var url     = options.url;
    var check   = url.split('/');
    if(check[0] !== 'backend') {
        options.url = '/backend/'+options.url;
    }
});