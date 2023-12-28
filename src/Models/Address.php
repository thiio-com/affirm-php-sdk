<?php

namespace Thiio\Affirm\Models;

use Thiio\Affirm\Models\Base;


class Address extends Base
{
    public $name;
    public $address;
    public $phoneNumber;
    public $email;

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @var string[]
     */
    protected $attributeMap = [
        'name' => 'name',
        'address' => 'address',
        'phoneNumber' => 'phone_number',
        'email' => 'email'
    ];

    /**
     * Array of attributes to setter functions
     *
     * @var string[]
     */
    protected $setters = [
        'name' => 'setName',
        'address' => 'setAddress',
        'phone_number' => 'setPhoneNumber',
        'email' => 'setEmail'
    ];

    public function __construct(array $data = [])
    {
        $this->setAttributes($data);
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

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */ 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */ 
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}