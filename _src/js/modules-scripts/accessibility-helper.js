/**
 * All functions used to update the aria markup to improve accessibility
 *
 * @version 1.0.0
 */

//=include './quick.js

/**
 * @function aria__toggle_checkbox
 *
 * @desc Toogles the state of a checkbox
 *
 * @param {Object}  event  -  Standard W3C event object
 *
 */
function aria__toggle_checkbox(event) {
	const node = event.currentTarget;

	if (
		event.type === 'click' ||
		(event.type === 'keydown' && event.keyCode === 32)
	) {
		if (node.checked == true) {
			node.setAttribute('aria-checked', 'true');
		} else {
			node.setAttribute('aria-checked', 'false');
		}
	}

	return node.checked;
}

/**
 * @function burger_menu_toogle
 *
 * @desc Toogles the state of a burger menu & update label
 *
 * @param {Object}  event  -  Standard W3C event object
 *
 */
function burger_menu_toogle(event) {
	const node = event.currentTarget;
	const node__label = querySelector('#' + node.getAttribute('aria-labelledby'));

	const state = aria__toggle_checkbox(event);

	if (state) {
		node__label.textContent = 'Navigation toggle: menu opened';
	} else {
		node__label.textContent = 'Navigation toggle: menu closed';
	}
}
