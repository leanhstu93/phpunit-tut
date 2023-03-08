<?php


namespace App\Controllers;


class CartsController
{
    public function add($productId, $quantity)
    {
    	$quantity = (int)$quantity;
    	$data = [];

    	if ($quantity > 0) {
			$data = ['id' => $productId, $quantity => $quantity];
    	} else {
    		$data = ['id' => $productId, $quantity => 1];
    	}

    	return $data;
    }
}