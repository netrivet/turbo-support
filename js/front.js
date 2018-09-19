function setCookie(name, value, days) {
  var d = new Date;
  d.setTime(d.getTime() + 24*60*60*1000*days);
  document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}

(function($) {
  $('#turbo_search_version_selector').find('input').on('change', function(e) {
    if (!e.currentTarget.checked) {
      return;
    }

    var version = e.currentTarget.value;
    setCookie('pp_user_version', version, 90);
  });
})(jQuery);
