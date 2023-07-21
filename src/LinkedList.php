<?php

namespace App;

class LinkedList
{
    private ListNode | null $first_node = null;
    private ListNode | null $last_node = null;
    private int $total_nodes = 0;
    private int $maxLength;
    
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }

    public function insertFirst(string $key, mixed $data): bool
    {
        $new_node = new ListNode($key, $data);

        if (is_null($this->first_node)) {
            $this->first_node = $new_node;
            $this->last_node = $new_node;
        } else {
            $current_first_node = $this->first_node;
            $new_node->next = $current_first_node;
            $current_first_node->prev = $new_node;
            $this->first_node = $new_node;
            
            if ($this->total_nodes >= $this->maxLength) {
                $current_last_node = $this->last_node;
                $this->last_node = $current_last_node->prev;
                $this->last_node->next = null;
                
                $this->total_nodes -= 1;
            }
        }

        $this->total_nodes += 1;
        
        return true;
    }

    public function delete(string $data): bool
    {
        if (is_null($this->first_node)) return false;
        else {
            $current_node = $this->first_node;
            $previous_node = $current_node->prev;
            $next_node = $current_node->next;

            while (!is_null($current_node)) {
                if ($current_node->data === $data) {
                    if (is_null($previous_node)) {
                        $this->deleteFirst();
                        break;
                    }

                    if (is_null($next_node)) {
                        $this->deleteLast();
                        break;
                    }

                    $previous_node->next = $next_node;
                    $next_node->prev = $previous_node;
                    $this->total_nodes -= 1;
                    break;
                } else {
                    $previous_node = $current_node;
                    $current_node = $next_node;
                    $next_node = $current_node->next;
                }
            }

            return true;
        }
    }

    public function search(string $key): mixed
    {
        if (!$this->total_nodes) return false;
        else {
            $current_node = $this->first_node;

            while (!is_null($current_node)) {
                if ($current_node->key === $key) return $current_node->data;
                else {
                    $current_node = $current_node->next;
                }
            }

            return false;
        }
    }
    
    public function getCount(): int
    {
        return $this->total_nodes;
    }
}
