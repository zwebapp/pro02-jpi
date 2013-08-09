<?php 


class Orders extends BaseController {


	public function index()
	{
		return View::make('admin.orders.main', array('orders' => Order::orderBy('created_at')->paginate(15)) );
	}


	public function show($id)
	{
		return View::make('admin.orders.show', Order::find($id));
	}


	public function showSort($sort)
	{
		return View::make('admin.orders.main', array('orders' =>  Order::where('lookup_status', $sort)->orderBy('created_at')->paginate(15)));
	}


	public function update()
	{
		$inputs = Input::all(); 

		$order = Order::find($inputs['id']);

		$order->status()->associate(Lookup::find($inputs['lookup_status']));

		if ( !empty($inputs['agent_id'])) {

			$order->agent()->associate(Agent::find($inputs['agent_id']));
		}

		if ($inputs['lookup_status'] == 4 ){
			$order->approved_at = new DateTime;
			$order->approvedBy()->associate(Auth::user()->administrator);
		}

		$order->push();

		Notification::success('<strong>Done!</strong> The order has been updated');

		return Redirect::action('Orders@show', $order->id);
	}


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

	public function proceedCheckout()
	{
		if (!is_null(Session::get('orders')) && count(Session::get('orders')) > 0 ) {
			return View::make('client.checkout');
		}
		return Redirect::to('/');
	}

	public function removeItem($id)
	{
		$orderList = Session::get('orders');

		$orderList = array_except($orderList, $id);

		Session::put('orders', $orderList);

		return Redirect::back();
	}

	public function submit()
	{
		$inputs = array();
		$delivery_address = Input::get('delivery_address');

		$inputs['delivery_address'] = !empty($delivery_address) ? $delivery_address : Input::get('client_address');
		$inputs['products'] = json_encode(array('orders' => Session::get('orders')));
		$inputs['client_id'] = Auth::user()->client->id;
		$inputs['lookup_status'] = 1;

		Order::create($inputs);

		Session::forget('orders');

		return View::make('client.orders.thankyou');
	}

}