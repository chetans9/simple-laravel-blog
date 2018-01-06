/**
 *
 * @description : facebook Share SDK Initialise. this file is imported whenever we need fb share
 */


// Initialise
window.fbAsyncInit = function() {
    FB.init({
        appId            : 'YOUR_APP_ID',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.11'
    });
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



$(document).ready(function(){

    $(".share-item").click(function(e){
        var share_item_desc = "Check out this blog";
        var share_item_name = "Blog writer";
        var share_item_link = window.location.href;
        var share_object = {
            'og:title': share_item_name,
            'og:description': share_item_desc,
            'og:url' : share_item_link
        };


        FB.ui({
            method: 'share_open_graph',
            action_type: 'og.shares',
            display: 'popup',
            //href: 'https://developers.facebook.com/docs/',
            action_properties: JSON.stringify({
                object:share_object,
            })
        }, function(response){});

    });

});