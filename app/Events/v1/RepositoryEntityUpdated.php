<?php
namespace App\Events\v1;

/**
 * Class RepositoryEntityUpdated
 * @package App\Events
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class RepositoryEntityUpdated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "updated";
}
