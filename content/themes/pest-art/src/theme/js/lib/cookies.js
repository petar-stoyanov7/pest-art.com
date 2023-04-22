import {hideElement, showElement} from './navigation'

const createConsentCookie = () => {
	let expiry = new Date();
	console.log(expiry.toString());
	expiry.setMonth(expiry.getMonth() + 1);
	console.log(expiry.toString());

	document.cookie = `pa-cookie-consent=y, expires=${expiry.toString()}`;
}

const cookiesInit = () => {
	const cookiesWindow = document.getElementById('cookies-popup');
	const buttonEn = document.getElementById('select-en');
	const buttonBg = document.getElementById('select-bg');
	const textEn = document.getElementById('text-en');
	const textBg = document.getElementById('text-bg');
	const buttonAgree = document.getElementById('cookies-agree');
	const buttonDisagree = document.querySelectorAll('button.disagree');
	const pageOverlay = document.getElementById('cookies-overlay');
	console.log(pageOverlay);


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
	buttonDisagree.forEach((button) => {
		button.addEventListener('click', () => {
			hideElement(cookiesWindow);
			hideElement(pageOverlay);
		});
	});
}


window.onload = () => {
	if (document.getElementById('cookies-popup')) {
		console.log('start');
		cookiesInit();
	}
}
