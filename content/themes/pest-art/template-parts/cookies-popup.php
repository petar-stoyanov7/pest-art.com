<?php
/**
 * The template for displaying cookies popup
 *
 * @package Pesticide
 * @since Pesticide 0.0.1
 */

//
?>

<div class="pa-cookies" id="cookies-popup">
    <div class="pa-cookies__cover">
        <figure class="pa-cookies__cover-image">
            <img src="" alt="Cookie Image">
        </figure>
    </div>
    <div class="pa-cookies__controls">
        <button id="select-en" class="is-hidden">en</button>
        <button id="select-bg" class="is-visible">bg</button>
    </div>
	<div class="pa-cookies__text">
		<div id="text-bg" class="pa-cookies__text-entry is-visible">
			<p>
				Внимание!
			</p>
			<p>
				Този сайт използва курабии! Курабиите са богати на глутен, съдържат животински продукти и са продукт на
				животински труд. Тествани са от животни и върху животни, хора, и компютри. Богати са на холестерол,
                евтино чувство за хумор, плоски шеги и грубиянщини. Може да съдържат следи от ирония.
			</p>
            <p>
                С посещението си в този сайт се съгласявате да гледате некадърни карикатури, дебелашки шеги и просташки
                хумор. Авторът не носи никаква отговорност за причинените щети.
            </p>
            <p>
                Fuck GDPR!
            </p>
		</div>
		<div id="text-en" class="pa-cookies__text-entry is-hidden">
			<p>
				Warning!
			</p>
			<p>
                This site uses cookies! Said cookies are gluten rich, contain animal products and are product of
                animal labor. They are tested by animals on animals, people and computers. They are cholesterol rich,
                contain cheap humor, dumb jokes and a lot of overall rudeness. Might contain traces of irony.
			</p>
            <p>
                By visiting this site you agree to watch badly drawn caricatures, rude jokes and coarse humor.
                The author bears no responsibility for the damages dealt.
            </p>
            <p>
                Fuck GDPR!
            </p>
        </div>
	</div>
    <div class="pa-cookies__actions">
        <button class="agree" id="cookies-agree"></button>
        <button class="disagree" id="cookies-disagree"></button>
    </div>

</div>
