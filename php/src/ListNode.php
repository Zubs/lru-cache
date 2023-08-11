<?php

namespace App;

class ListNode
{
    public string | null $key;
    public mixed $data = null;
    public ListNode | null $next = null;
    public ListNode | null $prev = null;

    /**
     * @param string $data
     */
    public function __construct(string $key, mixed $data)
    {
        $this->key = $key;
        $this->data = $data;
    }
}
