<?php

Namespace Core ;

class AutoPilotConfigured extends AutoPilot {

    public $steps ;
    protected $myUser ;

    public function __construct() {
        $this->setSteps();
        $this->addDapperfileToStepsIfProvided();
    }

    /* Steps */
    protected function setSteps() {

        $this->steps =
            array(
                array ( "Logging" => array( "log" => array( "log-message" => "Lets begin Configuration of a Phlagrant Box"),),),

                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure the Phlagrant user can use Sudo without a Password"),),),
                array ( "SudoNoPass" => array( "install" => array(
                    "install-user-name" => "phlagrant"
                ),),),

                // PHP Modules
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure our common PHP Modules are installed" ),),),
                array ( "PHPModules" => array( "ensure" => array(),),),

                // All Pharoes
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Cleopatra" ),),),
                array ( "Cleopatra" => array( "ensure" => array(),),),
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Dapperstrano" ),),),
                array ( "Dapperstrano" => array( "ensure" => array(),),),
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Testingkamen" ),),),
                array ( "Testingkamen" => array( "ensure" => array(),),),

                // Apache
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Apache Server is installed" ),),),
                array ( "ApacheServer" => array( "ensure" =>  array("version" => "2.2"), ), ),

                // Apache Modules
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure our common Apache Modules are installed" ),),),
                array ( "ApacheModules" => array( "ensure" => array(),),),

                // Apache Modules
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure our common Apache Modules are installed" ),),),
                array ( "ApacheReverseProxyModules" => array( "ensure" => array(),),),

                // Standard Tools
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure some standard tools are installed" ),),),
                array ( "StandardTools" => array( "ensure" => array(),),),

                // Git Tools
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure some git tools are installed" ),),),
                array ( "GitTools" => array( "ensure" => array(),),),

                // Git Key Safe
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Git SSH Key Safe version is are installed" ),),),
                array ( "GitKeySafe" => array( "ensure" => array(),),),

                /* BDD Testing */

                // Selenium Server
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Selenium Server is installed"),),),
                array ( "SeleniumServer" => array( "ensure" => array("guess" => true ),),),

                // Start the Selenium Server
                array ( "Logging" => array( "log" => array( "log-message" => "Lets also start Selenium so we can use it"),),),
                array ( "RunCommand" => array("install" => array(
                    "guess" => true,
                    "command" => 'selenium > /tmp/selenium-output.out 2> /tmp/selenium-error.err < /dev/null &',
                    "nohup" => true
                ),),),

                // Behat
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Behat is installed"),),),
                array ( "Behat" => array( "ensure" => array("guess" => true ),),),

                // Restart Apache for new modules
                array ( "Logging" => array( "log" => array( "log-message" => "Lets restart Apache for our PHP and Apache Modules" ),),),
                array ( "RunCommand" => array( "install" => array(
                    "guess" => true,
                    "command" => "dapperstrano apachecontrol restart --yes --guess",
                ) ) ),

                /* Package Managers */
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Pear is installed"),),),
                array ( "Pear" => array( "ensure" => array("guess" => true ),),),


                /* Build/CI Servers & Build Tools */

                // Drush
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Drush for Drupal" ),),),
                array ( "PackageManager" => array( "pkg-ensure" => array(
                    "package-name" => "drush/drush",
                    "packager-name" => "Pear",
                    "pear-channel" => "pear.drush.org",
                    "all-dependencies" => true
                ), ),),

                // Jenkins
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Jenkins is installed" ),),),
                array ( "Jenkins" => array( "ensure" => array(),),),
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Jenkins PHP Plugins are installed"),),),
                array ( "JenkinsPlugins" => array( "ensure" => array(),),),
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure the Jenkins user can use Sudo without a Password"),),),
                array ( "JenkinsSudoNoPass" => array( "ensure" => array(),),),

                // Bash script to create jenkins job
                // ususlly would use a platform independent method, but time
                array ( "Logging" => array( "log" => array( "log-message" => "Lets create our jenkins job"),),),
                array ( "RunCommand" => array("install" => array(
                    "guess" => true,
                    "command" => 'sh /var/www/drupal-hello/build/config/jenkins/create_job.sh',
                ),),),

                array ( "Logging" => array( "log" => array( "log-message" => "Lets also restart Jenkins"),),),
                array ( "RunCommand" => array("install" => array(
                    "guess" => true,
                    "command" => 'sudo service jenkins restart',
                ),),),

                //Mysql
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure Mysql Server is installed" ),),),
                array ( "MysqlServer" => array( "ensure" =>  array(
                    "version" => "5",
                    "version-operator" => "+"
                ), ), ),
                array ( "Logging" => array( "log" => array( "log-message" => "Lets ensure a Mysql Admin User is installed"),),),
                array ( "MysqlAdmins" => array( "install" => array(
                    "root-user" => "root",
                    "root-pass" => "cleopatra",
                    "new-user" => "root",
                    "new-pass" => "root",
                    "mysql-host" => "127.0.0.1"
                ) ) ),

                array ( "Logging" => array( "log" => array(
                    "log-message" => "Cleopatra Configuration Management of your Phlagrant VM complete"
                ),),),

            );

    }

    protected function addDapperfileToStepsIfProvided() {

        if (isset($this->params["dapperfile"])) { $dfile = $this->params["dapperfile"] ; }
        if (isset($this->params["dapper-auto"])) { $dfile = $this->params["dapper-auto"] ; }
        if (isset($this->params["dapper-autopilot"])) { $dfile = $this->params["dapper-autopilot"] ; }
        if (isset($this->params["dapperstrano-auto"])) { $dfile = $this->params["dapperstrano-auto"] ; }
        if (isset($this->params["dapperstrano-autopilot"])) { $dfile = $this->params["dapperstrano-autopilot"] ; }

        if (isset($dfile)) {

            $a1 = array ( "Logging" => array( "log" => array(
                "log-message" => "A Dapperstrano Autopilot was also provided, so we'll execute that too"
            ),),) ;
            array_push($this->steps, $a1) ;

            $a2 = array ( "RunCommand" => array( "install" => array(
                "guess" => true,
                "command" => "sudo dapperstrano auto x --yes --guess --af=$dfile",
            ) ) ) ;
            array_push($this->steps, $a2) ;

            $a3 = array ( "Logging" => array( "log" => array(
                "log-message" => "Dapperstrano Automated Application Deployment of your Phlagrant VM complete"
            ),),) ;
            array_push($this->steps, $a3) ;

        }

    }

}
