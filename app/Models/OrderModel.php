<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

 protected $allowedFields = [
    'user_id',
    'total',
    'status',
    'shipping_address',
    'payment_method',
    'shipping_method',
    'created_at',
    'updated_at'
];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}