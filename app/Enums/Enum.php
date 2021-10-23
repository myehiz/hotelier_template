<?php

namespace App\Enums;

use ReflectionClass;
use UnexpectedValueException;

abstract class Enum
{
    // phpcs:disable
    /**
     * Default enum value.
     *
     * @constant(__default)
     */
    const __default = null;
    // phpcs:enable

    /**
     * Enum value.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Enum constructor.
     *
     * @param mixed $value enum value
     *
     * @throws \ReflectionException
     */
    public function __construct($value = null)
    {
        $reflected = new ReflectionClass($this);

        if (!in_array($value, $reflected->getConstants())) {
            throw new UnexpectedValueException("Value '$value' is not part of the enum ".get_called_class());
        }

        $this->value = $value;
    }

    /**
     * Get an array of all enum constants.
     *
     * @param bool $include_default include default value or not
     *
     * @return array
     *
     * @throws \ReflectionException
     */
    public static function getConstList($include_default = false)
    {
        $reflected = new ReflectionClass(new static(null));

        $constants = $reflected->getConstants();

        if (!$include_default) {
            unset($constants['__default']);

            return $constants;
        }

        return $constants;
    }

    /**
     * String representation of the enum.
     *
     * @return string
     */
    final public function __toString()
    {
        return strval($this->value);
    }
}
