<?php


namespace App\UI\Controller\Shared;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AbstractJsonController extends AbstractController
{

    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validator;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @param $value
     * @param null $constraints
     * @param null $groups
     */
    public function validate($value, $constraints = null, $groups = null){

        $errors = $this->validator->validate($value);

        if (count($errors) > 0) {
            throw new ValidatorException($this->createErrorMessage($errors), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param ConstraintViolationListInterface $violations
     * @return string
     */
    private function createErrorMessage(ConstraintViolationListInterface $violations): string
    {
        $errors = [];

        /** @var ConstraintViolation $violation */
        foreach ($violations as $violation) {
            $errors[$violation->getPropertyPath()] = $violation->getMessage();
        }

        return json_encode(['errors' => $errors]);
    }

}