<?php
class UrlRuleDash extends CBaseUrlRule
{
	/**
	 * Creates a URL based on this rule.
	 * @param CUrlManager $manager the manager
	 * @param string $route the route
	 * @param array $params list of parameters
	 * @param string $ampersand the token separating name-value pairs in the URL.
	 * @return mixed the constructed URL or false on error
	 */
	public function createUrl($manager,$route,$params,$ampersand) {
		if ($route === 'properties/index') {
			$url = '';
			$url.='/'.$manager->createPathInfo($params,'_','/');
			return 'properties/search'.$url;
		}
		else {
			return false;
		}
	}
	
	/**
	 * Parses a URL based on this rule.
	 * @param CUrlManager $manager the URL manager
	 * @param CHttpRequest $request the request object
	 * @param string $pathInfo path info part of the URL
	 * @param string $rawPathInfo path info that contains the potential URL suffix
	 * @return mixed the route that consists of the controller ID and action ID or false on error
	 */
	public function parseUrl($manager,$request,$pathInfo,$rawPathInfo) {
		
		if (preg_match('%properties/search%', $rawPathInfo) == 1) {
			$rawPathInfo = str_replace('properties/search','',$rawPathInfo);
			$pairs = explode('/',$rawPathInfo);
			foreach($pairs as $pair) {
				if ($pair != '') {
					$exploded = explode('_',$pair);
					if (sizeof($exploded) == 2) {
						$_REQUEST[$exploded[0]] = $_GET[$exploded[0]] = $exploded[1];
					} elseif (sizeof($exploded == 3)) {
						$_REQUEST[$exploded[0].'_'.$exploded[1]] = $_GET[$exploded[0].'_'.$exploded[1]] = $exploded[2];
					}
				}
			}
			return 'properties/index';
		} else {
			return false;
		}
	}	
}