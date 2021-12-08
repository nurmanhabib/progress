<?php

namespace Nurmanhabib\Progress;

class Progress
{
    /**
     * @var float
     */
    protected float $givenValue;

    /**
     * @var float
     */
    protected float $maxValue;

    /**
     * Score constructor.
     * @param float $maxValue
     * @param float $initialValue
     */
    public function __construct(float $maxValue, float $initialValue = 0.00)
    {
        $this->maxValue = $maxValue;
        $this->givenValue = $initialValue;
    }

    /**
     * @return float
     */
    public function getGivenValue(): float
    {
        return $this->givenValue;
    }

    /**
     * @return float
     */
    public function getMaxValue(): float
    {
        return $this->maxValue;
    }

    /**
     * @param float $givenValue
     * @return $this
     */
    public function given(float $givenValue): Progress
    {
        $this->givenValue = $givenValue;

        return $this;
    }
    /**
     * @param float $givenValue
     * @return $this
     */
    public function advance(float $givenValue = 1.00): Progress
    {
        $this->givenValue += $givenValue;

        return $this;
    }

    /**
     * @param float $subtractValue
     * @return $this
     */
    public function retreat(float $subtractValue = 1.00): Progress
    {
        $this->givenValue -= $subtractValue;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAbove(): bool
    {
        return $this->givenValue > $this->maxValue;
    }

    /**
     * @return bool
     */
    public function isBelow(): bool
    {
        return $this->givenValue < $this->maxValue;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->givenValue >= $this->maxValue;
    }

    /**
     * @return bool
     */
    public function isMax(): bool
    {
        return $this->givenValue === $this->maxValue;
    }

    /**
     * @return float
     */
    public function getPercentageRaw(): float
    {
        return ($this->givenValue / $this->maxValue) * 100;
    }

    /**
     * @param bool $rounded
     * @return float
     */
    public function getPercentageValue(bool $rounded = true): float
    {
        $value = $this->getPercentageRaw();

        if ($rounded) {
            return round($value);
        }

        return $value;
    }
}
