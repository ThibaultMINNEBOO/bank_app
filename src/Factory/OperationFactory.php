<?php

namespace App\Factory;

use App\Entity\Operation;
use App\Repository\OperationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Operation>
 *
 * @method        Operation|Proxy                     create(array|callable $attributes = [])
 * @method static Operation|Proxy                     createOne(array $attributes = [])
 * @method static Operation|Proxy                     find(object|array|mixed $criteria)
 * @method static Operation|Proxy                     findOrCreate(array $attributes)
 * @method static Operation|Proxy                     first(string $sortedField = 'id')
 * @method static Operation|Proxy                     last(string $sortedField = 'id')
 * @method static Operation|Proxy                     random(array $attributes = [])
 * @method static Operation|Proxy                     randomOrCreate(array $attributes = [])
 * @method static OperationRepository|RepositoryProxy repository()
 * @method static Operation[]|Proxy[]                 all()
 * @method static Operation[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Operation[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Operation[]|Proxy[]                 findBy(array $attributes)
 * @method static Operation[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Operation[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class OperationFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     * @throws \Exception
     */
    protected function getDefaults(): array
    {
        return [
            'amount' => self::faker()->randomFloat(),
            'title' => "Virement from " . self::faker()->ipv4(),
            'account' => AccountFactory::new(),
            'paid_at' => new \DateTimeImmutable(self::faker()->date())
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Operation $operation): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Operation::class;
    }
}
