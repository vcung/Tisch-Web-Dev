/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-phone' : '&#xe000;',
			'icon-clock' : '&#xe001;',
			'icon-keyboard' : '&#xe002;',
			'icon-search' : '&#xe003;',
			'icon-twitter' : '&#xe005;',
			'icon-facebook' : '&#xe006;',
			'icon-users' : '&#xe00a;',
			'icon-bubbles' : '&#xe00b;',
			'icon-arrow-left' : '&#xe00c;',
			'icon-arrow-right' : '&#xe00d;',
			'icon-arrow-up' : '&#xe00e;',
			'icon-arrow-down' : '&#xe00f;',
			'icon-untitled' : '&#xe01b;',
			'icon-help' : '&#xe01c;',
			'icon-bubbles-2' : '&#xe004;',
			'icon-chevron-right' : '&#xf054;',
			'icon-double-angle-right' : '&#xf101;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};