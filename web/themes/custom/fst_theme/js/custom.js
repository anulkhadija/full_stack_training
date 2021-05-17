(function ($, Drupal) {
  Drupal.behaviors.test = {
    attach: function () {
      console.log("Hello World");
    }
  };
}(jQuery, Drupal));