import {
	hideElement,
	showElement
} from './navigation';

export default function mobileInit() {
	const mobileMenu = document.getElementById('menu-mobile-navigation');
	const subMenu = mobileMenu.querySelector('.sub-menu')
	const pageOverlay = document.getElementById('pa-page-overlay');
	const searchForm = document.querySelector('.pa-header__search');


	const toggleElement = (element, overlay) => {
		const other = element === searchForm ? subMenu : searchForm;

		if (element.classList.contains('is-visible')) {
			hideElement(element);
			overlay.classList.remove('is-visible');

		} else {
			showElement(element);
			overlay.classList.add('is-visible');
			if (other.classList.contains('is-visible')) {
				hideElement(other);
			}
		}
	}

	mobileMenu.querySelector('.menu-toggler > a').addEventListener('click', (e) => {
		e.preventDefault();
		toggleElement(subMenu);
	});

	mobileMenu.querySelector('.menu-search, .menu-search > a').addEventListener('click', (e) => {
		e.preventDefault();
		toggleElement(searchForm);
	});

	mobileMenu.querySelector('.close-button, .close-button > a').addEventListener('click', (e) => {
		e.preventDefault();
		hideElement(subMenu);
		pageOverlay.classList.remove('is-visible');
	});

	pageOverlay.addEventListener('click', () => {
		if (subMenu.classList.contains('is-visible')) {
			hideElement(subMenu);
		}
		if (searchForm.classList.contains('is-visible')) {
			hideElement(searchForm);
		}
		pageOverlay.classList.remove('is-visible');
	});
}


