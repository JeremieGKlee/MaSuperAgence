<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\PropertySearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    /**
     * @return Query
     */
    public function findAllVisibleQuery(PropertySearch $search): Query
    {
        $query = $this->findVisibleQuery();

        if ($search->getTypeSort())
        {
            $query = $query
            ->andWhere('p.type = :typesort')
            ->setParameter('typesort', $search->getTypeSort());
        }
        if ($search->getMaxPrice())
        {
            $query = $query
            ->andWhere('p.price <= :maxprice')
            ->setParameter('maxprice', $search->getMaxPrice());
        }

        if ($search->getMinSurface())
        {
            $query = $query
            ->andWhere('p.surface >= :minsurface')
            ->setParameter('minsurface', $search->getMinSurface());
        }
        if ($search->getMinRooms())
        {
            $query = $query
            ->andWhere('p.rooms >= :minrooms')
            ->setParameter('minrooms', $search->getMinRooms());
        }

        if ($search->getMinBedrooms())
        {
            $query = $query
            ->andWhere('p.bedrooms >= :minbedrooms')
            ->setParameter('minbedrooms', $search->getMinBedrooms());
        }
        if ($search->getSelectTypeHeat())
        {
            $query = $query
            ->andWhere('p.heat = :selecttypeheat')
            ->setParameter('selecttypeheat', $search->getselectTypeHeat());
            // dump('selecttypeheat', $search->getselectTypeHeat());
            // dump('P.heat');
            // die;
        }

        if ($search->getMaxFloor())
        {
            $query = $query
            ->andWhere('p.floor<= :maxfloor')
            ->setParameter('maxfloor', $search->getMaxFloor());
        }
        if ($search->getSelectCity())
        {
            $query = $query
            ->andWhere('p.city = :selectcity')
            ->setParameter('selectcity', $search->getSelectCity());
        }

        if ($search->getSelectPostalCode())
        {
            $query = $query
            ->andWhere('p.postal_code = :selectpostalcode')
            ->setParameter('selectpostalcode', $search->getSelectPostalCode());
        }

        if ($search->getOptions()->count() > 0)
        {
            $k = 0;
            foreach($search->getOptions() as $k => $option)
            {
                $k++;
                $query = $query
                    -> andWhere(":option$k MEMBER OF p.options")
                    -> setParameter("option$k", $option);
            }
        }

        return $query->getQuery();
    }

    /**
     * @return Property[]
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->where('p.sold = false');
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
