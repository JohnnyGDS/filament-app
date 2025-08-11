<?php

namespace App\Helpers;

class URLHelper
{
	public static function createLink(string $url, $returnAsString = false): mixed
	{
		$isExternal = false;

		// Check for relative URL
		if (str_starts_with($url, '.') || str_starts_with($url, '/')) {
			// leave it alone
			return self::conditionallyConvertToString([
				'href' => $url,
				'target' => '_self',
				'rel' => '',
			], $returnAsString);
		}

		// Check for external http(s) URL
		if (str_starts_with($url, 'http')) {
			$isExternal = true;
			// Check if the url contains this domain
			// schemeAndHttpHost() could be used here, but may cause issues between http and https if the site changes
			if (str_contains($url, '://'.request()->getHttpHost())) {
				$isExternal = false;
			}
		}
		// else if string is not another protocol (ftp, mailto, tel) and contains a dot
		else if(!str_contains($url, ':') && str_contains($url, '.')) {
			// This is probably an external URL that they forgot to put http(s) on
			// e.g 'google.com'
			$isExternal = true;
			$url = 'https://' . $url;
		}

		return self::conditionallyConvertToString([
			'href' 		=> $url,
			'target'	=> $isExternal ? '_blank' : '_self',
			'rel' 		=> $isExternal ? 'noopener noreferrer' : '',
		], $returnAsString);
	}

	private static function conditionallyConvertToString($output, $returnAsString): mixed
	{
		if($returnAsString) {
			return 'href="' . $output['href'] . '" target="' . $output['target'] . '" rel="' . $output['rel'] . '"';
		}
		return $output;
	}

}