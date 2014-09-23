<?php
/**
 * Quafzi_ConfirmMassactions_Model_Observer
 *
 * @package   Quafzi_ConfirmMassactions
 * @copyright 2014
 * @author    Thomas Birke <tbirke@netextreme.de>
 * @license   MIT
 */
class Quafzi_ConfirmMassactions_Model_Observer
{
    public function blockToHtmlBefore($event)
    {
        $helper = Mage::helper('quafzi_confirmmassactions');
        $block = $event->getBlock();
        if ($block instanceof Mage_Adminhtml_Block_Widget_Grid_Massaction_Abstract) {
            $confirmQuestion = $helper->__('Do you really want to do that?');
            foreach ($block->getItems() as $itemId => $item) {
                if ($helper->needsConfirmation($itemId)
                    && is_null($item->getConfirm())
                ) {
                    $item->setConfirm($item->getLabel() . ': ' . $confirmQuestion);
                }
            }
        }
    }
}
