<?php

namespace Nurmanhabib\Progress;

class Director
{
    protected Builder $builder;

    /**
     * Director constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function build(): Progress
    {
        $this->builder->prepare();
        $this->builder->scoring();

        return $this->builder->getScore();
    }
}
