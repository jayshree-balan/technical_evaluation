#This module alters the existing Drupal "Site Information" form. 
Specifics:

* A new form text field named "Site API Key" is added to the "Site Information" form with the default value of “No API Key yet”.
* When this form is submitted, the value that the user entered for this field is saved as the system variable named "siteapikey".
* A Drupal message informs the user that the Site API Key has been saved with that value.
* When this form is visited after the "Site API Key" is saved, the field is populated with the correct value.
* The text of the "Save configuration" button is changed to "Update Configuration".
* This module also provides a URL that responds with a JSON representation of a given node with the content type "basic page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".


#URL for Reference
http://localhost/drupal_assignment/admin/config/system/site-information

http://localhost/drupal_assignment/page_json/FOOBAR12345/1
