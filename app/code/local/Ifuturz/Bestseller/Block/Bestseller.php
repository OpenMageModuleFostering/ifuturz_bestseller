<?php
/**
 * @package Ifuturz_Bestseller
*/
class Ifuturz_Bestseller_Block_Bestseller extends Mage_Catalog_Block_Product_Abstract
{  	
	 public function __construct()
	 {
        parent::__construct();		
       
	   	$limit = Mage::getStoreConfig('bestseller/bestseller_group/bestseller_maxlimit');
		$fromDate = Mage::getStoreConfig('bestseller/bestseller_group/date_from'); 
		$fromDate = date("Y-m-d", strtotime($fromDate));
		$toDate = date("Y-m-d", time());
		
	    $storeId = Mage::app()->getStore()->getId();
        $products = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty($fromDate,$toDate,true)
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image'))
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder('ordered_qty', 'desc');			
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
		Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($products);
 
        $products->setPageSize($limit)->setCurPage(1);  
        $this->setProductCollection($products);		
    }	
}
