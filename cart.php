<?php

class Item {

    var $product_id;
    var $product_name;
    var $qty;
    var $unit_price;
    var $deleted = false;

    function get_item_cost() {
        return $this->qty * $this->unit_price;
    }

    function delete_item() {
        $this->deleted = true;
    }

    function Item($product_id, $product_name, $qty, $unit_price) {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->qty = $qty;
        $this->unit_price = $unit_price;
    }

    function get_product_id() {
        return $this->product_id;
    }

    function get_product_name() {
        return $this->product_name;
    }

    function get_qty() {
        return $this->qty;
    }

    function get_unit_price() {
        return $this->unit_price;
    }
	
	function update_qty() {
		return $this->qty += $qty;
	}

}

class Cart {

    var $items;
    var $depth;

    function Cart() {
        $this->items = array();
        $this->depth = 0;
    }

    function add_item($item) {
		/*$item_already_exists = false;
		// loop through the current contents of the cart
		foreach ($this->items as $depth_id => $item_in_cart){ // if the item already exists in the cart
			if($item_in_cart->get_product_id() == $item->get_product_id())
			{
				$item_already_exists = true;
				$item_exists_at = $depth_id;
				break;
			}
		}
		
		if($item_already_exists == true)
		{ //update the existing item
			$this->items[$item_exists_at]->update_qty($item->get_qty());
		}
		else // add the new item
		{
			$this->items[$this->depth] = $item;
			$this->depth++;
		} */
		
		$this->items[$this->depth] = $item;
		$this->depth++;
        
    }

    function delete_item($item_no) {
        $this->items[$item_no]->delete_item();
    }

    function get_depth() {
        return $this->depth;
    }

    function get_item($item_no) {
        return $this->items[$item_no];
    }
	
}

?>