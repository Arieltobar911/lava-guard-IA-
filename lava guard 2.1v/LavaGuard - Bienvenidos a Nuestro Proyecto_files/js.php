jQuery(function($) {ServicesModuleInitialize();});function ServicesModuleInitialize() {$( document ).on( 's123.page.ready', function( event ) {var $section = $('section.s123-module-services');$section.each(function( index ) {var $sectionThis = $(this);var categories = new ModuleLayoutCategories({$items :  $sectionThis.find('.services-category'),$categoriesContainer : $sectionThis.find('.categories-panel'),$filterButton : $sectionThis.find('.items-responsive-filter'),$categories : $sectionThis.find('.items-categories-container li')});if ( $sectionThis.hasClass('layout-10') ) {$sectionThis.find('.service-item-description').each(function() {const $paragraph = $(this);const lineHeight = parseFloat($paragraph.css('font-size')) * 1.5;const maxLines = 4;const actualHeight = $paragraph.height();const numberOfLines = actualHeight / lineHeight;if (numberOfLines > maxLines) {$paragraph.addClass('show-more');$paragraph.attr('data-rel', 'tooltip');$paragraph.css('height', lineHeight * maxLines);$paragraph.on('click', function() {var _this = $(this);bootbox.alert({title: _this.data('title'),message: _this.html(),backdrop: true});});}});}
ServicesModuleMobileViewCarouselInit($sectionThis);});});}
function ServicesModuleMobileViewCarouselInit( $section ) {let sectionID = $section.get(0).id.replace('section-','');let $sectionItemsContainer = $section.find('.service-grid');let mobileViewTypeNUM = $section.data('mobile-view-type');ServicesModuleMobileViewCarouselInitResizeHandler();if ( $sectionItemsContainer.hasClass('slick-initialized') ) {$sectionItemsContainer.css('visibility','none');$sectionItemsContainer.slick('unslick');$sectionItemsContainer.parent().find('.custom-arrow-container').remove();}
if ( findBootstrapEnvironment() != 'xs' || mobileViewTypeNUM != '2' ) {$sectionItemsContainer.css('visibility','visible');return;}
$sectionItemsContainer.on('init', function(event) {$sectionItemsContainer.css('visibility','visible');});$sectionItemsContainer.slick({dots: false,infinite: true,vertical: false,verticalSwiping: false,slidesToShow: 1,slidesToScroll: 1,adaptiveHeight: true,swipeToSlide: true,rtl: $('html').attr('dir') === 'rtl' ? true : false,centerMode: true,centerPadding: '8%',arrows: false});function ServicesModuleMobileViewCarouselInitResizeHandler() {$(window).off('resize.ServicesModuleMobileViewCarouselInit').on('resize.ServicesModuleMobileViewCarouselInit', function( event ) {clearTimeout(window.ServicesModuleMobileViewCarouselInit_Delay);window.ServicesModuleMobileViewCarouselInit_Delay = setTimeout( function() {var $sections = $('section.s123-module-services');$sections.each(function( index ) {ServicesModuleMobileViewCarouselInit($(this));});},50);});}}jQuery(function($) {TestimonialsModuleInitialize_Layout1_Layout8_Layout9();});function TestimonialsModuleInitialize_Layout1_Layout8_Layout9() {$( document ).on( "s123.page.ready", function( event ) {var $sections = $('.s123-module-testimonials.layout-1, .s123-module-testimonials.layout-8, .s123-module-testimonials.layout-9');$sections.each(function( index ) {var $s = $(this);var $carousel = $s.find('[data-ride="carousel"]');var layout_customize = $s.find('.layout-customize').length > 0 ? tryParseJSON($s.find('.layout-customize').val()) : '';var testimonialsInterval = 10000;if ( layout_customize != '' ) {testimonialsInterval = layout_customize.testimonialsInterval * 1000;}
$carousel.carousel({interval: isMobileDevice.any() ? false : testimonialsInterval});$carousel.find('.carousel-control.left').click(function() {$carousel.carousel('prev');});$carousel.find('.carousel-control.right').click(function() {$carousel.carousel('next');});$carousel.find('.carousel-indicators li').click(function(){$carousel.carousel($(this).data('slide-to'));});});});$( document ).on( "s123.page.load", function( event ) {setTestimonialsHeight();});if ( IsWizard() ) {$(document).on('wizard.preview.device.changed', function( event ) {setTestimonialsHeight();});}
function setTestimonialsHeight() {var $sections = $('.s123-module-testimonials.layout-1, .s123-module-testimonials.layout-8, .s123-module-testimonials.layout-9');$sections.each(function( index ) {var $s = $(this);var $carousel = $s.find('[data-ride="carousel"]');$carousel.find('.item, .testimonial-image').css({ minHeight: '' });if ( !IsIE11() ) {var selector = $s.hasClass('layout-8') && findBootstrapEnvironment() !== 'xs' ? '.testimonial-image' : '.item';$carousel.find(selector).css({minHeight: Math.max.apply(Math, $carousel.find('.item').map(function() { return $(this).outerHeight(); }))});}});}}jQuery(function($) {TestimonialsModuleInitialize_Layouts();});function TestimonialsModuleInitialize_Layouts() {$( document ).on( "s123.page.ready", function( event ) {var $sections = $('.s123-module-testimonials');$sections.each(function( index ) {var $s = $(this);var $categories = $s.find('.testimonials-category');var categories = new ModuleLayoutCategories({$items :  $s.find('.testimonials-category'),$categoriesContainer : $s.find('.categories-panel'),$filterButton : $s.find('.items-responsive-filter'),$categories : $s.find('.items-categories-container li')});});});}jQuery(function($) {TestimonialsModuleInitialize_Layout12();});function TestimonialsModuleInitialize_Layout12() {$( document ).on( "s123.page.ready", function( event ) {var $sections = $('.s123-module-testimonials.layout-12');$sections.each(function( index ) {var $s = $(this);var $categories = $s.find('.testimonials-category');var categories = new ModuleLayoutCategories({$items :  $s.find('.testimonials-category'),$categoriesContainer : $s.find('.categories-panel'),$filterButton : $s.find('.items-responsive-filter'),$categories : $s.find('.items-categories-container li')});var $carousel = $($s.find('.testimonials-continuous-slider').get(0));var slidesToShow = whatScreen.any() == 'mobile' ? 1 : 3;$(window).on('resize', function() {if (whatScreen.any() == 'mobile') {slidesToShow = 1;} else {slidesToShow = 3;}
$carousel.slick('destroy');testimonialsLayout12Slick($carousel,slidesToShow);});if ( !$carousel.hasClass('slick-initialized') ) {testimonialsLayout12Slick($carousel,slidesToShow);}
$s.on('module_layout_categories.show', function (event, category) {$carousel.slick('destroy');$carousel = $s.find('.testimonials-category[data-categories-filter="'+category+'"] .testimonials-continuous-slider');if ( !$carousel.hasClass('slick-initialized') ) {testimonialsLayout12Slick($carousel,slidesToShow);}});});});}
function testimonialsLayout12Slick( $carousel, slidesToShow ) {$carousel.slick({slidesToShow: slidesToShow,  // number of slides to show at once
slidesToScroll: 1,  // number of slides to scroll at once
autoplay: true,infinite: true,speed: 8000,  // speed of the transition, play with this value to achieve desired effect
autoplaySpeed: 0,  // no delay between auto-play transitions
cssEase: 'linear',  // this gives the linear movement between slides
arrows: false,  // optional: disable arrows
pauseOnHover: true,  // optional: prevent pause when hover
draggable: false,centerMode: false,rtl: $('html').attr('dir') == 'rtl' ? true : false,adaptiveHeight: true});}jQuery(function($) {headersModuleInitialize_Layout();});function headersModuleInitialize_Layout() {$( document ).on( "s123.page.ready", function( event ) {var $sections = $('section.s123-module-headers:is(.layout-6,.layout-7,.layout-8,.layout-9,.layout-18,.layout-20,.layout-22,.layout-23,.layout-24,.layout-25,.layout-26,.layout-27,.layout-29,.layout-30,.layout-35,.layout-39,.layout-40)');$sections.each(function( index ) {var $s = $(this);var $carousel = $s.find('[data-ride="carousel"]');var sliderSpeed = $s.data('slider-speed');if ( sliderSpeed == '' || parseInt(sliderSpeed) < 1 || parseInt(sliderSpeed) > 21 ) {sliderSpeed = 5000;} else {sliderSpeed = parseInt(sliderSpeed) * 1000;}
$s.find('.header1, .header2').each(function( index ) {var $this = $(this);if ( $this.data('line-height') && $this.data('line-height').length > 0 ) {$this.get(0).style.setProperty('--header_line_height',$this.data('line-height'));$this.css('line-height',$this.data('line-height'));}});if( $s.hasClass('layout-20') ) {var $firstImage = $s.find('.headers-image').first();if ( $firstImage.length > 0 ) {if ( $firstImage.data('bg') !== undefined ) {var img = new Image();img.src = $firstImage.data('bg');img.onload = function() {var aspectRatio = this.width / this.height;$s.find('.headers-image').css('aspect-ratio',String(aspectRatio));if( $s.find('.headers-container').hasClass('circle-under-image') && aspectRatio < 1 ) {$s.addClass('corner-circle');}};} else {$firstImage.closest('.headers-img-wrap').addClass('circle-fixed-width');}}}
if( $s.hasClass('layout-22') || $s.hasClass('layout-29') ) {var $headersDescription = $s.find('.headers-description');var $headersimage = $s.find('.headers-image');if ( $headersimage.length == 0 ) {$headersimage = $s.find('.headers-bg-video');}
if ( $headersimage.length > 0 && $headersDescription.length > 0 ) {if ( ($headersDescription.get(0).offsetHeight - 60) > $headersimage.get(0).offsetHeight ) {$s.get(0).style.setProperty('--headers-description-height',$headersDescription.get(0).offsetHeight+'px');}}}
$carousel.carousel({interval: sliderSpeed});if( $s.hasClass('layout-26') && $s.attr('data-version') !== undefined && $s.attr('data-version') == '2' ) {if ( IsWizard() ) {$(document).on('site123.colorPicker.change',function( event ) {updateBackgroundColor();});}
updateBackgroundColor();}
function updateBackgroundColor() {var boxColorClass = $s.data('box-color');var color = $s.hasClass('bg-primary') ?getComputedStyle(document.documentElement).getPropertyValue('--modules_color_box') :getComputedStyle(document.documentElement).getPropertyValue('--modules_color_second_box');switch (boxColorClass) {case 'bg-primary-gray':color = '#ebedf0';break;case 'bg-primary-white':color = '#ffffff';break;case 'bg-primary-black':color = '#000000';break;case 'background-primary-color btn-primary-text-color':color = $s.hasClass('bg-primary') ?getComputedStyle(document.documentElement).getPropertyValue('--modules_color_section_main') :getComputedStyle(document.documentElement).getPropertyValue('--modules_color_second_section_main');break;}
$s.find('.headers-img-wrap').get(0).style.setProperty('--layout26OpacityColor',hexToRGB(color));}
function hexToRGB(hex) {var r = parseInt(hex.slice(1, 3), 16),g = parseInt(hex.slice(3, 5), 16),b = parseInt(hex.slice(5, 7), 16);return r + ", " + g + ", " + b;}
if( $s.data('image-width') == 2 ) {var sectionHeight = $s.height();$s.find('.headers-container').css('min-height',sectionHeight+'px');if( $s.hasClass('layout-22') ) {$s.find('.headers-image').css('min-height',sectionHeight+'px');}
$s.data('image-width',0);}});var $sections = $('section.s123-module-headers');$sections.each(function( index ) {var $s = $(this);$s.find('.custom-header-font').each(function( index ) {var $this = $(this);var customFont = $this.data('custom-font');if ( customFont.length > 0 ) {$this.css('font-family',customFont);}});$s.find('.header1, .header2').each(function( index ) {var $this = $(this);if( $s.hasClass('layout-7') || $s.hasClass('layout-9') || $s.hasClass('layout-22') || $s.hasClass('layout-23') || $s.hasClass('layout-24') || $s.hasClass('layout-26') || $s.hasClass('layout-27') || $s.hasClass('layout-29') || $s.hasClass('layout-33') ) {fitHeaderTextToParentContainer($this);}});function fitHeaderTextToParentContainer( $textEl ) {if ( $textEl.length == 0 ) return;fontSize = parseFloat($textEl.css('font-size'));if ( !$.isNumeric(fontSize) ) return;var $parentContainer = $textEl.closest('.headers-text-resize-container');if ( $parentContainer.length > 0 && $parentContainer.width() < $textEl.width() ) {$textEl.css('visibility','hidden');var parentContainerWidth = $parentContainer.width();if ( $textEl.closest('section').hasClass('layout-9') || $textEl.closest('section').hasClass('layout-27') ) {parentContainerWidth = parentContainerWidth + 5;}
if ( $textEl.closest('section').hasClass('layout-23') ) {parentContainerWidth = $parentContainer.innerWidth();}
var index = 0;while ( parentContainerWidth < $textEl.width() && index < 99 ) {index++;fontSize--;$textEl.get(0).style.setProperty('--header-font-size',fontSize);}
$textEl.css('visibility','unset');}}});S123_ActionButtons.init();});}jQuery(function($) {HeadersModuleInitialize_Layout5();});function HeadersModuleInitialize_Layout5() {$( document ).on( 's123.page.ready', function( event ) {var $section = $('section.s123-module-headers.layout-5');$section.each(function( index ) {var $sectionThis = $(this);var $flickityContainer = $sectionThis.find('.carousel');var originalFirstImageSize = {};if ( $flickityContainer.length === 0 ) return;$flickityContainer.flickity({imagesLoaded: true,lazyLoad: 2,pageDots: false,wrapAround: true,percentPosition: false});});});}jQuery(function($) {HeadersModuleInitialize_Layout30();});function HeadersModuleInitialize_Layout30() {$( document ).on( 's123.page.ready', function( event ) {var $section = $('section.s123-module-headers.layout-30');$section.each(function( index ) {var $sectionThis = $(this);$sectionThis.find('.contactUsForm').each( function( index ) {var $form = $(this);var customFormMultiSteps = new CustomFormMultiSteps();customFormMultiSteps.init({$form: $form,$nextButton: $form.find('.next-form-btn'),$submitButton: $form.find('.submit-form-btn'),$previousButton: $form.find('.previous-form-btn'),totalSteps: $form.find('.custom-form-steps').data('total-steps')});var forms_GoogleRecaptcha = new Forms_GoogleRecaptcha();forms_GoogleRecaptcha.init($form);$form.validate({errorElement: 'div',errorClass: 'help-block',focusInvalid: true,ignore: ':hidden:not(.custom-form-step:visible input[name^="datePicker-"])',highlight: function (e) {$(e).closest('.form-group').removeClass('has-info').addClass('has-error');},success: function (e) {$(e).closest('.form-group').removeClass('has-error');$(e).remove();},errorPlacement: function (error, element) {if( element.is('input[type=checkbox]') || element.is('input[type=radio]') ) {var controls = element.closest('div[class*="col-"]');if( controls.find(':checkbox,:radio').length > 0 ) element.closest('.form-group').append(error);else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));}
else if( element.is('.select2') ) {error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));}
else if( element.is('.chosen-select') ) {error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));}
else {error.appendTo(element.closest('.form-group'));}},submitHandler: function( form ) {var $form = $(form);var clickAction = $form.data('click-action');$form.append($('<div class="conv-code-container"></div>'));var $convCodeContainer = $form.find('.conv-code-container');var thankYouMessage = translations.ThankYouAfterSubmmit;if ( $form.data('thanks-msg') ) {thankYouMessage = $form.data('thanks-msg');}
$form.find('button:submit').prop('disabled', true);S123.ButtonLoading.start($form.find('button:submit'));var url = "/versions/"+$('#versionNUM').val()+"/include/contactO.php";if ( $form.hasClass('custom-form') || $form.hasClass('horizontal-custom-form') ) {if ( !CustomForm_IsLastStep( $form ) ) {$form.find('.next-form-btn:visible').trigger('click');S123.ButtonLoading.stop($form.find('button:submit'));$form.find('button:submit').prop('disabled', false);return false;}
if ( !CustomForm_IsFillOutAtLeastOneField($form) ) {bootbox.alert(translations.fillOutAtLeastOneField);S123.ButtonLoading.stop($form.find('button:submit'));$form.find('button:submit').prop('disabled', false);return false;}
url = "/versions/"+$('#versionNUM').val()+"/include/customFormO.php";}
if ( forms_GoogleRecaptcha.isActive && !forms_GoogleRecaptcha.isGotToken ) {forms_GoogleRecaptcha.getToken();return false;}
$.ajax({type: "POST",url: url,data: $form.serialize(),success: function( data ) {var dataObj = jQuery.parseJSON(data);$form.trigger("reset");if ( clickAction == 'thankYouMessage' || clickAction == '' ) {bootbox.alert({title: translations.sent,message: thankYouMessage+'<iframe src="/versions/'+$('#versionNUM').val()+'/include/contactSentO.php?w='+$('#w').val()+'&websiteID='+dataObj.websiteID+'&moduleID='+dataObj.moduleID+'" style="width:100%;height:30px;" frameborder="0"></iframe>',className: 'contactUsConfirm',buttons: {ok: {label: translations.Ok}},backdrop: true});} else {if ( dataObj.conv_code.length > 0 ) {var $convCode = $('<div>' + dataObj.conv_code + '</div>');$convCodeContainer.html($convCode.text());}
if( top.$('#websitePreviewIframe').length ) {bootbox.alert({title: translations.previewExternalLinkTitle,message: translations.previewExternalLinkMsg.replace('{{externalLink}}','<b>'+dataObj.action.url+'</b>'),className: 'externalAlert'});} else {window.open(dataObj.action.url,'_self');}}
customFormMultiSteps.reset();forms_GoogleRecaptcha.reset();S123.ButtonLoading.stop($form.find('button:submit'));$form.find('button:submit').prop('disabled', false);WizardNotificationUpdate();}});return false;}});$form.find('.f-b-date-timePicker').each( function() {var $option = $(this);var $datePicker = $option.find('.fake-input.date-time-picker');var $hiddenInput = $option.find('[data-id="'+$datePicker.data('related-id')+'"]');var $datePickerIcon = $option.find('.f-b-date-timePicker-icon');var formBuilderCalendar = new calendar_handler();$datePicker.data('date-format',$form.data('date-format'));formBuilderCalendar.init({$fakeInput: $datePicker,$hiddenInput: $hiddenInput,$fakeInputIcon: $datePickerIcon,type: 'datePicker',title: translations.chooseDate,calendarSettings: {format: $datePicker.data('date-format'),weekStart: 0,todayBtn: "linked",clearBtn: false,language: languageCode,todayHighlight: true},onSubmit: function( selectedDate ) {$datePicker.html(selectedDate);$hiddenInput.val(selectedDate);}});});CustomForm_DisableTwoColumns($form);});});});}