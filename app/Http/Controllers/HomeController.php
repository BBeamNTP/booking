<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        dd($request);
        try {
            $filename = '';
            $destinationPath = '';
            $files_image = $request->file('filename');
            if ($request->hasFile('filename')) {
                $validatedData = $this->validate($request, [
                    'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $filename = md5(time() . rand(0, 40000)) . $files_image->getClientOriginalName();
                $destinationPath = '/storage/uploads/Product';
                $files_image->move(public_path($destinationPath), $filename);
            }
            $advertising = array(
                "advertising_img" => $filename,
                "advertising_path" => '/public' . $destinationPath,
                "paper_no" => $request->input('paper_no'),
                "customer_name" => $request->input('customer_name'),
                "advertising_name" => $request->input('advertising_name'),
                "advertising_position" => $request->input('advertising_position'),
                "advertising_date_start" => $request->input('advertising_date_start'),
                "advertising_date_end" => $request->input('advertising_date_end'),
                "advertising_time_start" => $request->input('advertising_time_start'),
                "advertising_time_end" => $request->input('advertising_time_end'),
                "advertising_view" => 0,
                "advertising_click" => 0,
                "advertising_ctr" => 0,
                "advertising_detail" => $request->input('advertising_detail'),
                'created_by' => Auth::user()->id,
                'status' => 'active',
            );
            Advertisings::create($advertising);
            return response('Success');
        } catch (QueryException $err) {
            return response($err);
        }
    }
}
