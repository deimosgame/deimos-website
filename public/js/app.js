// Various init

$(document).foundation();

InstantClick.init();

// AJAX forms

$(document).ready(function() {
	$('form.ajaxed').on('submit', function() {
		$.ajax({
			url: $(this).attr('action'), 
			type: $(this).attr('method'),
			data: $(this).serialize()
		});
		return false;
	});
});

// Lightbox

var activityIndicatorOn = function() {
	$('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
},
activityIndicatorOff = function() {
	$('#imagelightbox-loading').remove();
},
overlayOn = function() {
	$('<div id="imagelightbox-overlay"></div>').appendTo('body');
},
overlayOff = function() {
	$('#imagelightbox-overlay').remove();
},
navigationOn = function(instance, selector) {
	var images = $(selector);
	if (images.length) {
		var nav = $('<div id="imagelightbox-nav"></div>');
		for(var i = 0; i < images.length; i++)
			nav.append('<a href="#"></a>');
		nav.appendTo('body');
		nav.on('click touchend', function() { return false; });

		var navItems = nav.find('a');
		navItems.on('click touchend', function() {
			var $this = $(this);
			if (images.eq($this.index()).attr('href') !=
				$('#imagelightbox').attr('src'))
				instance.switchImageLightbox($this.index());
			navItems.removeClass('active');
			navItems.eq($this.index()).addClass('active');
			return false;
		})
		.on('touchend', function() { return false; });
	}
},
navigationUpdate = function(selector) {
	var items = $('#imagelightbox-nav a');
	items.removeClass('active');
	items.eq($(selector).filter('[href="' + $('#imagelightbox').attr('src') +
		'"]').index(selector)).addClass('active');
},
navigationOff = function() {
	$('#imagelightbox-nav').remove();
};

var selector = 'a[data-imagelightbox]';
var instance = $(selector).imageLightbox({
	onStart:     function() { overlayOn(); navigationOn(instance, selector); },
	onEnd:       function() {
		navigationOff();
		activityIndicatorOff();
		overlayOff();
	},
	onLoadStart: function() { activityIndicatorOn(); },
	onLoadEnd:   function() {
		navigationUpdate(selector);
		activityIndicatorOff();
	}
});