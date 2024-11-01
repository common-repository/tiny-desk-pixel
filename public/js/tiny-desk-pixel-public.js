(function( $ ) {
	'use strict';
	function clickListener(event) {
		let link = undefined;
		event.path.forEach(el => {
			if (el.tagName && el.tagName.toLowerCase() === 'a' && el.href) {
				link = el;
			}
		})
		if(link) {
			const href = link.href;
			const telRegex = /^tel:/;
			const mapRegex = /(goo.gl|google.com)\/maps\//;
			if((telRegex.test(href) || mapRegex.test(href)) && typeof TTDUniversalPixelApi === "function") {
				const key = `contact_${telRegex.test(href) ? 'tel' : 'map'}`;
				const universalPixelApi = new TTDUniversalPixelApi(key);
				universalPixelApi.init(ttdConfig.advertiserId, [ttdConfig.pixelId], "https://insight.adsrvr.org/track/up");
			}
		}
	}
	$( window ).load(function() {
		document.body.addEventListener('click', clickListener, true);
	});

})( jQuery );
