import {hideElement, showElement} from './navigation'

const createConsentCookie = () => {
	let expiry = new Date();
	expiry.setMonth(expiry.getMonth() + 1);
	document.cookie = `pa-cookie-consent=y, expires=${expiry.toString()}`;
}

const cookiesInit = () => {
	const cookiesWindow = document.getElementById('cookies-popup');
	const pageOverlay = document.getElementById('pa-page-overlay');
	const buttonEn = document.getElementById('select-en');
	const buttonBg = document.getElementById('select-bg');
	const textEn = document.getElementById('text-en');
	const textBg = document.getElementById('text-bg');
	const buttonAgree = document.getElementById('cookies-agree');
	const buttonDisagree = document.getElementById('cookies-disagree');

	showElement(pageOverlay);

	buttonEn.addEventListener('click', () => {
		hideElement(buttonBg);
		hideElement(textBg);
		showElement(buttonEn);
		showElement(textEn);
	});
	buttonBg.addEventListener('click', () => {
		hideElement(buttonEn);
		hideElement(textEn);
		showElement(buttonBg);
		showElement(textBg);
	});

	buttonAgree.addEventListener('click', () => {
		createConsentCookie();
		hideElement(cookiesWindow);
		hideElement(pageOverlay);
	});
	buttonDisagree.addEventListener('click', () => {
		hideElement(cookiesWindow);
		hideElement(pageOverlay);
	});
}


window.onload = () => {
	if (document.getElementById('cookies-popup')) {
		console.log('start');
		cookiesInit();
	}
}
