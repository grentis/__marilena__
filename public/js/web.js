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

  function index_from_date(date) {
    var now = new Date()
    if (date.getTime() > now.getTime()) {
      console.log('futuro')
      return (date.getFullYear() - now.getFullYear()) * 12 - now.getMonth() + date.getMonth();
    } else {
      return -1 * (now.getFullYear() - date.getFullYear()) * 12 - now.getMonth() + date.getMonth();
    }
  }

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
    if (type == 1) {
      return $c.insertAfter($from)
    } else {
      $c.insertBefore($from);
      $("#timeline").stop(true, true).scrollTop($("#timeline").scrollTop() + $c.height());
      return $c;
    }
  }

  var go_to_month = function(index){
    var $m = $("#timeline .t-month[data-index=" + index + "]");
    var $from = (index > 0) ? $('#timeline .t-month:last-child') : $('#timeline .t-month:first-child');
    var from_index = parseInt($from.attr('data-index'));
    if ($m.length <= 0) {
      for (var i = 0; i < Math.abs(index - from_index); i++) {
        if (index > 0) {
          $m = new_month(1);
        } else {
          $m = new_month(-1);
        }
      }
      if ($m.next().length <= 0) {
        new_month(1);
      }
    }
    move_timeline($m, 200 * Math.abs(index - from_index) + 1);
  }

  var move_timeline = function(position, speed, callback) {
    var internal =
    $("#timeline").stop(true, true).scrollTo(position, {duration: speed, onAfter: function() {
      $.each($(".t-month", $(this)), function(index, value) {
        console.log($(this).attr('data-index') + "" + $(this).position().top)
        if ($(this).position().top >= -60) {
          var d = date_from_index($(this).attr('data-index'));
          var $cmonth = $('#change_month');
          $('.select .value', $cmonth).attr("data-index", d.getMonth()).html(d.getFullMonth());
          $('input', $cmonth).val(d.getFullYear());
          return false;
        }
      });
      if (typeof callback == 'function') {
        callback.call(this);
      }
    }});
  }

  $("#timeline").mousewheel(function(event, delta) {
    if (delta > 0) {
      var first = $('#timeline .t-month:first-child');
      if (first.position().top >= -40) {
        first = new_month(-1);
      }
    } else {
      var last = $('#timeline .t-month:last-child');
      if (last.position().top <= $(this).height() - 40) {
        new_month(+1);
      }
    }
    move_timeline($(this).scrollTop() - (delta * 50), 100);
  });

  $(document).on('click.ml', '#change_month button.change', function(event){
    var $form = $(this).closest('#change_month');
    var year = parseInt($('input', $form).val());
    var month = parseInt($('.select .value', $form).attr('data-index'));
    var date = new Date(year, month, 1);
    go_to_month(index_from_date(date));
    event.preventDefault();
    return false;
  }).on('click.ml', '#change_month a', function(event) {
    var $this = $(this);
    $('.select .value', $this.closest('#change_month')).html($this.html()).attr('data-index', $this.attr('data-index'));
    event.preventDefault();
  }).on('click.ml', '.new_payment', function(event) {
    event.preventDefault();
    $('<div class="modal" id="payment_modal"></div>').load('payment/new/' + $(this).closest('.t-month').attr('data-index')).appendTo($('body')).modal();
    return false;
  }).on('submit.ml', 'form[data-remote=true]', function(event) {
    event.preventDefault();
    var $this = $(this);
    var form_data = $this.serialize();
    $.ajax({
      url: $this.attr('action'),
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
        console.log(msg);
        eval(msg);
      }
    });
    return false;
  });

  move_timeline($('.t-month[data-index=0]'), 500);

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












/* http://net.onextrapixel.com/wp-content/uploads/2010/10/articlelists.jpg */