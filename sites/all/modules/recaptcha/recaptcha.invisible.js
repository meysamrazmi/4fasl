/**
 * @file
 * Invisible reCaptcha behaviors.
 */

/**
 * Form submit button.
 *
 * @type {jQuery}
 */
var $submittedFormBtn = null;

/**
 * reCaptcha data-callback that submits the form.
 *
 * @param token
 *   The validation token.
 */
function onInvisibleSubmit(token) {
  // Some forms use mousedown, others use click. Just trigger both.
  $submittedFormBtn.mousedown().click();
}

(function ($) {

  /**
   * Handles the submission of the form with the invisible reCaptcha.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the behavior for the invisible reCaptcha.
   */
  Drupal.behaviors.invisibleRecaptcha = {
    attach: function(context, settings) {
      // Do addBack so we will re-attach the events if the context is the form
      // itself.
      $(context).find('form').addBack('form').each(function () {
        var $form = $(this);

        if ($form.find('.g-recaptcha[data-size="invisible"]').length) {
          var $formSubmit = $('input[type="submit"]', $form);

          if ($formSubmit.hasClass('ajax-processed')) {
            Drupal.ajax[$formSubmit.attr('id')].options.beforeSubmit = function (form_values, element_settings, options) {
              if ($submittedFormBtn) {
                $submittedFormBtn = null;
                return true;
              }
              validateInvisibleCaptcha($form);
              return false;
            }
          }
          else {
            $formSubmit.click(function (e) {
              if ($submittedFormBtn) {
                $submittedFormBtn = null;
                return;
              }
              e.preventDefault();
              validateInvisibleCaptcha($form);
            });
          }
        }
      });

      /**
      * Triggers the reCaptcha to validate the form.
       *
       * @param {jQuery} $form
       *   The form object to be validated.
       */
      function validateInvisibleCaptcha($form) {
        $submittedFormBtn = $('input[type="submit"]', $form);
        grecaptcha.execute(Drupal.behaviors.recaptcha.widgets[$('.g-recaptcha[data-size="invisible"]', $form).attr('id')]);
      }
    }
  };
})(jQuery);