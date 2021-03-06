/* Theme Select & Initializer Script

Table of Contents

01. Css Loading Util
02. Theme Selector And Initializer
*/

/* 01. Css Loading Util */
function loadStyle(href, callback) {
  for (var i = 0; i < document.styleSheets.length; i++) {
    if (document.styleSheets[i].href == href) {
      return;
    }
  }
  var head = document.getElementsByTagName("head")[0];
  var link = document.createElement("link");
  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = href;
  if (callback) {
    link.onload = function () {
      callback();
    };
  }
  var mainCss = $(head).find('[href$="main.css"]');
  if (mainCss.length !== 0) {
    mainCss[0].before(link);
  } else {
    head.appendChild(link);
  }
}

/* 02. Theme Selector, Layout Direction And Initializer */
(function ($) {
  if ($().dropzone) {
    Dropzone.autoDiscover = false;
  }

  var themeColorsDom = /*html*/`
  <div class="theme-colors">
    <div class="p-4">
    <p class="text-muted mb-2">Light Theme</p>
    <div class="d-flex flex-row justify-content-between mb-3">
      <a href="#" data-theme="nzradmin.dark.redruby.min.css" class="theme-color theme-color-redruby"></a>
      <a href="#" data-theme="nzradmin.light.blueyale.min.css" class="theme-color theme-color-blueyale"></a>
      <a href="#" data-theme="nzradmin.light.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>
      <a href="#" data-theme="nzradmin.light.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>
      <a href="#" data-theme="nzradmin.light.greenlime.min.css" class="theme-color theme-color-greenlime"></a>
    </div>
    <div class="d-flex flex-row justify-content-between mb-4">
      <a href="#" data-theme="nzradmin.light.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>
      <a href="#" data-theme="nzradmin.light.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>
      <a href="#" data-theme="nzradmin.light.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>
      <a href="#" data-theme="nzradmin.light.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>
      <a href="#" data-theme="nzradmin.light.greysteel.min.css" class="theme-color theme-color-greysteel"></a>
    </div>
    <p class="text-muted mb-2">Dark Theme</p>
    <div class="d-flex flex-row justify-content-between mb-3">
   	  <a href="#" data-theme="nzradmin.light.redruby.min.css" class="theme-color theme-color-redruby"></a>
      <a href="#" data-theme="nzradmin.dark.blueyale.min.css" class="theme-color theme-color-blueyale"></a>
      <a href="#" data-theme="nzradmin.dark.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>
      <a href="#" data-theme="nzradmin.dark.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>
      <a href="#" data-theme="nzradmin.dark.greenlime.min.css" class="theme-color theme-color-greenlime"></a>
    </div>
    <div class="d-flex flex-row justify-content-between">
    <a href="#" data-theme="nzradmin.dark.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>
    <a href="#" data-theme="nzradmin.dark.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>
      <a href="#" data-theme="nzradmin.dark.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>
    <a href="#" data-theme="nzradmin.dark.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>
    <a href="#" data-theme="nzradmin.dark.greysteel.min.css" class="theme-color theme-color-greysteel"></a>
  </div>
  </div>
  <div class="p-4">
    <p class="text-muted mb-2">Border Radius</p>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="roundedRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="rounded">
      <label class="custom-control-label" for="roundedRadio">Rounded</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="flatRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="flat">
      <label class="custom-control-label" for="flatRadio">Flat</label>
    </div>
  </div>
  <div class="p-4">
    <p class="text-muted mb-2">Direction</p>
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="ltrRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="ltr">
    <label class="custom-control-label" for="ltrRadio">Ltr</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="rtlRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="rtl">
    <label class="custom-control-label" for="rtlRadio">Rtl</label>
  </div>
</div>
<a href="#" class="theme-button"> <i class="simple-icon-magic-wand"></i> </a>
</div>
`;

//  $("body").append(themeColorsDom);


  /* Default Theme Color, Border Radius and  Direction */
  var theme = "nzradmin.dark.redruby.min.css";
  var direction = "ltr";
  var radius = "rounded";

  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("nzradmin-theme-color")) {
      theme = localStorage.getItem("nzradmin-theme-color");
    } else {
      localStorage.setItem("nzradmin-theme-color", theme);
    }
    if (localStorage.getItem("nzradmin-direction")) {
      direction = localStorage.getItem("nzradmin-direction");
    } else {
      localStorage.setItem("nzradmin-direction", direction);
    }
    if (localStorage.getItem("nzradmin-radius")) {
      radius = localStorage.getItem("nzradmin-radius");
    } else {
      localStorage.setItem("nzradmin-radius", radius);
    }
  }

  $(".theme-color[data-theme='" + theme + "']").addClass("active");
  $(".direction-radio[data-direction='" + direction + "']").attr("checked", true);
  $(".radius-radio[data-radius='" + radius + "']").attr("checked", true);
  $("#switchDark").attr("checked", theme.indexOf("dark") > 0 ? true : false);

  loadStyle(window.origin + "/css/" + theme, onStyleComplete);
  function onStyleComplete() {
    setTimeout(onStyleCompleteDelayed, 300);
  }

  function onStyleCompleteDelayed() {
    $("body").addClass(direction);
    $("html").attr("dir", direction);
    $("body").addClass(radius);
    $("body").nzradmin();
  }

  $("body").on("click", ".theme-color", function (event) {
    event.preventDefault();
    var dataTheme = $(this).data("theme");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("nzradmin-theme-color", dataTheme);
      window.location.reload();
    }
  });

  $("input[name='directionRadio']").on("change", function (event) {
    var direction = $(event.currentTarget).data("direction");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("nzradmin-direction", direction);
      window.location.reload();
    }
  });

  $("input[name='radiusRadio']").on("change", function (event) {
    var radius = $(event.currentTarget).data("radius");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("nzradmin-radius", radius);
      window.location.reload();
    }
  });

  $("#switchDark").on("change", function (event) {
    var mode = $(event.currentTarget)[0].checked ? "dark" : "light";
    if (mode == "dark") {
      theme = theme.replace("light", "dark");
    } else if (mode == "light") {
      theme = theme.replace("dark", "light");
    }
    if (typeof Storage !== "undefined") {
      localStorage.setItem("nzradmin-theme-color", theme);
      window.location.reload();
    }
  });

  $(".theme-button").on("click", function (event) {
    event.preventDefault();
    $(this)
      .parents(".theme-colors")
      .toggleClass("shown");
  });

  $(document).on("click", function (event) {
    if (
      !(
        $(event.target)
          .parents()
          .hasClass("theme-colors") ||
        $(event.target)
          .parents()
          .hasClass("theme-button") ||
        $(event.target).hasClass("theme-button") ||
        $(event.target).hasClass("theme-colors")
      )
    ) {
      if ($(".theme-colors").hasClass("shown")) {
        $(".theme-colors").removeClass("shown");
      }
    }
  });

