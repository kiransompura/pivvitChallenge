<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Models\Purchase;
use Illuminate\Support\Facades\Response;
use Validator;
use DB;

class PurchaseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $purchaseData = DB::table('purchase')->select('purchase.id', 'purchase.offering_id', 'offering.title', 'offering.price', 'purchase.quantity')
                ->leftJoin('offering', 'offering.id', '=', 'purchase.offering_id')
                ->get();

        return Response::json(['data' => $purchaseData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $post = $request->all();
        //$post['offering_id'] = 45;
        $validator = $this->checkValidation($post);
        //if validation fails send first error massage
        if ($validator->fails()) {
            $allValidation = $this->getMessage($validator);
            return Response::json($allValidation);
        } else {

            Purchase::create($post);

            return Response::json(['message' => 'Insert successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function getMessage($validator) {   // it get a error message
        $messages = $validator->messages();
        if (!empty($messages)) {
            foreach ($messages->all() as $error) {
                $data['error'] = $error;
                $data['status'] = false;
                return $data;
            }
        }
    }

    public function checkValidation($input) {

        $validator = Validator::make($input, [
                    'customer_name' => 'required',
                    'offering_id' => 'required|exists:offering,id',
                    'quantity' => 'required|numeric',
        ]);
        return $validator;
    }

}
