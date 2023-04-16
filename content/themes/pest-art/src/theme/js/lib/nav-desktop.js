import {
	hideElement,
	showElement
} from './navigation';

export default function desktopInit() {
	const nav = document.getElementById('menu-desktop-navigation');
	const search = document.querySelector('.pa-header__search');
	const overlay = document.getElementById('pa-page-overlay');

	const toggleSearch = () => {
		if (search.classList.contains('is-visible')) {
			hideElement(search);
			hideElement(overlay);
		} else {
			showElement(search);
			showElement(overlay);
		}
	}

	nav.querySelector('.menu-search, .menu-search > a').addEventListener('click', (e) => {
		e.preventDefault();
		toggleSearch();
	});

	overlay.addEventListener('click', () => {
		hideElement(search);
		hideElement(overlay);
	});
}
