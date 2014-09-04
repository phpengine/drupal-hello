## drupal-hello
============

So, hello...

Here we have an example of a tested, devopsy Drupal application for a testing, devopsy job application.
Virtual Machine Management, Configuration Management, Automated application deployment, Infrastructure as Code,
Selenium Configuration, Behat Configuration and Testing, PHPUnit configuration and testing...

... all in a day's work... I prepared this for you guys today as a real world example of my Drupal Dev/DevOps
Skills.


# Install Instructions:
------------

Prerequisites: You'll need to be running Ubuntu 12-14 on your machine for this.

1) # Install Git and PHP5 if you don't already have them
sudo apt-get install -y php5 git

1) # Install Cleopatra
git clone http://git.pharaoh-tools.com/git/phpengine/cleopatra.git && sudo php cleopatra/install-silent

2) # Use a Cleopatra autopilot file to install Dapperstrano, Phlagrant and Virtualbox
sudo cleopatra auto x --af="build/config/cleoptra/cleofy/custom/cm-workstation.php"

3) # Install the Virtual Machine and Configuration with Phlagrant
phlagrant up now

4) # That might take a while, (it gets a base box, configures the Virtual Hardware, and runs provisioners)
   # ... but now you can browse the website...
   # (as a bonus, unlike Vagrant this will also provision your host (hostname) for a nice URL)
   http://www.drupal-hello.vm

5) # And also browse a jenkins build, where you'll see executable tests in PHPUnit, Behat and Selenium
   http://www.drupal-jenkins.vm



So, included is

Drupal User:
ishouldhiredave : rightnow





----------------

Here's how I set up Phlagrant

1) cleofy for phlagrant
   cleopatra cleofy install-generic-autopilots --yes --guess --template-group=phlagrant

2) create a phlagrant-box environment for dapperfying
   cleopatra env-config config-default --yes --default-environment-name=phlagrant-box
   cleopatra env-config config-default --yes --default-environment-name=phlagrant-host

3) we should be able to also run a dapperfy-phlagrant which will autofill most fields.
   dapperstrano dapperfy drupal-phlagrant --yes --guess --environment-name=phlagrant-box
   dapperstrano dapperfy drupal-phlagrant --yes --guess --environment-name=phlagrant-host

4) we run flirtify at the end of our fyers, we now piped into the phlagrant cm file which dapper install to run
   phlagrant flirt default-cleo-dapper --yes

5) bring up the box - we run the cleo provision standalone server cm (phlagrant cleofy should be based on this)