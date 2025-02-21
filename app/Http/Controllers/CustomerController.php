<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryPrams = $request->all();
        $query = Customer::query();

        if (isset($queryPrams["filter"])) {
            foreach ($queryPrams["filter"] as $key => $value) {
                if (!empty($value)) {
                    $query->where($key, "like", "%{$value}%");
                }
            }
        }
        if (isset($queryPrams["sort"])) {
            foreach ($queryPrams["sort"] as $key => $value) {
                if (!empty($value)) {
                    $query->orderBy($key, $value);
                }
            }
        }
        return response()->json(CustomerResource::collection($query->paginate(
            $queryPrams["page"]["size"]??10,
            ['*'],
            $queryPrams['page']['number']??"1",
            $queryPrams['page']['number']?? null
        )))->header("x-api-version","v1");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validatedData = $request->validated();
        return new CustomerResource(Customer::create($validatedData));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            ["Customer" => Customer::findOrFail($id)]
        )->header("x-api-version","v1");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(new CustomerResource($customer))->header("x-api-version","v1");
    }
}
