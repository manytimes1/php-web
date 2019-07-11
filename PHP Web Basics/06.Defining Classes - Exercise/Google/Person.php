<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var Pokemon[]
     */
    private $pokemons;

    /**
     * @var Relative[]
     */
    private $parents;

    /**
     * @var Child[]
     */
    private $children;

    /**
     * @var Car
     */
    private $car;

    /**
     * Person constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->pokemons = [];
        $this->parents = [];
        $this->children = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Company
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return Pokemon[]
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param Pokemon $pokemon
     */
    public function addPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[] = $pokemon;
    }

    /**
     * @return Relative[]
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    /**
     * @param Relative $parent
     */
    public function addParent(Relative $parent): void
    {
        $this->parents[] = $parent;
    }

    /**
     * @return Child[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param Child $child
     */
    public function addChild(Child $child): void
    {
        $this->children[] = $child;
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     */
    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    public function __toString()
    {
        $return = $this->getName() . PHP_EOL;
        $return .= 'Company:' . ($this->getCompany() ? PHP_EOL . $this->getCompany() : '') . PHP_EOL;
        $return .= 'Car:' . ($this->getCar() ? PHP_EOL . $this->getCar() : '') . PHP_EOL;
        $return .= 'Pokemon:' . PHP_EOL . implode(PHP_EOL, $this->getPokemons()) . PHP_EOL;
        $return .= 'Parents:' . (count($this->getParents()) ? PHP_EOL .
                implode(PHP_EOL, $this->getParents()) : '') . PHP_EOL;
        $return .= 'Children:' . (count($this->getChildren()) ? PHP_EOL .
                implode(PHP_EOL, $this->getChildren()): '');

        return $return;
    }
}