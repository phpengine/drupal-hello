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
                  "host-name" => "www.drupal-hello.vm",
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Next create our virtual host"), ) ),
              array ( "ApacheVHostEditor" => array( "add" => array (
                  "guess" => true,
                  "vhe-docroot" => "/var/www/drupal-hello/",
                  "vhe-url" => "www.drupal-hello.vm",
                  "vhe-ip-port" => $this->getCurrentTargetFromPapyrusLocal(),
                  "vhe-vhost-dir" => "/etc/apache2/sites-available",
                  "vhe-template" => $this->getTemplate(),
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Next ensure our db file configuration is reset to blank" ), ), ),
              array ( "DBConfigure" => array( "drupal7-reset" => array(
                  "parent-path" => "/var/www/drupal-hello/",
                  "platform" => "drupal7",
              ), ), ),

              array ( "Logging" => array( "log" => array("log-message" => "Next configure our projects db configuration file"), ) ),
              array ( "DBConfigure" => array( "drupal7-conf" => array(
                  "parent-path" => "/var/www/drupal-hello/",
                  "mysql-host" => "127.0.0.1",
                  "mysql-user" => "ph_user",
                  "mysql-pass" => "ph_pass",
                  "mysql-db" => "ph_db",
                  "mysql-platform" => "drupal7",
                  "mysql-admin-user" => "root",
                  "mysql-admin-pass" => "cleopatra",
              ), ) , ) ,

              array ( "Logging" => array( "log" => array( "log-message" => "Now lets drop our current database if it exists"), ) ),
              array ( "DBInstall" => array( "drop" => array(
                  "parent-path" => "/var/www/drupal-hello/",
                  "mysql-host" => "127.0.0.1",
                  "mysql-user" => "ph_user",
                  "mysql-pass" => "ph_pass",
                  "mysql-db" => "ph_db",
                  "mysql-platform" => "drupal7",
                  "mysql-admin-user" => "root",
                  "mysql-admin-pass" => "cleopatra",
              ), ), ),

              array ( "Logging" => array( "log" => array("log-message" => "Now lets install our database"), ), ),
              array ( "DBInstall" => array( "install" => array(
                  "parent-path" => "/var/www/drupal-hello/",
                  "mysql-host" => "127.0.0.1",
                  "mysql-user" => "ph_user",
                  "mysql-pass" => "ph_pass",
                  "mysql-db" => "ph_db",
                  "mysql-platform" => "drupal7",
                  "mysql-admin-user" => "root",
                  "mysql-admin-pass" => "cleopatra",
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Now lets restart Apache so we are serving our new application version", ), ), ),
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

# NameVirtualHost ****IP ADDRESS****:443
# <VirtualHost ****IP ADDRESS****:443>
# 	 ServerAdmin webmaster@localhost
# 	 ServerName ****SERVER NAME****
# 	 DocumentRoot ****WEB ROOT****src
   # SSLEngine on
 	 # SSLCertificateFile /etc/apache2/ssl/ssl.crt
   # SSLCertificateKeyFile /etc/apache2/ssl/ssl.key
   # SSLCertificateChainFile /etc/apache2/ssl/bundle.crt
# 	 <Directory ****WEB ROOT****src>
# 		 Options Indexes FollowSymLinks MultiViews
#		AllowOverride All
#		Order allow,deny
#		allow from all
#	</Directory>
#  ErrorLog /var/log/apache2/error.log
#  CustomLog /var/log/apache2/access.log combined
#  </VirtualHost>
TEMPLATE;

        return $template ;
    }

    protected function getCurrentTargetFromPapyrusLocal() {
        $plf = file_get_contents("/var/www/drupal-hello/papyrusfilelocal") ;
        $pfu = unserialize($plf) ;
        if (is_array($pfu) && count($pfu)>0) {
            return $pfu["phlagrant-box"]["target"] ; }
        return null ;
    }



}
