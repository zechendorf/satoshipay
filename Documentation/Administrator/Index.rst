.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================


.. _admin-installation:

Installation
------------

To use this extension API Access to SatoshiPay is required. You will need the API Key and Secret.

You can create an account on their website at https://dashboard.satoshipay.io/sign-up 


Installing from TER or GitHub
^^^^^^^^^^

You can either install this extension from the `TYPO3 Extension Repository <https://typo3.org/extensions/repository/view/satoshipay>`_ or from the `GitHub repository <https://github.com/zechendorf/satoshipay>`_.

.. figure:: ../Images/AdministratorManual/ScreenshotExtension.png
   :width: 500px
   :alt: Extension


Setting the API Key and Secret
^^^^^^^^^^

After installing the extension you need to set your API Key and Secret. This can be done by clicking the gears Icon in the Extension Manager.

.. figure:: ../Images/AdministratorManual/ScreenshotSettings.png
   :width: 500px
   :alt: Extension Settings


Adding the TypoScript Template
^^^^^^^^^^

Finally you will need to add the static TypoScript template (SatoshiPay) to your website's template.

.. figure:: ../Images/AdministratorManual/ScreenshotTemplate.png
   :width: 500px
   :alt: Add static TypoScript template


.. _admin-faq:


FAQ
---

The SatoshiPay widget will not load
^^^^^^^^^^

At the moment the SatoshiPay JavaScript that will display the payment icon and the "sun of satoshi" only works if the page is cached. If you want to run an uncached TYPO3 installation feel free to add the script manually.

.. code-block:: html
   :linenos:
   
   <script src="https://wallet.satoshipay.io/satoshipay.js" type="text/javascript"></script>

