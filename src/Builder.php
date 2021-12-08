<?php

namespace Nurmanhabib\Progress;

interface Builder
{
    public function prepare();

    public function scoring();

    /**
     * @return Progress
     */
    public function getScore(): Progress;
}
