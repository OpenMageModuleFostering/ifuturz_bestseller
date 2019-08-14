<?php
/**
 * @package Ifuturz_Bestseller
 */
class Ifuturz_Bestseller_Helper_Data extends Mage_Core_Helper_Abstract
{	
	public function getTitle()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/bestseller_title');
	}
	
	public function getpriceHide()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/price_hide');
	}
	
	public function getratingHide()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/rating_hide');
	}
	
	public function getcartHide()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/addtocart_hide');
	}
	
	public function getwishlistHide()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/wishlist_hide');
	}
	
	public function getcompareHide()
	{
		return Mage::getStoreConfig('bestseller/bestseller_group/compare_hide');
	}
}