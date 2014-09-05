<?php

/*************************************
*      Generated Autopilot file      *
*     ---------------------------    *
*Autopilot Generated By Dapperstrano *
*     ---------------------------    *
*************************************/

Namespace Core ;

class AutoPilotConfigured extends AutoPilot {

    public $steps ;

    public function __construct() {
	    $this->setSteps();
    }

    /* Steps */
    private function setSteps() {

	    $this->steps =
	      array(

              array ( "Logging" => array( "log" => array( "log-message" => "Lets initialize our new download directory as a dapper project"), ) ),
              array ( "Project" => array( "init" => array(), ) , ) ,

              array ( "Logging" => array( "log" => array( "log-message" => "Next create our host file entry for our local URL"), ) ),
              array ( "HostEditor" => array( "add" => array (
                  "guess" => true,
                  "host-name" => "www.drupal-jenkins.vm",
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Next create our virtual host"), ) ),
              array ( "ApacheVHostEditor" => array( "add" => array (
                  "guess" => true,
                  "vhe-docroot" => "/var/www/drupal-hello/",
                  "vhe-url" => "www.drupal-hello.vm",
                  "vhe-ip-port" => "0.0.0.0",
                  "vhe-vhost-dir" => "/etc/apache2/sites-available",
                  "vhe-template" => $this->getTemplate(),
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Now lets restart Apache so we are serving our Jenkins vhost", ), ), ),
              array ( "ApacheControl" => array( "restart" => array(
                  "guess" => true,
              ), ), ),

	      );

	  }


    private function getTemplate() {
        $template =
            <<<'TEMPLATE'
           NameVirtualHost ****IP ADDRESS****:80
 <VirtualHost ****IP ADDRESS****:80>
    ServerAdmin webmaster@localhost
 	ServerName ****SERVER NAME****
 	DocumentRoot ****WEB ROOT****src
 	<Directory ****WEB ROOT****src>
 		Options Indexes FollowSymLinks MultiViews
 		AllowOverride All
 		Order allow,deny
 		allow from all
 	</Directory>
   ErrorLog /var/log/apache2/error.log
   CustomLog /var/log/apache2/access.log combined
 </VirtualHost>

 <VirtualHost ****IP ADDRESS****:80>
    ServerAdmin webmaster@localhost
 	ServerName ****SERVER NAME****
    ProxyPreserveHost On
    ProxyPass / http://127.0.0.1:8080/
    ProxyPassReverse / http://127.0.0.1:8080/
    ServerName hostname.example.com
</VirtualHost>

TEMPLATE;

        return $template ;
    }



}
