<?php
/**
 * This file contains the archive pagination
 */


/**
 * Generates pagination for archive page
 * @return string|void
 */
function archivePagination($wp_query = false, $page = false)
{
	if (!$wp_query) {
		global $wp_query;
	}
	$result = '';
	$big = 999999999999;
	$queriedObject = get_queried_object();
	$queryString = '';

	if (count($_GET) > 0) {
		$queryString = '?';

		foreach ($_GET as $param => $value) {
			$queryString .= urlencode($param);
			$queryString .= !empty($value) ? '=' . urlencode($value) : '';
			$queryString .= '&';
		}
	}
	$queryString = rtrim($queryString, '&');

	if (is_a($queriedObject, 'WP_Term')) {
		$link = get_term_link($queriedObject);
	} elseif (is_a($queriedObject, 'WP_Post_Type')) {
		$link = get_post_type_archive_link($queriedObject->name);
	} else {
		$link = get_home_url();
	}

	$currentPage = $page;
	if (!$currentPage) {
		$currentPage = get_query_var( 'paged' );
		$currentPage = 0 === $currentPage ? 1 : $currentPage;
	}
	$maxPage = $wp_query->max_num_pages;

	$paginateLinks = paginate_links(
		[
			'base'      => str_replace($big, '%#%', html_entity_decode(get_pagenum_link($big))),
			'current'   => max(1, $currentPage),
			'total'     => $maxPage,
			'mid_size'  => 1,
			'end_size'  => 2,
			'prev_next' => false,
			'type'      => 'array',
		]
	);

	if (empty($paginateLinks)) {
		return '';
	}

	$prevClass = 'pa-pagination__button is-previous';
	$prevClass .= 1 === (int)$currentPage ? ' is-disabled' : '';
	$prevPage = (int)$currentPage - 1;

	$nextClass = 'pa-pagination__button is-next';
	$nextClass .= (int)$maxPage === (int)$currentPage ? ' is-disabled' : '';
	$nextPage = (int)$currentPage + 1;

	$prevLink = "{$link}/page/{$prevPage}/{$queryString}";
	$nextLink ="{$link}/page/{$nextPage}/{$queryString}";

	if (is_search()) {
		$prevLink = "{$link}/page/{$prevPage}/{$queryString}";
		$nextLink = "{$link}/page/{$nextPage}/{$queryString}";
	}

	$prev = <<<html
<div class="{$prevClass}">
	<a href="{$prevLink}"></a>
</div>
html;
	$next = <<<html
<div class="{$nextClass}">
	<a href="{$nextLink}"></a>
</div>
html;

	array_unshift($paginateLinks, $prev);
	$paginateLinks[] = $next;

	echo implode('',$paginateLinks);
}


function defaultPagination($query = null) {
	if (empty($query)) {
		global $wp_query;
	} else {
		$wp_query = $query;
	}

	$big = 999999999;

	$paginateLinks = paginate_links(
		array(
			'base'      => str_replace($big, '%#%', html_entity_decode(get_pagenum_link($big))),
			'current'   => max(1, get_query_var('paged')),
			'total'     => $wp_query->max_num_pages,
			'mid_size'  => 5,
			'prev_next' => true,
			'prev_text' => '',
			'next_text' => '',
			'type'      => 'list',
		)
	);

	if ($paginateLinks) {
		$pregFind = [
			'/\s*page-numbers\s*/',
			"/\s*class=''/",
			'/<li><a class="prev" href="(\S+)">/',
			'/<li><a class="next" href="(\S+)">/',
			"/<li><span aria-current='page' class='current'>(\d+)<\/span><\/li>/",
			"/<li><a href='(\S+)'>(\d+)<\/a><\/li>/",
		];

		$pregReplace = [
			'',
			'',
			'<li class="pagination-previous"><a href="$1" aria-label="Previous page">',
			'<li class="pagination-next"><a href="$1" aria-label="Next page">',
			'<li class="current" aria-current="page"><span class="show-for-sr">You\'re on page </span>$1</li>',
			'<li><a href="$1" aria-label="Page $2">$2</a></li>',
		];

		$strFind = [
			"<ul>",
			'<li><span class="dots">&hellip;</span></li>',
		];

		$strReplace = [
			'<ul class="pagination text-center">',
			'<li class="ellipsis" aria-hidden="true"></li>',
		];

		$paginateLinks = preg_replace($pregFind, $pregReplace, $paginateLinks);
		$paginateLinks = str_replace($strFind, $strReplace, $paginateLinks);

		$paginateLinks = '<nav aria-label="Pagination">' . $paginateLinks . '</nav>';

		echo $paginateLinks;
	}
}