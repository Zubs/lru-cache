<?php

namespace App;

use Exception;

class LRUCache
{
    public LinkedList $data;

    /**
     * @throws Exception
     */
    public function __construct(int $cacheSize)
    {
        if ($cacheSize <= 1000) {
            $this->data = new LinkedList($cacheSize);
        } else throw new Exception("Maximum cache size exceeded");
    }

    public function set(string $key, mixed $data): bool
    {
        $this->data->insertFirst($key, $data);

        return true;
    }

    public function get(string $key): mixed
    {
        return $this->data->search($key);
    }

    public function remove(string $key): bool
    {
        return $this->data->delete($key);
    }

    public function count(): int
    {
        return $this->data->getCount();
    }
}
