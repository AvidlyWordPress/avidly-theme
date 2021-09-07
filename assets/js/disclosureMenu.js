/*
*   This content is licensed according to the W3C Software License at
*   https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
*
*   Supplemental JS for the disclosure menu keyboard behavior
*/

var mobileBreak = 992; // Change this value to match your mobile menu breakpoint.

var DisclosureNav = function (domNode) {
	this.container = document;
	this.rootNode = domNode;
	this.triggerNodes = [];
	this.controlledNodes = [];
	this.openIndex = null;
	this.useArrowKeys = true;
};

/* Initialize Disclosure Menus */
window.addEventListener('load', function (event) {
	var menus = document.querySelectorAll('.disclosure-menu');
	var disclosureMenus = [];

	for (var i = 0; i < menus.length; i++) {
		disclosureMenus[i] = new DisclosureNav(menus[i]);
		disclosureMenus[i].init();
	}
}, false);

DisclosureNav.prototype.init = function () {
	// Dropdown menu toggles.
	var buttons = this.rootNode.querySelectorAll('.disclosure-menu-toggle');

	for (var i = 0; i < buttons.length; i++) {
		var button = buttons[i];
		var menu = button.parentNode.querySelector('ul');

		if (menu) {
			// Save ref to button and controlled menu.
			this.triggerNodes.push(button);
			this.controlledNodes.push(menu);

			// Reset menus.
			button.setAttribute('aria-expanded', 'false');
			this.toggleMenu(menu, false);

			// Attach event listeners.
			menu.addEventListener('keydown', this.handleMenuKeyDown.bind(this));
			button.addEventListener('click', this.handleButtonClick.bind(this));
			button.addEventListener('keydown', this.handleButtonKeyDown.bind(this));
		}
	}

	// Mobile menu toggle.
	var mobileButton = this.container.querySelector('.mobile-menu-toggle');
	var mobileMenu = this.container.querySelector('#mobile-menu');
	
	if (mobileMenu) {
		// Save ref to button and controlled menu.
		this.triggerNodes.push(mobileButton);
		this.controlledNodes.push(mobileMenu);

		// Attach event listeners.
		mobileMenu.addEventListener('keydown', this.handleMenuKeyDown.bind(this));
		mobileButton.addEventListener('click', this.handleButtonClick.bind(this));
		mobileButton.addEventListener('keydown', this.handleButtonKeyDown.bind(this));
	}

	// Global listeners.
	this.rootNode.addEventListener('focusout', this.handleBlur.bind(this));
	this.container.addEventListener('keydown', this.handleKeyDown.bind(this));
	
};

DisclosureNav.prototype.toggleMenu = function (domNode, show) {
	if (domNode) {
		if ( show ) {
			if (  'mobile-menu' === domNode.id ) {
				domNode.classList.remove('hidden');
			} else {
				domNode.classList.remove('hidden');
				domNode.classList.add('show');
			}
		} else {
			if (  'mobile-menu' === domNode.id ) {
				domNode.classList.add('hidden');
			} else {
				domNode.classList.add('hidden');
				domNode.classList.remove('show');
			}
		}
	}
};

DisclosureNav.prototype.toggleExpand = function (index, expanded) {
	// Handle menu at called index.
	if (this.triggerNodes[index]) {
		this.openIndex = expanded ? index : null;

		this.triggerNodes[index].setAttribute('aria-expanded', expanded);
		this.toggleMenu(this.controlledNodes[index], expanded);
	}
};

DisclosureNav.prototype.controlFocusByKey = function (keyboardEvent, nodeList, currentIndex) {
	switch (keyboardEvent.key) {
		case 'ArrowUp':
		case 'ArrowLeft':
			keyboardEvent.preventDefault();
			if (currentIndex > -1) {
				var prevIndex = Math.max(0, currentIndex - 1);
				nodeList[prevIndex].focus();
			}
			break;
		case 'ArrowDown':
		case 'ArrowRight':
			keyboardEvent.preventDefault();
			if (currentIndex > -1) {
				var nextIndex = Math.min(nodeList.length - 1, currentIndex + 1);
				nodeList[nextIndex].focus();
			}
			break;
		case 'Home':
			keyboardEvent.preventDefault();
			nodeList[0].focus();
			break;
		case 'End':
			keyboardEvent.preventDefault();
			nodeList[nodeList.length - 1].focus();
			break;
	}
};

