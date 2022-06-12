<?php
namespace App\Presenters;

use App\Transformer\ModelTransformer;
use Exception;
use League\Fractal\Manager;

/**
 * Class ModelFractalPresenter
 * @package App\Presenter
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class ModelFractalPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return ModelTransformer
     * @throws Exception
     */
    public function getTransformer()
    {
        if (!class_exists(Manager::class)) {
            throw new Exception("Package required. Please install: 'composer require league/fractal' (0.12.*)");
        }

        return new ModelTransformer();
    }
}
