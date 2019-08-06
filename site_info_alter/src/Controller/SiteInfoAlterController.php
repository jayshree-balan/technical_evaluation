<?php

namespace Drupal\site_info_alter\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class SiteInfoAlterController extends ControllerBase {
	public function content($site_api_key,$node_id) {
		// Load the site name out of configuration.
		$siteapikey = \Drupal::config('system.site')->get('siteapikey');
		$current_url = \Drupal::request()->getRequestUri();
		
		// If siteapikey and node_id doesn't match, redirect to Access denied page
		if (!strpos($current_url,$siteapikey) || $node_id=='') {
			throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
		}
		else{
			// Return node data in Json format
			$json_array = array();
			$node = \Drupal::entityTypeManager()->getStorage('node')->load($node_id);
			if($node){
				$json_array = (array('site_api_key' => $site_api_key,
									'page_id' => $node_id,
									'page_title' => $node->get('title')->value,
									'page_description' => $node->get('body')->value));
			}
			return new JsonResponse($json_array);	
		}
	}
}
