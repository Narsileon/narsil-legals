<?php

namespace Narsil\Legals\Policies;

#region USE

use Narsil\Legals\Models\Imprint;
use Narsil\Policies\Policies\AbstractPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class ImprintPolicy extends AbstractPolicy
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(Imprint::class);
    }

    #endregion
}
