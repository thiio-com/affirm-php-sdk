<?php

namespace Thiio\Affirm\Models;

use Thiio\Affirm\Models\Base;


class Metadata extends Base
{
    public $shippingType;
    public $entityName;
    public $platformType;
    public $platformVersion;
    public $platformAffirm;
    public $webhookSessionId;
    public $mode;
    public $customer;
    public $itinerary;
    public $checkoutChannelType;

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    protected $attributeMap = [
        'shipping_type' => 'shipping_type',
        'entity_name' => 'entity_name',
        'platform_type' => 'platform_type',
        'platform_version' => 'platform_version',
        'platform_affirm' => 'platform_affirm',
        'webhook_session_id' => 'webhook_session_id',
        'mode' => 'mode',
        'customer' => 'customer',
        'itinerary' => 'itinerary',
        'checkout_channel_type' => 'checkout_channel_type'
    ];

    /**
     * Array of attributes to setter functions
     *
     * @var string[]
     */
    protected $setters = [
        'shipping_type' => 'setShippingType',
        'entity_name' => 'setEntityName',
        'platform_type' => 'setPlatformType',
        'platform_version' => 'setPlatformVersion',
        'platform_affirm' => 'setPlatformAffirm',
        'webhook_session_id' => 'setWebhookSessionId',
        'mode' => 'setMode',
        'customer' => 'setCustomer',
        'itinerary' => 'setItinerary',
        'checkout_channel_type' => 'setCheckoutChannelType'
    ];

    public function __construct(array $data = [])
    {
        $this->setAttributes($data);
    }

    /**
     * Get the value of shippingType
     */ 
    public function getShippingType()
    {
        return $this->shippingType;
    }

    /**
     * Set the value of shippingType
     *
     * @return  self
     */ 
    public function setShippingType($shippingType)
    {
        $this->shippingType = $shippingType;

        return $this;
    }

    /**
     * Get the value of entityName
     */ 
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * Set the value of entityName
     *
     * @return  self
     */ 
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;

        return $this;
    }

    /**
     * Get the value of platformType
     */ 
    public function getPlatformType()
    {
        return $this->platformType;
    }

    /**
     * Set the value of platformType
     *
     * @return  self
     */ 
    public function setPlatformType($platformType)
    {
        $this->platformType = $platformType;

        return $this;
    }

    /**
     * Get the value of platformVersion
     */ 
    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }

    /**
     * Set the value of platformVersion
     *
     * @return  self
     */ 
    public function setPlatformVersion($platformVersion)
    {
        $this->platformVersion = $platformVersion;

        return $this;
    }

    /**
     * Get the value of platformAffirm
     */ 
    public function getPlatformAffirm()
    {
        return $this->platformAffirm;
    }

    /**
     * Set the value of platformAffirm
     *
     * @return  self
     */ 
    public function setPlatformAffirm($platformAffirm)
    {
        $this->platformAffirm = $platformAffirm;

        return $this;
    }

    /**
     * Get the value of webhookSessionId
     */ 
    public function getWebhookSessionId()
    {
        return $this->webhookSessionId;
    }

    /**
     * Set the value of webhookSessionId
     *
     * @return  self
     */ 
    public function setWebhookSessionId($webhookSessionId)
    {
        $this->webhookSessionId = $webhookSessionId;

        return $this;
    }

    /**
     * Get the value of mode
     */ 
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set the value of mode
     *
     * @return  self
     */ 
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get the value of customer
     */ 
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */ 
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get the value of itinerary
     */ 
    public function getItinerary()
    {
        return $this->itinerary;
    }

    /**
     * Set the value of itinerary
     *
     * @return  self
     */ 
    public function setItinerary($itinerary)
    {
        $this->itinerary = $itinerary;

        return $this;
    }

    /**
     * Get the value of checkoutChannelType
     */ 
    public function getCheckoutChannelType()
    {
        return $this->checkoutChannelType;
    }

    /**
     * Set the value of checkoutChannelType
     *
     * @return  self
     */ 
    public function setCheckoutChannelType($checkoutChannelType)
    {
        $this->checkoutChannelType = $checkoutChannelType;

        return $this;
    }
}