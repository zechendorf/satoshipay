.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer Corner
================

Right now this extension just does what it's supposed to do. No bells and whistles.

The way this thing works is, it creates a digital good with SatoshiPay when a new "Good" is created in the backend. The good's credentials (ID and Secret) will be saved in the goods attributes.

The Plugin outputs the HTML-Code for the good and will provide the JavaScript from SatoshiPay.

If the user pays for the content, there is an AJAX request to an URL that will provide the paid content.
