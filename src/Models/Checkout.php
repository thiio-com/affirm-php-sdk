<?php

namespace Thiio\Affirm\Models;

use Thiio\Affirm\Exceptions\InvalidPropertyValueException;
use Thiio\Affirm\Models\Base;
use Thiio\Affirm\Models\OrderItem;


class Checkout extends Base
{
    public $merchant;
    public $shipping;
    public $billing;
    public $items;
    public $discounts;
    public $metadata;
    public $orderId;
    public $currency;
    public $financingProgram;
    public $shippingAmount;
    public $taxAmount;
    public $total;
    public $checkoutExpiration;

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    protected $attributeMap = [
        'merchant' => 'merchant',
        'shipping' => 'shipping',
        'billing' => 'billing',
        'items' => 'items',
        'discounts' => 'discounts',
        'metadata' => 'metadata',
        'orderId' => 'order_id',
        'currency' => 'currency',
        'financingProgram' => 'financing_program',
        'shippingAmount' => 'shipping_amount',
        'taxAmount' => 'tax_amount',
        'total' => 'total',
        'checkoutExpiration' => 'checkout_expiration'
    ];

    /**
     * Array of attributes to setter functions
     *
     * @var string[]
     */
    protected $setters = [
        'merchant' => 'setMerchant',
        'shipping' => 'setShipping',
        'billing' => 'setBilling',
        'items' => 'setItems',
        'discounts' => 'setDiscounts',
        'metadata' => 'setMetadata',
        'order_id' => 'setOrderId',
        'currency' => 'setCurrency',
        'financing_program' => 'setFinancingProgram',
        'shipping_amount' => 'setShippingAmount',
        'tax_amount' => 'setTaxAmount',
        'total' => 'setTotal',
        'checkout_expiration' => 'setCheckoutExpiration'
    ];

    public function __construct(array $data = [])
    {
        $this->setAttributes($data);
    }

    /**
     * Get the value of merchant
     */ 
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * Set the value of merchant
     *
     * @return  self
     */ 
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * Get the value of shipping
     */ 
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set the value of shipping
     *
     * @return  self
     */ 
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get the value of billing
     */ 
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * Set the value of billing
     *
     * @return  self
     */ 
    public function setBilling($billing)
    {
        $this->billing = $billing;

        return $this;
    }

    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */ 
    public function setItems(array $items)
    {
        $filteredItems = [];
        if ( !$items ) return $this;
        foreach ( $items as $item ) {
            if ( !$item ) continue;
            if ( !$item instanceof OrderItem ) throw new InvalidPropertyValueException('One or more items of array is not instance of OrderItem');
            $filteredItems[] = $item;
        }

        $this->items = $filteredItems;

        return $this;
    }

    /**
     * Get the value of discounts
     */ 
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Set the value of discounts
     *
     * @return  self
     */ 
    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;

        return $this;
    }

    /**
     * Get the value of metadata
     */ 
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set the value of metadata
     *
     * @return  self
     */ 
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of currency
     */ 
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */ 
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of financingProgram
     */ 
    public function getFinancingProgram()
    {
        return $this->financingProgram;
    }

    /**
     * Set the value of financingProgram
     *
     * @return  self
     */ 
    public function setFinancingProgram($financingProgram)
    {
        $this->financingProgram = $financingProgram;

        return $this;
    }

    /**
     * Get the value of shippingAmount
     */ 
    public function getShippingAmount()
    {
        return $this->shippingAmount;
    }

    /**
     * Set the value of shippingAmount
     *
     * @return  self
     */ 
    public function setShippingAmount($shippingAmount)
    {
        $this->shippingAmount = $shippingAmount;

        return $this;
    }

    /**
     * Get the value of taxAmount
     */ 
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * Set the value of taxAmount
     *
     * @return  self
     */ 
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of checkoutExpiration
     */ 
    public function getCheckoutExpiration()
    {
        return $this->checkoutExpiration;
    }

    /**
     * Set the value of checkoutExpiration
     *
     * @return  self
     */ 
    public function setCheckoutExpiration($checkoutExpiration)
    {
        $this->checkoutExpiration = $checkoutExpiration;

        return $this;
    }
}