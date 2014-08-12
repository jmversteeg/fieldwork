jannieforms
===========

Library for easy form generation

 - Define a form once and jannieforms will automatically set up validation clientside and serverside
 - Can be used as a WordPress plugin

###Getting started

Clone this repo or extract [master.zip](https://github.com/jmversteeg/jannieforms/archive/master.zip) somewhere.

Creating a form is as simple as instantiating `JannieForm`:

    $contactform = new JannieForm('contact', '', new JannieFormPostMethod() );

You can create a new field by instantiating any class that extends `JannieFormFieldComponent`:

    $emailField = new JannieTextField('email', 'Email address');

Depending on the capabilities of the input type, the field can be configured in several ways:

    //Adds a validator to the field
    $emailField->addValidator(new JannieFormEmailValidator());
    
    //Attaches the field to the form
    $emailField->addTo($contactForm);

Alternatively, most functions can be used in a chained call, like this:

    $emailField->addValidator(new JannieFormEmailValidator())->addTo($contactForm);

Add a submit button:

    $submit = new JannieButton("submit", "Send", "", JannieButton::TYPE_SUBMIT);
    $submit->setUseShim(false)->addTo($contactForm);

###Todo

 - Use namespaces
 - Use build script (composer)
 - Translate error messages
 - Generate PHPDocs
 - Add centralized `Callback` class for access both direct and through AJAX
 - Add clientsize Sanitizer implementation (sanitize field value either live or on blur)
 - Add XML form definition parser
 - Add default styles with horizontal row support
 - Load forms on demand
 - Remove low-level configuration of `WRAPPER` and `INPUT` node (perhaps remove `WRAPPER` node altogether and use `box-sizing: border-box;` for input nodes)
 - Remove `JannieTooltips` from global namespace
