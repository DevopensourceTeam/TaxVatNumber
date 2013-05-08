<?php
/*
 * @category    Devopensource
 * @package		Devopensource_All
 * @author      Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version     0.1.0
 * @copyright   Copyright (c) 2013 Devopensource
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Devopensource_TaxVatNumber_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Return bool if module is enabled
     * @return bool
     */
    public function isEnabledModule(){

        return (bool) Mage::getStoreConfig('devopentaxvatnumber/general/enabled');
    }

    /**
     * Convert array php in string with array js
     * @param string $name name of the new array js
     * @param array $data array in php format
     * @return string $arrayJs with array in js format
     */
    public function convertToJsArray($name = null, $data){

        if(is_null($name)){
            $arrayJs = "var countriesReq = [ ";
        }else{
            $arrayJs = "var $name = [ ";
        }

        for($i = 0; $i < count($data); $i++){

            if($i == count($data)-1){
                $arrayJs .= "\"$data[$i]\"];";
            }else{
                $arrayJs .= "\"$data[$i]\",";
            }
        }

        return $arrayJs;
    }
}