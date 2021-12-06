<?php

namespace App\Http\Controllers\API;

use App\Models\Ballance;
use App\Models\MetaData;
use App\Models\MetaRequest;
use App\Models\Settings;
use App\Services\ScrapMeta;
use App\Services\Traits\Filter;
use App\Services\Traits\Search;
use App\Services\Traits\Sort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MetaController extends Controller
{
    use Sort;
    use Filter;
    use Search;
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function fetchMeta(Request $request)
    {
        $now = now();
        $this->validate(request(), [
            'url' => ['required', 'string'],
            'accept-language' => ['sometimes', 'string'],
        ]);
        $language = $request->get('accept-language') ?? '';

        $reqCount = MetaRequest::whereBetween('created_at', [$now->copy()->subMonth(), $now])->where(['is_paid' => false, 'user_id' => auth()->user()->id])->get()->count();
        $setting = Settings::where('name', 'Monthly Free Requests')->first();
        $settingPerReq = Settings::where('name', 'Per Request Price')->first();
        $ballance = Ballance::where('user_id', auth()->user()->id)->first();

        if ($setting->value > $reqCount) {
            $scrapService = new ScrapMeta($request->get('url'), $language);
            $data = $scrapService->getMetaTagsFromUrl();

            $metaData = new MetaData();
            $metaData->url = $request->get('url');
            $metaData->is_meta = count($data) > 0 ? true : false;
            $metaData->lang = $request->get('accept-language') ?? '';
            $metaData->meta_data = json_encode($data);
            $metaData->save();
            $this->storeMetaRequest($metaData);
        } elseif (isset($ballance) && $ballance->balance > $settingPerReq->value) {
            $scrapService = new ScrapMeta($request->get('url'), $language);
            $data = $scrapService->getMetaTagsFromUrl();

            $metaData = new MetaData();
            $metaData->url = $request->get('url');
            $metaData->is_meta = count($data) > 0 ? true : false;
            $metaData->lang = $request->get('accept-language') ?? '';
            $metaData->meta_data = json_encode($data);
            $metaData->save();

            $this->storeMetaRequest($metaData, $settingPerReq->value);
            $ballance->balance = $ballance->balance - $settingPerReq->value;
            $ballance->used_credits = $ballance->used_credits + $settingPerReq->value;
            $ballance->update();
        } else {
            return response()->json([
                'message' => 'Your monthly requests limit is reached and you do not have suffient ballance in your account please add payment for further requests'
            ], 422);
        }

        return response()->json($data, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getMetaData(Request $request)
    {
        $this->validate(request(), [
            'url' => ['required', 'string'],
            'accept-language' => ['sometimes', 'string'],
        ]);
        $metaData = MetaData::where('url', $request->get('url'))->orderBy('created_at', 'desc')->first();

        if (!$metaData) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'message' => ['Data against this url not found.']
            ]);
            throw $error;
        }
        $metaData->meta_data = json_decode($metaData->meta_data);

        return response()->json($metaData, 200);
    }

    public function storeMetaRequest($meta, $price = null)
    {
        $metaRequest = new MetaRequest();
        $metaRequest->user_id = auth()->user()->id;
        $metaRequest->meta_id = $meta->id;
        $metaRequest->url = $meta->url;
        $metaRequest->is_paid = $price ? true : false;
        $metaRequest->amount_paid = $price ?? null;
        $metaRequest->save();
    }


    public function showRequests(Request $request) {
        $now = now();
        $metaRequests = MetaRequest::query()->where('user_id', auth()->user()->id);
        $metaRequests = $this->search($metaRequests, ['charge_id', 'balance_transaction', 'amount', 'created_at']);

        if ($request->has('direction')) {
            $columns = $this->sortables($request);
            $metaRequests = $this->sort($metaRequests, $columns, $request->get('direction'));
        } else {
            $metaRequests = $metaRequests->orderBy('created_at', 'asc');
        }

        $metaRequests = $metaRequests->orderBy('created_at', 'asc')->paginate(100);
        $params = $request->all();

        $totalRequests = MetaRequest::where('user_id', auth()->user()->id)->get()->count();
        $reqCount = MetaRequest::whereBetween('created_at', [$now->copy()->subMonth(), $now])->where(['is_paid' => false, 'user_id' => auth()->user()->id])->get()->count();
        $setting = Settings::where('name', 'Monthly Free Requests')->first();
        $settingPerReq = Settings::where('name', 'Per Request Price')->first();
        $ballance = Ballance::where('user_id', auth()->user()->id)->first();

        $remainFree = $setting->value - $reqCount > 0 ? $setting->value - $reqCount : 0;
        if ($ballance) {
            $remainPaid = $ballance->balance/$settingPerReq->value > 0 ? $ballance->balance/$settingPerReq->value : 0;
        }

        return Inertia::render('Requests/show', [
            'requests' => $metaRequests->withQueryString(),
            'customer' => auth()->user(),
            'total_requests' => $totalRequests,
            'remains_free' => $remainFree,
            'remains_paid' => $remainPaid ?? 0,
            'params' => $params
        ]);
    }
}
