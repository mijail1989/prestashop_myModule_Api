<?php

namespace App\Controller;

use App\Entity\Address;
use App\Repository\AddressRepository;
use App\Validator\FilterByUserRequest;
use App\Validator\CreateAddressRequest;
use Doctrine\ORM\EntityManagerInterface;
use function PHPUnit\Framework\assertNotEmpty;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/address')]
class AddressController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, AddressRepository $addressRepository)
    {
        $this->entityManager = $entityManager;
        $this->addressRepository = $addressRepository;
    }

    #[Route("/all", name: "Addresses", methods:["GET"])]
    public function showAddresses()
    {
        $address = $this->addressRepository->findAll();
        return $this->json($address);
    }


    #[Route("/user", name: "User_Addresses", methods:["POST"])]
    public function showUserAddresses(FilterByUserRequest $request)
    {
        $errors = $request->validate();
        if (count($errors)) {
            dd($errors);
            return new JsonResponse(['message' => 'Failed'], 403);
        }
        $body = $request->getRequest()->toArray();
        $userId = $body["userId"];        
        $address = $this->addressRepository->findByUserId($userId);
        return $this->json($address);
    }

    #[Route("/show/{id}", name: "show_address", methods: ["GET"])]
    public function showOrder($id): Response
    {
        $address = $this->addressRepository->find(["id" => $id]);
        return $this->json($address);
    }

    #[Route("/new", name: "new_address" , methods:["POST"])]
    public function newOrder(CreateAddressRequest $request): Response
    {
        $errors = $request->validate();
        if (count($errors)) {
            return new JsonResponse(['message' => 'Failed'], 403);
        }
        $body = $request->getRequest()->toArray();
        $address = new Address();
        $address->setAddress($body);
        $this->entityManager->persist($address);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'New Address created']);
    }

}