$('body').on('click', '#create-code-submit', function(e) {
    e.preventDefault();
    /** Get Values **/
    var name = $('#code-name').val();
    var type = $('#code-type').attr('data-value');
    var staticurl = '';
    var dynamicurl = '';

    if (type == 'static') {
        var staticurl = $('#code-static-url').val();
    } else if (type == 'dynamic') {
        var dynamicurl = $('#code-dynamic-url').val();
    }

    /** Validate What I can in the browser **/



    console.log(dynamicurl);
});