# README

This extension will provide satoshipay (https://satoshipay.io/) functionality for TYPO3.

It will work in the following way:

## Model
* Account (Satoshipay Account)
  * title (just for info)
  * apikey
  * apisecret
  
* Good (Satoshipay Good)
  * account
  * title
  * secret // not editable
  * column 
  * price
 

## How it will work
Backend-Template will have at least two columns. 
* One that holds always visible content like Teaser or other information that is not paid content. Here a Plugin of Type "satoshipay" can be displayed.
* One that will not be shown in the frontend but is instead referenced by the FlexForm in the "satoshipay"-Element as "paid content". Content stored here will be shown when the payment has been made

Satoshipay-Plugin Flexform
* References a satoshipay-good

In the template there will need to be the API ID and the secret defined.

The Plugin will load a javascript in the header:

```
<script src="https://wallet.satoshipay.io/satoshipay.js"></script>
```

And it will output a div for the placeholder

```
<div class="satoshipay-placeholder"
   data-sp-type="text/html"
   data-sp-src="http://demo.satoshipay.xyz/paid/1"
   data-sp-id="574b6b1ae1d218110047c04e"
   data-sp-length="1500"
   data-sp-price="1000">
</div>
```

* type = "text/html"
* src = "[typolink to current page]&paid=1"
* id = "[id of the good"
* length = "the estimated length of the content"
* price ="price defined in the plugin"

Important Questions
* How are the digital goods "created" with satoshipay?

Stuff to remenisce about:
* What about caching and searches like indexed_search? They will not know about the content... hm.
