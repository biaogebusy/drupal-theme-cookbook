(function ($) {

Drupal.behaviors.siteDefault = {
  attach: function (context, settings) {

    //console.log(settings);

    //this.validate();

    if(Drupal.ajax){
      this.CustomAjax();
    }
    // Message
    this.MsgAlert();

    // Form提交保护
    $('.form-submit-protected').bind('click', function(event) {
      var button = $(this);
      var oldVal = button.val();
      button.attr('disabled', 'true').val('请稍等..');
      $(this).parents('form').submit();
    });

  },
  MsgAlert:function(){
    $('.a_close').bind('click', function(event) {
      $(this).parent().fadeOut();
    });
  },
  validate:function(form){
    var inputRequired = $(form).find('input.required');
    var exp = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）&mdash;—|{}【】‘；：”“'。，、？]");
    $(form).submit(function(event) {

      if(inputRequired && inputRequired.length > 0){
        inputRequired.each(function(index, el) {
          var value = $(el).val();
          if(!value){
            var text = $(el).siblings('label').text().replace(exp,"");
            alert(text + '不可以为空');
            event.preventDefault();
            return false;
          }
        })
      }

    });

  },
  CustomAjax:function(){

 //Before
    Drupal.ajax.prototype.beforeSend = function (xmlhttprequest, options) {
      if (this.form) {
        options.extraData = options.extraData || {};
        options.extraData.ajax_iframe_upload = '1';
        var v = $.fieldValue(this.element);
        if (v !== null) {
          options.extraData[this.element.name] = Drupal.checkPlain(v);
        }
      }

      $(this.element).addClass('progress-disabled').attr('disabled', true);

      if (this.progress.type == 'bar') {
        var progressBar = new Drupal.progressBar('ajax-progress-' + this.element.id, eval(this.progress.update_callback), this.progress.method, eval(this.progress.error_callback));
        if (this.progress.message) {
          progressBar.setProgress(-1, this.progress.message);
        }
        if (this.progress.url) {
          progressBar.startMonitoring(this.progress.url, this.progress.interval || 1500);
        }
        this.progress.element = $(progressBar.element).addClass('ajax-progress ajax-progress-bar');
        this.progress.object = progressBar;
        $(this.element).after(this.progress.element);
      }
      if (this.progress.type == 'throbber') {
        if (this.progress.message) {
          this.progress.value = $(this.element).val();
          $(this.element).val(this.progress.message);
        }
      }

      if($(this.element).is('.btn-modal')){
        $('#modal-loading').modal('show');
      }

    }

    //Success

    Drupal.ajax.prototype.success = function (response, status) {
      if (this.progress.element) {
        $(this.progress.element).remove();
      }
      if (this.progress.object) {
        this.progress.object.stopMonitoring();
      }
      $(this.element).removeClass('progress-disabled').removeAttr('disabled');
      Drupal.freezeHeight();
      for (var i in response) {
        if (response.hasOwnProperty(i) && response[i]['command'] && this.commands[response[i]['command']]) {
          this.commands[response[i]['command']](this, response[i], status);
        }
      }
      if (this.form) {
        var settings = this.settings || Drupal.settings;
        Drupal.attachBehaviors(this.form, settings);
      }

      Drupal.unfreezeHeight();
      this.settings = null;
      $(this.element).val(this.progress.value);
      if($('.messages').length){
        Drupal.behaviors.siteDefault.MsgAlert();
        // $('.messages').delay(2000).fadeOut('3000');
      }
      if($(this.element).is('.btn-modal')){
        $('#modal-loading').modal('hide');
      }
    }


  }
};

})(jQuery);