/* Shipping & Custom Messahe Drop Down */

$("#order_status").change(function(){
   if($(this).val()== 3)
   {
       $("div#hasShipped").show();
   }
    else
    {
        $("div#hasShipped").hide();
    }
});

$("#orderStatus").change(function(){
   if($(this).val()=="8")
   {
       $("div#customMessage").show();
   }
    else
    {
        $("div#customMessage").hide();
    }
});

/* Online & Offline Toggle */

// $("#switch3").click(function() {
//     if($(this).is(':checked')) {
//         $("#switch3-label").text("In stock");
//     } else {
//         $("#switch3-label").text("Not in stock");
//     }
// });

/* Customer Online Toggle */

$("#switch4").click(function() {
    if($(this).is(':checked')) {
        $("#switch4-label").text("Customer Active");
    } else {
        $("#switch4-label").text("Customer Deactive");
    }
});

/* Review Toggle */

$("#switch5").click(function() {
    if($(this).is(':checked')) {
        $("#switch5-label").text("Unpublish Review");
    } else {
        $("#switch5-label").text("Publish Review");
    }
});
/* Passwrod Reset Toggle */

$("#switch6").click(function() {
    if($(this).is(':checked')) {
        $("#switch6-label").text("Reset Confirmed");
    } else {
        $("#switch6-label").text("Confirm Reset");
    }
});

/* Set or Single */

$("#switch7").click(function() {
    if($(this).is(':checked')) {
        $("#switch7-label").text("Sell as Single");
    } else {
        $("#switch7-label").text("Sell as Set");
    }
});

/* Rule Toggle */

$("#switch8").click(function() {
    if($(this).is(':checked')) {
        $("#switch8-label").text("Rule Activate");
    } else {
        $("#switch8-label").text("Rule Deactivate");
    }
});


$("#switch9").click(function() {
    if($(this).is(':checked')) {
        $("#switch9-label").text("Rule Activate");
    } else {
        $("#switch9-label").text("Rule Deactivate");
    }
});

// MOBILE ISD CODE

$(".callnoinput").intlTelInput({
preferredCountries: ["in" ]
});

})(jQuery);
