import mobileInit from './nav-mobile';
import desktopInit from './nav-desktop';

window.onload = () => {
	if (window.screen.width < 1024) {
		mobileInit();
	} else {
		desktopInit();
	}
}
