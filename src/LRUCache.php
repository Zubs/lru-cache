<?php

namespace App;

use Exception;

class LRUCache
{
    private LinkedList $data;

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
        return $this->data->insertFirst($key, $data);
    }

    public function get(string $key): mixed
    {
        $response = $this->data->search($key);
        
        $this->remove($key);
        $this->data->insertFirst($key, $response);
        
        return $response;
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
