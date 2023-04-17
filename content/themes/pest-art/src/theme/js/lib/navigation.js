import mobileInit from './nav-mobile';
import desktopInit from './nav-desktop';

export const hideElement = (element) => {
	element.classList.add('is-hidden');
	element.classList.remove('is-visible');
}
export const showElement = (element) => {
	element.classList.remove('is-hidden');
	element.classList.add('is-visible');
}

window.addEventListener('load', () => {
	if (window.screen.width < 1024) {
		mobileInit();
	} else {
		desktopInit();
	}
});
