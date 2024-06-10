<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function berandaView()
    {
        $product_count = Product::count();
        $customer_count = Customer::count();
        $transaction_count = TransactionDetail::count();
        return view('beranda.index', compact("product_count", "customer_count", "transaction_count"));
    }

    public function productIndex()
    {
        $data_product = Product::get();
        return view('product.index', compact("data_product"));
    }
    public function productCreateIndex()
    {

        return view('product.create',);
    }
    public function productEditIndex($id)
    {
        $data_product = Product::where("id", $id)->get();
        return view('product.edit', compact("data_product"));
    }
    public function customerIndex()
    {
        $data_customer = Customer::get();
        return view('customer.index', compact("data_customer"));
    }
    public function customerCreateIndex()
    {

        return view('customer.create',);
    }
    public function customerEditIndex($id)
    {
        $data_customer = Customer::where("id", $id)->get();
        return view('customer.edit', compact("data_customer"));
    }
    public function transactionDetailIndex()
    {
        $data_transaction_detail = TransactionDetail::with(["user", "product_transaction_detail"])->get();
        return view('transaction-detail.index', compact("data_transaction_detail"));
    }
    public function transactionDetailDetailIndex($id)
    {
        $data_transaction_detail = TransactionDetail::where("id", $id)->with(["user", "product_transaction_detail"])->first();
        return view('transaction-detail.detail', compact("data_transaction_detail"));
    }
}
