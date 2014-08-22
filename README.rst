Send automated SMS from your web application and android phone
==============================================================

Free web api service provided courtsey: http://www.makemymails.com
To use this library you have to signup for a free web account on makemymails.com.
Your makemymails account will generate an API key for you that you can use with
this library to send sms that is automatically routed via your android phone.

Quickstart
==========

Installing library
------------------

Installing via Composer:
^^^^^^^^^^^^^^^^^^^^^^^^

You can use composer to install makemymails-sms. To install composer:

.. code-block:: bash

    curl -s http://getcomposer.org/installer | php

Now, Create a `composer.json` at the base of the project's root directory to
hold your dependencies:

.. code-block:: bash

    {
        "require": {
            "makemymails-sms/makemymails-sms": "1.0.*"
        }
    }

Then use the composer.phar script to install the dependency

.. code-block:: bash

    php composer.phar install

Installing from zip release:
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

- Download the `latest release`_
- Unpack the zip file.
- Move the files somewhere in your project. Then you can use the API by using `require_once` call:

.. code-block:: php

    require_once 'location-of-source/makemymails-sms/mmm.php';

.. _`latest release`: https://github.com/makemymails/makemymails-sms-php/archive/1.0.zip

Installing android backend and obtaining API key
------------------------------------------------

* Sign up on Makemymails `[1]`_ and note your username somewhere

* Install Makemymails Android App `[2]`_  Enter MMM username you used to register on the makemymails website.
  (Press "Associate username" button to associate your device with Makemymails web account)

* Visit http://www.makemymails.com/sms/api-details/ `[3]`_
  This page contains the MMM_API_KEY which can be used with this library.
  Please  note it at a safe place and do not share it with anyone as the key
  is unique to you.


Steps with illustrations are available in this doc `[4]`_


Sending sms from your php code
---------------------------------

.. code-block:: php
    
    // import the library
    require_once 'location-of-source/makemymails-sms/mmm.php'; 

    $MMM_API_KEY = "ASFERSFLHFWSDNW";
    $DEVICE_ID = "132";
    
    // initialize the MMM object..
    $mmm_client = new MMM($MMM_API_KEY, $DEVICE_ID);

    //  NOTE: You can also set your api key and device id in 
    // the environment variables. They will be automatically pulled from the environment.
    // for api key,set environment variable:
    //
    // export MMM_API_KEY="your api key"
    //
    // for device id:
    // export MMM_DEVICE_ID="1321"
    // after setting the environment vars, you can simply call:
    
    $mmm_client = new MMM();    
    
    $message = "This is a message sent via makemymails-sms";
    $send_to_no = "123456789"; // this should be a string

    // To send request via curl(requires PHP cURL as a dependency)
    $result = $mmm_client->send_msg_via_curl($message, $send_to_no);
 
    // to send request without using cURL(requires php>=5.2.0)
    $result = $mmm_client->send_msg($message, $send_to_no);


Requirements
-------------

* Android Phone must be connected to internet at all times

* Sim on the android phone for sending messages.


Warning
-------
Warning: Api calls you make cause sms to be sent via your android phone,
please make sure you install an sms pack/plan before sending sms.


.. _[1]: http://www.makemymails.com/accounts/signup/
.. _[2]: https://play.google.com/store/apps/details?id=awsms.mmm
.. _[3]: http://www.makemymails.com/sms/api-details/
.. _[4]: https://docs.google.com/document/d/1JdFIQhPbDus5nBbYUpwgzAGdRoJsws6Z9rOjpRz3sVo/edit