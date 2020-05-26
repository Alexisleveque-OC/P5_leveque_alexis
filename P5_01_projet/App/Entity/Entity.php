<?php

namespace App\Entity;


class Entity
{
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $key = str_replace('_',ucfirst(''),$key);
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
