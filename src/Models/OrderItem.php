<?php

namespace Thiio\Affirm\Models;

use Thiio\Affirm\Models\Base;


class OrderItem extends Base
{
    public $displayName;
    public $sku;
    public $unitPrice;
    public $qty;
    public $itemImageUrl;
    public $itemUrl;
    public $categories;
    
    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    protected $attributeMap = [
        'displayName' => 'display_name',
        'sku' => 'sku',
        'unitPrice' => 'unit_price',
        'qty' => 'qty',
        'itemImageUrl' => 'item_image_url',
        'itemUrl' => 'item_url',
        'categories' => 'categories',
    ];

    /**
     * Array of attributes to setter functions
     *
     * @var string[]
     */
    protected $setters = [
        'display_name' => 'setDisplayName',
        'sku' => 'setSku',
        'unit_price' => 'setUnitPrice',
        'qty' => 'setQty',
        'item_image_url' => 'setItemImageUrl',
        'item_url' => 'setItemUrl',
        'categories' => 'setCategories'
    ];

    public function __construct(array $data = [])
    {
        $this->setAttributes($data);
    }

    /**
     * Get the value of displayName
     */ 
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set the value of displayName
     *
     * @return  self
     */ 
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get the value of sku
     */ 
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @return  self
     */ 
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of unitPrice
     */ 
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set the value of unitPrice
     *
     * @return  self
     */ 
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get the value of qty
     */ 
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set the value of qty
     *
     * @return  self
     */ 
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get the value of itemImageUrl
     */ 
    public function getItemImageUrl()
    {
        return $this->itemImageUrl;
    }

    /**
     * Set the value of itemImageUrl
     *
     * @return  self
     */ 
    public function setItemImageUrl($itemImageUrl)
    {
        $this->itemImageUrl = $itemImageUrl;

        return $this;
    }

    /**
     * Get the value of itemUrl
     */ 
    public function getItemUrl()
    {
        return $this->itemUrl;
    }

    /**
     * Set the value of itemUrl
     *
     * @return  self
     */ 
    public function setItemUrl($itemUrl)
    {
        $this->itemUrl = $itemUrl;

        return $this;
    }

    /**
     * Get the value of categories
     */ 
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */ 
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }
}