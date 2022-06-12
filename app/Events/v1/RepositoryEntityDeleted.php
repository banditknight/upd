<?php
namespace App\Events\v1;

/**
 * Class RepositoryEntityDeleted
 * @package App\Events
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class RepositoryEntityDeleted extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "deleted";
}
