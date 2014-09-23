<?php
/**
 * Quafzi_ConfirmMassactions_Helper_Data
 *
 * @package   Quafzi_ConfirmMassactions
 * @copyright 2014
 * @author    Thomas Birke <tbirke@netextreme.de>
 * @license   MIT
 */
class Quafzi_ConfirmMassactions_Helper_Data
    extends Mage_Core_Helper_Data
{
    public function needsConfirmation($itemId)
    {
        $dangerousActionStrings = explode(',', Mage::getStoreConfig('admin/quafzi_confirmmassactions/triggers'));
        foreach ($dangerousActionStrings as $trigger) {
            if (false !== strpos($itemId, $trigger)) {
                return true;
            }
        }
        return false;
    }
}
