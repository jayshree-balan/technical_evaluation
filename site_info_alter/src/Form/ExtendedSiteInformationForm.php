<?php

namespace Drupal\site_info_alter\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;
// This is the core form we are extending
use Drupal\system\Form\SiteInformationForm;

class ExtendedSiteInformationForm extends SiteInformationForm {
	public function buildForm(array $form, FormStateInterface $form_state) {
		$site_config = $this->config('system.site');
		$form =  parent::buildForm($form, $form_state);
		$form['site_information']['siteapikey'] = [
			'#type' => 'textfield',
			'#title' => t('Site API Key'),
			'#default_value' => $site_config->get('siteapikey') ?: 'No API Key yet',
		];
		
		return $form;
	}
	
	 public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->config('system.site')
		  ->set('siteapikey', $form_state->getValue('siteapikey'))
		  ->save();
		parent::submitForm($form, $form_state);
		if($form_state->getValue('siteapikey') != ''){
			 drupal_set_message($this->t("The Site API Key has been saved with value ".$form_state->getValue('siteapikey').""));
		}
	 }
}

?>