<?php
/*
 * @category    Devopensource
 * @package		Devopensource_TaxVatNumber
 * @copyright   Copyright (c) 2013 Devopensource
 * @author      Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version     0.1.0
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
//Mage_Core_Block_Template
class Devopensource_TaxVatNumber_Block_Billing extends Mage_Checkout_Block_Onepage_Billing {

    public function __construct()
    {

        parent::__construct();
    }

    /**
    * Return boolean with autocomplete value config data
    * @return bool
    */
    public function isAutocomplete(){

        return (bool) Mage::getStoreConfig('devopentaxvatnumber/general/autocomplete_cif_number');
    }

    /**
     * Return boolean with country address user is required for module
     * @return bool
     */
    public function isRequired(){

        return in_array($this->_getCountry(), $this->getCountriesRequired());
    }

    /**
     * Return string with the value of input
     * @return string
     */
    public function getLabel(){

        return Mage::getStoreConfig('devopentaxvatnumber/general/label_input');
    }

    /**
     * Return string with the value of custom text of bottom of input
     * @return string
     */
    public function getCustomLegendText(){

        return Mage::getStoreConfig('devopentaxvatnumber/general/text_legend_input');
    }

    /**
     * Return array with the countries required
     * @return array
     */
    public function getCountriesRequired(){

        $countiesReqConfig = Mage::getStoreConfig('devopentaxvatnumber/general/required_country');

        $countriesRequired = explode(",", $countiesReqConfig);

        return $countriesRequired;
    }

    /**
     * Return country of address of user
     * @return string
     */
    protected function _getCountry(){

      return $this->getAddress()->getCountry();
    }

}