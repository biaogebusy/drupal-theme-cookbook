var _ = require('underscore');

// tips
require('../../bower_components/qtip2/dist/jquery.qtip');

// tScren
// require('../../bower_components/swiper/dist/idangerous.swiper.min');
require('../../bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min');

// fixedNavto
require('../../bower_components/ScrollToFixed/jquery-scrolltofixed');
require('../../bower_components/jQuery-One-Page-Nav/jquery.nav');

module.exports = {
  init:function(settings, $){
    var self = this;
    self.uiSelect('select:visible', $);

    $('.form-type-textfield > .description, .form-type-select .description').each(function(index, el) {
      var suffix = $(el).parent().find('.field-suffix');
      var icon =  $('<i/>',{
                    'class' : 'icon icon-help',
                    'html': '&#xe63b;'
                  });
      if(suffix && suffix.length){
        icon.appendTo(suffix);
      }else{

        var fieldSuffix = icon.appendTo('<span class="field-suffix"/>');
        $(fieldSuffix).appendTo($(el).parent());
      }

      icon.qtip({
         content: {
          text: $(el).text()
         }
      });
    });


  },
  customTips:function(btn, $){

    $(btn).each(function() {
      $(this).qtip({
        content: {
          text: $(this).data('text'),
        },
        position: {
          my: 'top center',
          at: 'bottom center'
        },
        style: {
          classes: 'qtip-red'
        }
      });
    });

  },
  fixedNavto:function(nav,$){
    $('a',$(nav)).on('click', function() {
      var _this = $(this).attr('href');
      curItem(_this);
    });

    $(nav)
    .scrollToFixed()
    .find('ul')
    .onePageNav({
      currentClass: 'active',
      changeHash: false,
      scrollSpeed: 750,
      scrollThreshold: 0.5,
      easing: 'swing',
      scrollChange: function(cur) {
        var _this = $(cur).find('a').attr('href');
        curItem(_this);
      }
    });

    function curItem(link){
      $(link)
        .addClass('cur-item')
        .siblings()
        .removeClass('cur-item');
    }
  },
  uiSelect:function(el, $){
    $(el).each(function(index, selectE) {
      if($(this).is('.no-select2')){
        return false;
      }else{
        if($(this).is('.outside-label')){
          $(this).parent().addClass('outside-label');
        }
        $(this).select2();
      }
    });
    $('.modal-content select').select2();
  },
  htmlTpl:{
    TabItem: _.template(
      '<li style="width:<%=width%>%" class="<%=classes%>"><a href="#progress-panel-<%=id%>" data-toggle="tab"><%=name%></a><b class="l"></b><b class="r"></b></li>'
    ),
  }
}
