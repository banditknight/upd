<?php

namespace App\Http\Controllers;

use App\Exceptions\Custom\File\FileDoesNotBelongToYouException;
use App\Exceptions\Custom\File\LoginToAccessFileException;
use App\Http\Requests\File\PdfRequest;
use App\Models\v1\AssessmentCriteria;
use App\Models\v1\Asset;
use App\Models\v1\TenderTechnicalBidEvaluation;
use App\Traits\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class FileController extends Controller
{
    use User;

    /**
     * @throws Exception
     */
    public function xlsx()
    {
        $exportFile = storage_path('/report-export-' . Uuid::uuid4() . '.xlsx');
        @unlink($exportFile);

        $fp = fopen($exportFile, 'wb');

        $headerSummary = [
            'Description',
            'Weight'
        ];

        $data = [];

        $spreadsheet = new Spreadsheet();

        $tbeList = TenderTechnicalBidEvaluation::where('tenderId', '=', 1)->get(['assessmentCriteriaId', 'assessmentCriteriaItem']);

        foreach ($tbeList as $tbe) {
            $assessmentCriteria = AssessmentCriteria::find($tbe->assessmentCriteriaId);

            $data[] = [
                $assessmentCriteria->name,
                $assessmentCriteria->weight,
            ];
        }

        $sheetSummary = $spreadsheet->getActiveSheet()->setTitle('TBE');
        $sheetSummary->fromArray($headerSummary);
        $sheetSummary->fromArray(
            $data
        , '', 'A2');

        $writer = new Xlsx($spreadsheet);
        $writer->save($exportFile);

        fclose($fp);

        //https://docs.microsoft.com/en-us/previous-versions/office/office-2007-resource-kit/ee309278(v=office.12)?redirectedfrom=MSDN
        $response = new BinaryFileResponse($exportFile);
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'export.xlsx');
        $response->deleteFileAfterSend(true);

        return $response;

    }

    /**
     * @throws FileDoesNotBelongToYouException
     * @throws LoginToAccessFileException
     */
    public function pdf(PdfRequest $pdfRequest)
    {
        $assetId = $pdfRequest->get('id');

        $asset = Asset::find($assetId);

        if (!$asset) { throw new NotFoundHttpException('File not found'); }

        $userId = $asset->userId;
        $loggedInUser = $this->getUser();

        if ($userId !== null && $loggedInUser === null) {
            throw new LoginToAccessFileException();
        }

        if ($userId !== null && $loggedInUser && $loggedInUser->id !== $userId && !$loggedInUser->isSuperAdmin()) {
            throw new FileDoesNotBelongToYouException();
        }

        return new BinaryFileResponse($asset->rawPathAttachment, 200);
    }

    public function files(Request $request){
        $assetId = $request->get('id');

        $asset = Asset::find($assetId);

        if (!$asset) { throw new NotFoundHttpException('File not found'); }

        $userId = $asset->userId;
        $loggedInUser = $this->getUser();

        if ($userId !== null && $loggedInUser === null) {
            throw new LoginToAccessFileException();
        }

        if ($userId !== null && $loggedInUser && $loggedInUser->vendorId !== $asset->vendorId && $loggedInUser->hasRole('vendor')) {
            throw new FileDoesNotBelongToYouException();
        }

        return new BinaryFileResponse($asset->rawPathAttachment, 200);
    }
}
