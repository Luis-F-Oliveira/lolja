<?php

namespace App\Models;

class Produto
{
    protected $name;
    protected $price;
    protected $unit;
    protected $stats;
    protected $url;
    protected $created_at;
    protected $updated_at;

    public function __construct($name, $price, $unit, $stats, $url, $created_at, $updated_at)
    {
        $this->name = $name;
        $this->price = $price;
        $this->unit = $unit;
        $this->stats = $stats;
        $this->url = $url;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function getStats()
    {
        return $this->stats;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
