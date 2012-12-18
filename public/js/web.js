Date.prototype.getFullMonth = function () {
  switch(this.getMonth()){
    case 0: return 'Gennaio';
    case 1: return 'Febbraio';
    case 2: return 'Marzo';
    case 3: return 'Aprile';
    case 4: return 'Maggio';
    case 5: return 'Giugno';
    case 6: return 'Luglio';
    case 7: return 'Agosto';
    case 8: return 'Settembre';
    case 9: return 'Ottobre';
    case 10: return 'Novembre';
    case 11: return 'Dicembre';
  }
}

$(function() {

  var date_from_index = function(index) {
    var d = new Date();
    d.setMonth(d.getMonth()+parseInt(index));
    return new Date(d);
  }

  var new_month = function(type){
    var $from = (type == 1) ? $('#timeline .t-month:last-child') : $('#timeline .t-month:first-child');
    var $c = $from.clone();
    $c.attr('data-index', parseInt($c.attr('data-index')) + parseInt(type));
    var d = date_from_index($c.attr('data-index'));
    $('.year', $c).html(d.getFullYear());
    $('.month', $c).html(d.getFullMonth());
    $('.payments', $c).html('<ul/>').load('month/load/' + $c.attr('data-index'));
    return (type == 1) ? $c.insertAfter($from) : $c.insertBefore($from);
  }

  $("#timeline").mousewheel(function(event, delta) {
    $(this).stop(true, true).animate({
        scrollTop: '-=' + (delta * 50)
      }, 100);
    if (delta > 0) {
      var first = $('#timeline .t-month:first-child');
      if (first.position().top >= -40) {
        first = new_month(-1);
        $(this).stop(true, true).animate({
          scrollTop: '+=' + (first.height())
        }, 1);
      }
    } else {
      var last = $('#timeline .t-month:last-child');
      if (last.position().top <= $(this).height() - 40) {
        new_month(+1);
      }
    }
  });

  /*$(window).scroll(function() {
    clearTimeout(time);

    console.log("temp " + temp);
    console.log("ch " + document.documentElement.clientHeight);
    console.log("st " + $(document).scrollTop());
    console.log("oh " + document.body.offsetHeight);

    var pageHeight = Math.max(document.body.scrollHeight ||
      document.body.offsetHeight);
    var viewportHeight = window.innerHeight  ||
      document.documentElement.clientHeight  ||
      document.body.clientHeight || 0;
    var scrollHeight = window.pageYOffset ||
      document.documentElement.scrollTop  ||
      document.body.scrollTop || 0;
      if (pageHeight - viewportHeight - scrollHeight < 30) {

        new_month_after();

      };

      if ($(document).scrollTop() < prev && $(document).scrollTop() - temp < -5) {
        new_month_before();
        temp = $(document).scrollTop();
      }
      if ($(document).scrollTop() > prev) {
        temp = 0;
      }

      prev = $(document).scrollTop();

  });*/
});