<?php
/*
 * shortUrl
 *
 * redirects short url to url
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

if ($modx->event->name == 'OnPageNotFound') {

    // include package
    $path = $modx->getOption('shorturl.core_path', null, $modx->getOption('core_path') . 'components/shorturl/');
    $path .= 'model/shorturl/';
    $shortUrlService = $modx->getService('shorturl', 'ShortUrl', $path);

    // get url parameters
    $get = $modx->getOption('GET', $modx->request->parameters, '');
    $short = rtrim($get['q'], '/');
    $url = $modx->getOption('site_url') . $short;

    // check if url exists
    $shortUrl = $modx->getObject('ShortUrlItem', array(
        'short' => $url,
    ));

    if (!$shortUrl) return;

    // update clicks
    $shortUrl->set('clicks', $shortUrl->clicks + 1);
    $shortUrl->save();

    // redirect
    $modx->sendRedirect($shortUrl->url);

    return;
}
