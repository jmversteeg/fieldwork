<?php

namespace fieldwork\components;

use fieldwork\sanitizers;
use fieldwork\validators;

class IbanField extends TextField
{

    /**
     * Creates a new text field and adds IBAN sanitizer and validator
     *
     * @param string $slug
     * @param string $label
     * @param string $value
     * @param string $openIbanUsername openiban API username
     * @param string $openIbanPassword openiban API password
     */
    public function __construct ($slug, $label, $value = '', $openIbanUsername = null, $openIbanPassword = null)
    {
        components\parent::__construct($slug, $label, $value, 0);
        $this->addSanitizer(new sanitizers\FieldUppercaser());
        if ($openIbanPassword !== null && $openIbanUsername !== null)
            $this->addSanitizer(new sanitizers\IbanSanitizer($openIbanUsername, $openIbanPassword));
        $this->addValidator(new validators\IbanFieldValidator());
    }
}