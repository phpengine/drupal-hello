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

Its not all perfect, there is one bug - that the Behat tests fail as they cant find selenium. It's the only bug in the stack
and I'll hopefully fix it before you read this


# Install Instructions:
------------

Prerequisites: You'll need to be running Ubuntu between 12 and 14 on your machine for this. I tried it on 12 and 14, it
*should* be fine on 13 too. Your user should also have sudo privileges.

1) Do this...

bash <(wget -qO- http://github.com/phpengine/drupal-hello/raw/master/capgemini-install.sh)

Which will install Git and PHP5 if you don't already have them, Install Cleopatra Config Management, Clone this repo,
change directory into it, use a Cleopatra autopilot file to install Dapperstrano, Phlagrant and Virtualbox,
Then Install the Virtual Machine for this project and Configuration with Phlagrant. It will then bring up the Phlagrant
box, run config management and install PHP, Apache, Selenium, Behat, PHPUnit, Jenkins, Jenkins Plugins, a Jenkins Build
already configured to execute the tests, Virtual Hosts, Host Names. Everything will work out of the box after this. All
a Managed, Reproducible, Infrastucture by (PHP) code Configuration.

2) # That might take a while... 30 minutes on my BT infinity, about 2GB of software downloadss
   # ... but now you can browse the website as a bonus, sthis will also provision your host (hostname) for a nice URL)
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