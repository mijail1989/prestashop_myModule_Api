<?php
namespace App\Validator;

use App\Validator\BaseRequest;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateAddressRequest extends BaseRequest
{
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 150)]
    protected $name;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 150)]
    protected $customerName;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 150)]
    protected $customerLastname;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 150)]
    protected $street;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 150)]
    protected $city;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:5,max: 150)]
    protected $region;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max: 10)]
    protected $postalCode;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:3,max:20)]
    protected $country;
    #[Type('string')]
    #[NotBlank()]
    #[Length(min:5,max: 150)]
    protected $phone;
    #[Type('string')]
    #[NotBlank()]
    protected $userId;
}