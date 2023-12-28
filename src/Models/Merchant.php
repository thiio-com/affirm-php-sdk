<?php

namespace Thiio\Affirm\Models;

use Thiio\Affirm\Models\Base;


class Merchant extends Base
{
    public $userConfirmationUrl;
    public $userCancelUrl;
    public $publicApiKey;
    public $userConfirmationUrlAction;
    public $useVcn;
    public $name;

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    protected $attributeMap = [
        'userConfirmationUrl' => 'user_confirmation_url',
        'userCancelUrl' => 'user_cancel_url',
        'publicApiKey' => 'public_api_key',
        'userConfirmationUrlAction' => 'user_confirmation_url_action',
        'useVcn' => 'use_vcn',
        'name' => 'name',
    ];

    /**
     * Array of attributes to setter functions
     *
     * @var string[]
     */
    protected $setters = [
        'user_confirmation_url' => 'setUserConfirmationUrl',
        'user_cancel_url' => 'setUserCancelUrl',
        'public_api_key' => 'setPublicApiKey',
        'user_confirmation_url_action' => 'setUserConfirmationUrlAction',
        'use_vcn' => 'setUseVcn',
        'name' => 'setName',
    ];

    public function __construct(array $data = [])
    {
        $this->setAttributes($data);
    }

    /**
     * Get the value of userConfirmationUrl
     */ 
    public function getUserConfirmationUrl()
    {
        return $this->userConfirmationUrl;
    }

    /**
     * Set the value of userConfirmationUrl
     *
     * @return  self
     */ 
    public function setUserConfirmationUrl($userConfirmationUrl)
    {
        $this->userConfirmationUrl = $userConfirmationUrl;

        return $this;
    }

    /**
     * Get the value of userCancelUrl
     */ 
    public function getUserCancelUrl()
    {
        return $this->userCancelUrl;
    }

    /**
     * Set the value of userCancelUrl
     *
     * @return  self
     */ 
    public function setUserCancelUrl($userCancelUrl)
    {
        $this->userCancelUrl = $userCancelUrl;

        return $this;
    }

    /**
     * Get the value of publicApiKey
     */ 
    public function getPublicApiKey()
    {
        return $this->publicApiKey;
    }

    /**
     * Set the value of publicApiKey
     *
     * @return  self
     */ 
    public function setPublicApiKey($publicApiKey)
    {
        $this->publicApiKey = $publicApiKey;

        return $this;
    }

    /**
     * Get the value of userConfirmationUrlAction
     */ 
    public function getUserConfirmationUrlAction()
    {
        return $this->userConfirmationUrlAction;
    }

    /**
     * Set the value of userConfirmationUrlAction
     *
     * @return  self
     */ 
    public function setUserConfirmationUrlAction($userConfirmationUrlAction)
    {
        $this->userConfirmationUrlAction = $userConfirmationUrlAction;

        return $this;
    }

    /**
     * Get the value of useVcn
     */ 
    public function getUseVcn()
    {
        return $this->useVcn;
    }

    /**
     * Set the value of useVcn
     *
     * @return  self
     */ 
    public function setUseVcn($useVcn)
    {
        $this->useVcn = $useVcn;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}