/* Close all menus */
DisclosureNav.prototype.closeAllMenus = function () {
	var buttons = this.rootNode.querySelectorAll('button[aria-expanded][aria-controls]');

	for (var i = 0; i < buttons.length; i++) {
		var button = buttons[i];
		var menu = button.parentNode.querySelector('ul');

		if (menu) {
			// Save ref to button and controlled menu.
			this.triggerNodes.push(button);
			this.controlledNodes.push(menu);

			// Reset menus.
			button.setAttribute('aria-expanded', 'false');
			this.toggleMenu(menu, false);
		}
	}

	// Mobile menu toggle.
	var mobileButton = this.container.querySelector('.mobile-menu-toggle');
	var mobileMenu = this.container.querySelector('#mobile-menu');
	
	if (mobileMenu) {
		// Save ref to button and controlled menu.
		this.triggerNodes.push(mobileButton);
		this.controlledNodes.push(mobileMenu);

		// Reset menus.
		mobileButton.setAttribute('aria-expanded', 'false');
		this.toggleMenu(mobileMenu, false);
	}
};

/* Event Handlers */
DisclosureNav.prototype.handleBlur = function (event) {
	var menuContainsFocus = this.rootNode.contains(event.relatedTarget);
	if (!menuContainsFocus && this.openIndex !== null) {
		this.toggleExpand(this.openIndex, false);
	}
};

DisclosureNav.prototype.handleKeyDown = function (event) {
	// Close on escape.
	if (event.key === 'Escape') {
		this.closeAllMenus();
	}
};


DisclosureNav.prototype.handleButtonKeyDown = function (event) {
	var targetButtonIndex = this.triggerNodes.indexOf(document.activeElement);

	// Move focus into the open menu if the current menu is open.
	if (this.useArrowKeys && this.openIndex === targetButtonIndex && event.key === 'ArrowDown') {
		event.preventDefault();
		this.controlledNodes[this.openIndex].querySelector('a').focus();
	}

	// Handle arrow key navigation between top-level buttons, if set.
	else if (this.useArrowKeys) {
		this.controlFocusByKey(event, this.triggerNodes, targetButtonIndex);
	}
};

DisclosureNav.prototype.handleButtonClick = function (event) {
	var button = event.target;
	var buttonIndex = this.triggerNodes.indexOf(button);

	var buttonExpanded = button.getAttribute('aria-expanded') === 'true';
	this.closeFirstLevelMenus( this.triggerNodes[buttonIndex] );
	this.toggleExpand(buttonIndex, !buttonExpanded);
};

DisclosureNav.prototype.handleMenuKeyDown = function (event) {
	if (this.openIndex === null) {
		return;
	}

	var menuLinks = Array.prototype.slice.call(this.controlledNodes[this.openIndex].querySelectorAll('a'));
	var currentIndex = menuLinks.indexOf(document.activeElement);

	// Handle arrow key navigation within menu links, if set.
	if (this.useArrowKeys) {
		this.controlFocusByKey(event, menuLinks, currentIndex);
	}
};

// Switch on/off arrow key navigation.
DisclosureNav.prototype.updateKeyControls = function (useArrowKeys) {
	this.useArrowKeys = useArrowKeys;
};

// Close other menus if click was for first level.
DisclosureNav.prototype.closeFirstLevelMenus = function (element) {
	var screenWidth = window.innerWidth
	|| document.documentElement.clientWidth
	|| document.body.clientWidth;

	// Detect that we have 
	if ( element.classList.contains( 'toggle-level--1' ) && screenWidth >= mobileBreak ) {
		this.closeAllMenus();
	}
}