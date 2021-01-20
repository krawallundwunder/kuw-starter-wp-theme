"use strict";

/* global wp, jQuery */

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {
	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	}); // Header text color.

	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title, .site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
			} else {
				$('.site-title, .site-description').css({
					clip: 'auto',
					position: 'relative'
				});
				$('.site-title a, .site-description').css({
					color: to
				});
			}
		});
	});
})(jQuery);
"use strict";

function _createForOfIteratorHelper(o, allowArrayLike) {
	var it;
	if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) {
		if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") {
			if (it) o = it;
			var i = 0;
			var F = function F() {
			};
			return {
				s: F, n: function n() {
					if (i >= o.length) return {done: true};
					return {done: false, value: o[i++]};
				}, e: function e(_e) {
					throw _e;
				}, f: F
			};
		}
		throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
	}
	var normalCompletion = true, didErr = false, err;
	return {
		s: function s() {
			it = o[Symbol.iterator]();
		}, n: function n() {
			var step = it.next();
			normalCompletion = step.done;
			return step;
		}, e: function e(_e2) {
			didErr = true;
			err = _e2;
		}, f: function f() {
			try {
				if (!normalCompletion && it.return != null) it.return();
			} finally {
				if (didErr) throw err;
			}
		}
	};
}

function _unsupportedIterableToArray(o, minLen) {
	if (!o) return;
	if (typeof o === "string") return _arrayLikeToArray(o, minLen);
	var n = Object.prototype.toString.call(o).slice(8, -1);
	if (n === "Object" && o.constructor) n = o.constructor.name;
	if (n === "Map" || n === "Set") return Array.from(o);
	if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
	if (len == null || len > arr.length) len = arr.length;
	for (var i = 0, arr2 = new Array(len); i < len; i++) {
		arr2[i] = arr[i];
	}
	return arr2;
}

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	var siteNavigation = document.getElementById('site-navigation'); // Return early if the navigation don't exist.

	if (!siteNavigation) {
		return;
	}

	var button = siteNavigation.getElementsByTagName('button')[0]; // Return early if the button don't exist.

	if ('undefined' === typeof button) {
		return;
	}

	var menu = siteNavigation.getElementsByTagName('ul')[0]; // Hide menu toggle button if menu is empty and return early.

	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	} // Toggle the .toggled class and the aria-expanded value each time the button is clicked.


	button.addEventListener('click', function () {
		siteNavigation.classList.toggle('toggled');

		if (button.getAttribute('aria-expanded') === 'true') {
			button.setAttribute('aria-expanded', 'false');
		} else {
			button.setAttribute('aria-expanded', 'true');
		}
	}); // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.

	document.addEventListener('click', function (event) {
		var isClickInside = siteNavigation.contains(event.target);

		if (!isClickInside) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
		}
	}); // Get all the link elements within the menu.

	var links = menu.getElementsByTagName('a'); // Get all the link elements with children within the menu.

	var linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a'); // Toggle focus each time a menu link is focused or blurred.

	var _iterator = _createForOfIteratorHelper(links),
		_step;

	try {
		for (_iterator.s(); !(_step = _iterator.n()).done;) {
			var link = _step.value;
			link.addEventListener('focus', toggleFocus, true);
			link.addEventListener('blur', toggleFocus, true);
		} // Toggle focus each time a menu link with children receive a touch event.

	} catch (err) {
		_iterator.e(err);
	} finally {
		_iterator.f();
	}

	var _iterator2 = _createForOfIteratorHelper(linksWithChildren),
		_step2;

	try {
		for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
			var _link = _step2.value;

			_link.addEventListener('touchstart', toggleFocus, false);
		}
		/**
		 * Sets or removes .focus class on an element.
		 */

	} catch (err) {
		_iterator2.e(err);
	} finally {
		_iterator2.f();
	}

	function toggleFocus() {
		if (event.type === 'focus' || event.type === 'blur') {
			var self = this; // Move up through the ancestors of the current link until we hit .nav-menu.

			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}

				self = self.parentNode;
			}
		}

		if (event.type === 'touchstart') {
			var menuItem = this.parentNode;
			event.preventDefault();

			var _iterator3 = _createForOfIteratorHelper(menuItem.parentNode.children),
				_step3;

			try {
				for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
					var link = _step3.value;

					if (menuItem !== link) {
						link.classList.remove('focus');
					}
				}
			} catch (err) {
				_iterator3.e(err);
			} finally {
				_iterator3.f();
			}

			menuItem.classList.toggle('focus');
		}
	}
})();
