<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PosnetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Card::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $requestValidate = $request->validate(
            [
                'name' => ['required', 'in:Visa,AMEX'],
                'bankName' => ['required', 'string', 'max:255'],
                'cardNumber' => ['required', 'int', 'digits:8'],
                'clientDni' => ['required', 'string', 'max:255'],
                'clientName' => ['required', 'string', 'max:255'],
                'clientLastName' => ['required', 'string', 'max:255'],
                'availableLimit' => ['required', 'numeric'],
            ]
        );

        Card::create($requestValidate);

        return $requestValidate;
    }

    public function doPayment(Request $request, int $cardNumber)
    {
        $requestValidated = $request->validate(
            [
                'cuots' => ['required', 'in:1,2,3,4,5,6'],
                'amount' => ['required', 'numeric', 'min:10'],
            ]
        );

        $card = Card::where('cardNumber', $cardNumber)->first();

        if($card) {

            $totalAmount = $requestValidated['amount'] + $requestValidated['amount'] * (($requestValidated['cuots'] - 1) * 3) / 100;


            if($card->availableLimit >= $totalAmount) {

                $data = [
                    'totalAmount' => $totalAmount,
                    'cuotAmount' => $totalAmount / $requestValidated['cuots'],
                    'client' => [
                        'name' => $card->clientName,
                        'lastName' => $card->clientLastName
                    ]
                ];

                return response()->json($data, 200);
            } else {
                return response()->json(['message' => 'monto no disponible'], Response::HTTP_NOT_FOUND);
            }
        }
        else {
            return response()->json(['message' => 'El número de tarjeta no existe'], Response::HTTP_NOT_FOUND);
        }
    }
}
