<?php
/**
 * The template for displaying Wordpress footer and all its scripts
 *
 * @package Pesticide
 * @since Pesticide 0.0.1
 */

if (empty($_COOKIE['pa-cookie-consent'])) {
	get_template_part( 'template-parts/cookies-popup' );
}
?>

<footer class="pa-footer">
    <div class="pa-footer__container">
        <div class="pa-footer__text">
		    <?php //TODO: replace with dynamic content; ?>
            <p>
                Този сайт, както и всичките изображения в него са създадени благодарение на робския труд на ментално
                нестабилни индивиди. Индивидите не носят отговорност за причинените психически, психиатрически, физически,
                химически, зодиакални и други увреждания у зрителската аудитория.
            </p>
            <p>
                Целта на сайта е сатира и забавление. Ако някой се почувства обиден, огорчен, наранен, увреден или
                нападнат - супер! Посетителите са в пълната свобода да пуснат официално оплакване до
                <a href="https://armenianchurch-sofia.org/" target="_blank">съответните органи.</a>
            </p>
            <p>
                Използването на съдържание от този сайт в комерсиални медии без изричното съгласие на автора може да доведе
                до срещи в съд.
            </p>
            <p>
                За повече информация - секцията с
                <a href="/about">контакти</a>.
            </p>
        </div>
        <div class="pa-footer__menu">
		    <?php paFooterMenu() ?>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>

</html>