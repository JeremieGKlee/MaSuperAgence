<?php

namespace App\Controller\Admin;

use App\Entity\Option;
use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
Use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;



class AdminPropertyController extends AbstractController
{
    
    /**
     * @var PropertyRepositiry
     */
    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/admin_property/index.html.twig', compact('properties'));
    }

     /**
     * @Route("/admin/property/create", name="admin.property.new")
     */
    public function new(Request $request): Response
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succès');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/admin_property/new.html.twig',
        [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods="GET|POST")
     * @param Property $property
     * @param Property $request
     */
    // public function edit(Property $property, Request $request, CacheManager $cacheManager , UploaderHelper $helper): Response
    public function edit(Property $property, Request $request): Response
    {
        // $option = new Option();
        // $property -> addOption($option);
        $form = $this->createForm(PropertyType::class, $property);
        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // if($property->getImageFile() instanceof UploadedFile)
            // {
            //     $cacheManager->remove($helper->asset($property, 'imageFile'));
            // }
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/admin_property/edit.html.twig',
        [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods="DELETE")
     * @param Property $property
     */
    public function delete(Property $property, Request $request)
    {
        if($this->isCsrfTokenValid('delete' . $property->getId(), $request->get('_token')))
        {
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
            // return new Response('Suppression');
        }
        
        return $this->redirectToRoute('admin.property.index');
    }

}
