const init = () => {
	const previousButton = document.getElementById("previous-item");
	const nextButton = document.getElementById("next-item");
	let startX = 0;
	let endX = 0;
	const portion = screen.width / 6;


	document.onkeydown = (e) => {
		const key = e.keyCode;
		if (39 === key) {
			nextButton.click();
		} else if (37 === key) {
			previousButton.click();
		}
	}

	addEventListener('touchstart', (e) => {
		startX = e.screenX;
		startX = 'undefined' === typeof startX ? e.changedTouches[0].clientX : startX;
	}, false);

	addEventListener('touchend', (e) => {
		endX = e.screenX;
		endX = 'undefined' === typeof endX ? e.changedTouches[0].clientX : endX;

		if (startX < endX && (endX - startX) > portion) {
			previousButton.click();
		} else if (startX > endX && (startX - endX) > portion) {
			nextButton.click();
		}
	}, false);
}

window.addEventListener('load', () => {
	if (document.getElementById('nav-controls')) {
		init();
	}
});
