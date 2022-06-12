<?php

namespace App\Http\Middleware\v1;

use App\Exceptions\Custom\TenderItemComponentComply\CantResubmitComplyException;
use App\Models\v1\AssessmentCriteriaItem;
use App\Models\v1\TenderItemComply;
use App\Models\v1\TenderItemComponentComply;
use Closure;

class TenderItemComplyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws CantResubmitComplyException
     */
    public function handle($request, Closure $next)
    {
        // Pre-Middleware Action
        $tenderItemComply = TenderItemComply::query()
            ->where('tenderId', '=', $request->get('tenderId'))
            ->where('tenderItemId', '=', $request->get('tenderItemId'))
            ->where('vendorId', '=', $request->get('vendorId'))
            ->where('isTbe', '=', $request->get('isTbe'))
            ->where('isCbe', '=', $request->get('isCbe'))
            ->get()
        ;

        if ($tenderItemComply->count()) {
            throw new CantResubmitComplyException();
        }

        $assessmentCriteriaItemId = $request->get('assessmentCriteriaItemId');
        $isComply = $request->get('isComply');

        $assessmentCriteriaItem = AssessmentCriteriaItem::find($assessmentCriteriaItemId);

        $request->request->set('score',
            $assessmentCriteriaItem && $isComply ?
                $assessmentCriteriaItem->point : 0
        );

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
