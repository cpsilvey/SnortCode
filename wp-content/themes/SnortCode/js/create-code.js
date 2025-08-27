$('body').on('click', '#create-code-submit', function(e) {
    e.preventDefault();
    /** Get Values **/
    var name = $('#code-name').val();
    var type = $('#code-type').attr('data-value');
    var url = $('#code-url').val();
    var error = '';
    /** Validate **/
    if (!name) {
        $('#code-name').addClass('error');
        error = 'true';
    }
    if (!url || !isValidUrl(url)) {
        $('#code-url').addClass('error');
        error = 'true';
    }
    
    if (error !== 'true') {
        $('#overlay').addClass('active');
        var data = {
            'name': name,
            'type': type,
            'url': url,
            'action': 'create_code',
          };
        
          jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: ajaxurl,
          data: data,
            dataType: 'json',
              success: function(data){
                var redirect = data.redirect;
                window.location.replace(redirect);
            },
          });
    }
});

function isValidUrl(url) {
    var pattern = new RegExp('^(https?:\\/\\/)?' + // http or https
      '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain...
      '((\\d{1,3}\\.){3}\\d{1,3}))' + // ...or IP
      '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
      '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
      '(\\#[-a-z\\d_]*)?$', 'i'); // fragment
    return !!pattern.test(url);
}