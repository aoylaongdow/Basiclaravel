<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Validator;
Use Hash;
Use DB;

//เรียกใช้้ model User
use App\model\User;

class Basiccontroller extends Controller {
	public function index()
	{

		//echo "Hell Laongdow";
		return view('pages.index');
	}
	public function about_us()
	{
		return view('pages.about');
	}
	public function services()
	{
		return view('pages.services');
	}
	public function portfolio()
	{
		return view('pages.portfolio');
	}
	public function blog()
	{
		return view('pages.blog');
	}
	public function contact()
	{
		return view('pages.contact');
	}
	public function register()
	{
		return view('pages.register');
	}
	public function register_submit()
	{
		// รับค่าจาก form
		//echo Request::input('first_name');
		// รับค่าตัวแปรทั้งหมดจาก form
		//echo '<pre>';
		//print_r(Request::all());
		//echo'</pre>';
		$messages = [

				'required' =>'ข้อมูล :attribute จำเป็นต้องกรอก',
				'numeric' =>'ข้อมูล :attribute ต้องเป็นตัวเลขเท่านั้น',
				'digits'	   =>'ข้อมูล :attribute ต้องเป็น :digits หลัก'

		];

		$rules = [
				'first_name'		 	=>'required',
				'last_name'			=>'required',
				'email' 				=>'required|unique:users',//ดักอีเมลล์ซ้ำ
				'tel' 				=>'required|numeric|digits:10',//ดักเบอร์โทร10หลัก
				'password' 			=>'required',
				'password_confirmation' 	=>'required'

		];

		$validator = Validator::make(Request::all(),$rules,$messages);
		if($validator->fails()){
			//echo "Validate fail!!!";
			//refresh กลับหน้าจอเดิม
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			//echo "Validate Success";
			//User::create(Request::all());//ในเคสชื่อฟิลในฟอร์มและฟิลในDBตรงกัน
			$data_user = array(
					'firstname'		=> Request::input('first_name'),
					'lastname'		=> Request::input('last_name'),
					'email'			=> Request::input('email'),
					'tel'			=> Request::input('tel'),
					'password'		=> Hash::make(Request::input('password'))
			);
			//User::create($data_user);
		
		$insert_user = User::create($data_user);
		if($insert_user->exists())
		{
			//echo "Insert Success";
			return redirect('register')->with('status','<div class="alert alert-success msgbox text-center">Insert Success</div>');
		
		} else {
			//echo "Insert Fail!!!";
			return redirect('register')->with('status','<div class="alert alert-danger msgbox text-center">Insert Fail!!!</div>');
		
		}
	}

}
	public function customers_list()
	{
		//echo '<pre>';
		//print_r(DB::table('customers')->get(['customerName','postalCode']));
		//print_r(
			//DB::table('customers')->where('postalCode');
		//);
		//echo'</pre>';
		$data = DB::table('customers')->paginate(20);
		$data_count = DB::table('customers')->count();
		//echo $data_all;
		return view('pages.customer_list')->with(array('data_customer'=>$data,'data_count'=>$data_count));

	}
	public function product_list()
	{
		//$data_product = DB::table('product')->get();
		$data_product = DB::table('product')
		->join('category','product.category_id','=','category.category_id')
		->join('manufacturer','product.menufac_id','=','manufacturer.menufac_id')	
		->select('*')
		->paginate(20);
		$data_count = count($data_product);
		return view('pages.product_list')->with(array('data_product'=>$data_product,'data_count'=>$data_count));
		
		//echo '<pre>';
		//print_r($data_product);
		//echo '</pre>';
	}


}
