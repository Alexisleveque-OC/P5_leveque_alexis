<?php

namespace App\Entity;


class Entity
{
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $recup = explode('_', $key);
            $key = str_replace('_', '', $key);
            $method = 'set';

            if(count($recup) >= 2){
                for ($i = 1; count($recup) <= $i; $i++) {
                    $recup[$i] = ucfirst($recup[$i]);
                    $method = $method . ($recup[$i]);
                }
            }
            else{
                $key = ucfirst($key);
                $method = $method . $key;
            }
            if (method_exists($this, $method)) {
               dd( $this->$method($value));
            }
        }
    }
}