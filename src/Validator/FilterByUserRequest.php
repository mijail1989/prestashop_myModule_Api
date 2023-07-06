<?php
namespace App\Validator;

use App\Validator\BaseRequest;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotBlank;

class FilterByUserRequest extends BaseRequest
{
    #[NotBlank()]
    protected $userId;
}