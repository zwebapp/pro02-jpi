<?php 


class Orders extends BaseController {



	public function addItemToBasket()
	{
		$validation = new Services\Validators\SingleOrder;

		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation->errors);
		}

		$orderList = array();

		$orderList = Session::get('orders', array());

		if (array_key_exists(Input::get('id'), $orderList)) {
			$orderList[Input::get('id')] = Input::get('quantity');
		}
		else {
			$orderList = array_add($orderList, Input::get('id'), Input::get('quantity'));
		}

		Session::put('orders', $orderList);

		Notification::success('<strong>Thank You!</strong> The item has been added to your cart.');

		return Redirect::back();

	}

}