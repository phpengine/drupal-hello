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
                array ( "Logging" => array( "log" => array(
                    "log-message" => "Lets begin invoking Code, Database Data and Data Configuration on environment phlagrant-box"
                ), ) ),
                array ( "Logging" => array( "log" => array(
                    "log-message" => "First lets SFTP over our Dapper Autopilot"
                ), ) ),
                array ( "SFTP" => array( "put" => array(
                    "guess" => true,
                    "source" => getcwd()."/build/config/dapperstrano/dapperfy/autopilots/generated/phlagrant-box-node-install-code-data.php",
                    "target" => "/tmp/phlagrant-box-node-install-code-data.php",
                    "environment-name" => "phlagrant-box"
                ) , ) , ) ,
                array ( "Logging" => array( "log" => array(
                    "log-message" => "Lets run that autopilot"
                ), ) ),
                array ( "Invoke" => array( "data" =>  array(
                    "guess" => true,
                    "ssh-data" => $this->setSSHData(),
                    "environment-name" => "phlagrant-box"
                ), ), ),
                array ( "Logging" => array( "log" => array(
                    "log-message" => "Invoking Code, Database Data and Data Configuration on environment phlagrant-box complete"
                ), ) ),
            );

    }

    private function setSSHData() {
        $sshData = <<<"SSHDATA"
cd /tmp/
sudo dapperstrano autopilot execute --autopilot-file="phlagrant-box-node-install-code-data.php"
sudo rm phlagrant-box-node-install-code-data.php
SSHDATA;
        return $sshData ;
    }

}
