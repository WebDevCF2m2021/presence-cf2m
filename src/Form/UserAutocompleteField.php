<?php

namespace App\Form;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class UserAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => User::class,
            'placeholder' => 'Choisissez un stagiaire',
            'choice_label' => 'username',
            'autocomplete' => true,

            /*'filter_query' => function(QueryBuilder $qb) {

                $qb->andWhere('u.roles LIKE :role' )
                ->setParameter('role','%'.'PERSO'.'%');
            },*/
           /*'filter_query' => function(UserRepository $userRepository, string $query=""){
               if (!$query) {
                   return;
               }
                return $userRepository->searchUserByName($query);
            },*/
            //'query_builder' => function(UserRepository $userRepository) {
              //  return $userRepository->findByExampleField($val);
            //},
            'security' => 'ROLE_FORMAT',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
