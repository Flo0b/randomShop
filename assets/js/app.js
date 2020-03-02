/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
require("bootstrap");

require("@fortawesome/fontawesome-free/css/all.min.css");
require("@fortawesome/fontawesome-free/js/all.js");

// any CSS you import will output into a single css file (app.css in this case)
import "../css/app.css";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from "jquery";

import Vue from "vue";

console.log("Hello Webpack Encore! Edit me in assets/js/app.js");

window.onload = $(function() {
  console.log("test");

  $(window).on("scroll", function() {
    console.log("scrooooollll");
    if ($(window).scrollTop() > 10) {
      $(".navbar").addClass("active");
    } else {
      $(".navbar").removeClass("active");
    }
  });

  //Vue
  var app = new Vue({
    el: "#app",
    data: {
      message: "Hello Vue!"
    }
  });
});
