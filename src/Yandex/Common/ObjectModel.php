<?php
/**
 * Yandex PHP Library
 *
 * @copyright NIX Solutions Ltd.
 * @link https://github.com/nixsolutions/yandex-php-library
 */

/**
 * @namespace
 */
namespace Yandex\Common;

/**
 * Class ObjectModel
 * @package Yandex\Common
 */
class ObjectModel extends Model implements \Iterator, \Countable
{
    protected $collection = [];
    protected $innerCounter = -1;

    public function current(): mixed
    {
        if (is_array(current($this->collection))) {
            return new ObjectModel(current($this->collection));
        }

        return current($this->collection);
    }

    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->innerCounter++;
        return next($this->collection);
    }

    public function key(): mixed
    {
        return key($this->collection);
    }

    public function valid(): bool
    {
        return $this->innerCounter < count($this->collection);
    }

    public function rewind(): void
    {
        $this->innerCounter = 0;
        reset($this->collection);
        return;
    }

    public function count(): int
    {
        return count($this->collection);
    }
}
