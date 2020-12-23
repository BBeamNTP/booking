<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Colors;
use App\Models\ProductDetails;
use App\Models\ProductImages;
use App\Models\Sizes;
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
        $product_id = ProductDetails::leftjoin('product_images', 'product_details.id', '=', 'product_images.product_id')
            ->select('*')->where('product_details.status', 'active')->orderby('product_details.id')->get();
        return view('home')->with(array('sRowProduct' => $product_id));
    }

    public function store(Request $request)
    {
        try {
            $product_id = ProductDetails::select('id')->orderby('id', 'DESC')->first();
            if ($product_id['id'] != null || $product_id['id'] != '' || $product_id['id'] != 0) {
                $productid = $product_id['id'] + 1;
            } else {
                $productid = 1;
            }

            $color = $request->input('color');
            $size = $request->input('size');
            $files_image = $request->file('filename');
            if ($request->hasFile('filename')) {
                $validatedData = $this->validate($request, [
                    'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $filename = md5(time() . rand(0, 40000)) . $files_image->getClientOriginalName();
                $destinationPath = '/storage/uploads/Product';
                $files_image->move(public_path($destinationPath), $filename);
                $image = array(
                    "product_id" => $productid,
                    "image_name" => $filename,
                    "image_path" => '/public' . $destinationPath,
                    'status' => 'active',
                );
                ProductImages::create($image);
            }
            $product = array(
                "id" => $productid,
                "name" => $request->input('product_name'),
                "price" => $request->input('price'),
                'status' => 'active',
            );
            ProductDetails::create($product);
            foreach ($size as $key => $rows) {
                $sizeall = array(
                    "product_id" => $productid,
                    "size_name" => $rows,
                    'status' => 'active',
                );
                Sizes::create($sizeall);
            }
            foreach ($color as $key => $rows) {
                $colorall = array(
                    "product_id" => $productid,
                    "color_name" => $rows,
                    'status' => 'active',
                );
                Colors::create($colorall);
            }
            return response('Success');
        } catch (QueryException $err) {
            return response($err);
        }
    }

    public function detail($id)
    {
        $product = ProductDetails::leftjoin('product_images', 'product_details.id', '=', 'product_images.product_id')
            ->select('*')->where('product_details.id', $id)->where('product_details.status', 'active')->orderby('product_details.id')->get();

        $color = Colors::where('product_id', $id)->where('status', 'active')->get();
        $size = Sizes::where('product_id', $id)->where('status', 'active')->get();

        return view('product_detail')->with(array('sRowProduct' => $product, 'sRowColor' => $color, 'sRowSize' => $size));

    }

    public function booking(Request $request, $id)
    {
        $product = ProductDetails::leftjoin('product_images', 'product_details.id', '=', 'product_images.product_id')
            ->select('*')->where('product_details.id', $id)->where('product_details.status', 'active')->get();

        $cart = array(
            "user_id" => auth()->user()->id,
            "product_id" => $id,
            "product_name" => $product[0]->name,
            "color" => $request->input('color'),
            'size' => $request->input('size'),
            'quantity' => $request->input('quantity'),
            'image_name' => $product[0]->image_name,
            'image_path' => $product[0]->image_path,
            'status' => 'wait',
        );
        Carts::create($cart);
        return redirect('/home');

    }

    public function getCart()
    {
        try {
            $cart = Carts::where('user_id', auth()->user()->id)->where('status', 'wait')->get();
            $quantity = 0;
            foreach ($cart as $row) {
                $quantity = $quantity + $row->quantity;
            }
            $output = '<span class="badge badge-primary">' . $quantity . '</span>';

            return response()->json(['output' => $output]);

        } catch (QueryException $err) {
            return response($err);
        }
        return response()->json(['output' => $output]);

    }

    public function viewCart()
    {
        $cart = Carts::where('user_id', auth()->user()->id)->where('status', 'wait')->get();
        return view('cart')->with(array('cart' => $cart));
    }
}
