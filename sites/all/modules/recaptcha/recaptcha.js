(function ($, window, document, Drupal) {
  Drupal.behaviors.recaptcha = {
    widgets: {},
    attach: function (context, settings) {
      // Return early if the reCAPTCHA script is not yet *fully* loaded. If
      // not, don't worry: the onload callback drupalRecaptchaOnLoad() will
      // make sure that this function is called again once grecaptcha is
      // defined.
      if (typeof grecaptcha == 'undefined' || typeof grecaptcha.render == 'undefined') {
        return;
      }
      $('.g-recaptcha', context).once('drupal-recaptcha').each(function () {
        Drupal.behaviors.recaptcha.widgets[this.id] = grecaptcha.render(this, $(this).data());
      });
    }
  };

  window.drupalRecaptchaOnLoad = function() {
    if (typeof Drupal.behaviors.recaptcha.attach != 'undefined') {
      Drupal.behaviors.recaptcha.attach();
    }
  };
})(jQuery, window, document, Drupal);