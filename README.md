drupal-hello
============

An example of tested, devopsy Drupal for a job application



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