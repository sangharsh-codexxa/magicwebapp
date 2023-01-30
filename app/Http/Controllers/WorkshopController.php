<?php

namespace App\Http\Controllers;

use App\Library\DataTable;
use App\Currency;
use App\Workshop;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Session;


class WorkshopController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    //
  }

  public function index()
  {
    $userid = auth()->user()->id;
    $cate = Workshop::orderBy('id', 'ASC')->get();
    return view('admin.workshop.index', compact('cate'));
  }


  public function store(Request $request)
  {
    $data = $this->validate($request, [
      "title" => "required|unique:categories,title",

    ]);

    $input = $request->all();
    // $slug = str_slug($input['title'],'-');
    // $input['slug'] = $slug;

    if ($file = $request->file('image')) {

      $path = 'images/workshop/';

      if (!file_exists(public_path() . '/' . $path)) {

        $path = 'images/workshop/';
        File::makeDirectory(public_path() . '/' . $path, 0777, true);
      }
      $optimizeImage = Image::make($file);
      $optimizePath = public_path() . '/images/workshop/';
      $image = time() . $file->getClientOriginalName();
      $optimizeImage->save($optimizePath . $image, 72);

      $input['image'] = $image;
    }

    $input['status'] = isset($request->status)  ? 1 : 0;
    $data = Workshop::create($input);

    $data->save();
    Session::flash('success', trans('flash.AddedSuccessfully'));
    return redirect('workshop');
  }


  public function workshopDetail(Workshop $id)
  {
    $workshop = $id;
    return view('front.workshop_detail', compact('workshop'));
  }
  
  public function bookings()
  {
      $workshops = Workshop::all();

      return view('admin.workshop.booking', compact('workshops'));
  }

  public function book(Request $request)
  {

    $lastOrder = DB::table('workshop_booking')
      ->select('order_id')
      ->take(1)
      ->orderBy('created_at', 'desc')
      ->get();

    if (!$lastOrder->count()) {

      $number = 0;
    } else {
      $number = substr($lastOrder[0]->order_id, 3);
    }

    $txn_id = $request->razorpay_payment_id;
    $currency = Currency::where('default', '=', '1')->first();

    $payment_method = 'RazorPay';
    DB::table('workshop_booking')->insert([
      'workshop_id' => $request->workshop_id,
      'user_id' => auth()->user()->id,
      'order_id' => '#' . sprintf("%08d", intval($number) + 1),
      'transaction_id' => $txn_id,
      'payment_method' => $payment_method,
      'total_amount' => $request->amount,
      'currency' => $currency->code,
      'currency_icon' => $currency->symbol,
      'status' => 1,
    ]);

    Session::flash('success', 'Payment successful');
    return redirect('/');
  }

  public function destroy($id)
  {

    // if (Auth::User()->role == "admin") {

    $course = Workshop::where('id', $id)->get();

    //   if (!$course->isEmpty()) {
    //     return back()->with('delete', trans('flash.CannotDeleteCategory'));
    //   } else {

    DB::table('workshops')->where('id', $id)->delete();

    return back()->with('delete', trans('flash.DeletedSuccessfully'));


    return redirect('workshop');
  }
  
  public function list(Request $request)
  {
      $config = [
            'table' => 'workshop_booking',
            'columns' => [
               'users.fname', 'users.lname', 'workshops.title as workshop_name', 'workshop_booking.created_At as booking_date'
            ],
            'search_by' => ['id'],
            'order_by' => [],
            'where' => [
                
            ],
            'joins' => [
                
                ['table' => 'users', 't1_col' => 'users.id', 'op' => '=', 't2_col' => 'workshop_booking.user_id'],
                ['table' => 'workshops', 't1_col' => 'workshops.id', 'op' => '=', 't2_col' => 'workshop_booking.workshop_id'],
            ],
            'default_order' =>
            ['workshop_booking.id' => 'DESC'],
        ];

        if ($request->workshop_id != null && $request->workshop_id != 0)
            $config['where'][] = ['col' => 'workshops.id', 'op' => '=', 'val' => $request->workshop_id];


        $data = DataTable::getData($config);
        $response = [];

        foreach ($data['data'] as $d) {
            $response[] = [
                $d->fname . ' ' . $d->lname,
                $d->workshop_name,
                $d->booking_date
                ];
        }

        $data['data'] = $response;


        return response()
            ->json($data);
  }
}
