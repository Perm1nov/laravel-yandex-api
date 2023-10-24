<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\AddressDtoFactory;
use App\Services\requestAddress\RequestAddressService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('site');
    }

    /**
     * @throws GuzzleException
     */
    public function saveAddress(Request $request, RequestAddressService $service): string
    {
        $request->validate([
            'address' => 'required|string'
        ]);

        $dto = AddressDtoFactory::createFromRequest($request);

        $result = $service->run($dto);

        return $result ? 'Адрес успешно сохранен' : 'Адрес не сохранен';
    }
}
