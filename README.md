## drupal-hello
============

Hi Charlie and Capgemini,

Here we have an example of a tested, devopsy Drupal application.

Virtual Machine Management, Configuration Management, Automated application deployment, Infrastructure as Code,
Selenium Configuration, Behat Configuration and Testing, PHPUnit configuration and testing, with a custom Drupal Module
and a custom Drupal theme. I prepared this for you guys today as a real world example of my Drupal Dev/ PHP DevOps /
Testing Skills.

I could have gone further on the theming layer, but I thought that creating a template with correct structure should
be okay for a quick example.


# Install Instructions:
------------

Prerequisites: You'll need to be running Ubuntu between 12 and 14 on your machine for this. I tried it on 12 and 14, it
*should* be fine on 13 too. Your user should also have sudo privileges.

1) Do this...

wget https://github.com/phpengine/drupal-hello/raw/master/capgemini-install.sh | sh

Which will install Git and PHP5 if you don't already have them, Install Cleopatra Config Management, Clone this repo,
change directory into it, use a Cleopatra autopilot file to install Dapperstrano, Phlagrant and Virtualbox,
Then Install the Virtual Machine for this project and Configuration with Phlagrant.

5) # That might take a while, (it gets a base box, configures the Virtual Hardware, and runs Config Management
     and application deployment provisioners in PHP)
   # ... but now you can browse the website...
   # (as a bonus, unlike Vagrant this will also provision your host (hostname) for a nice URL)
   http://www.drupal-hello.vm

6) # And also browse a jenkins build, where you'll see executable tests in PHPUnit, Behat and Selenium. Hit Build Now
   to have them executed. The associated software, Behat, Selenium and PHPUnit will be set up and working.
   http://www.drupal-jenkins.vm

7) When you're done gracefully close the VM with
   phlagrant halt now --fail-hard
   phlagrant destroy now
   to make sure the provisioning on your host machine is undone.

# Login Instructions
-------------

There a single admin user included, which is -

User: ishouldhiredave
Pass: rightnow