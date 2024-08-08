<?php

namespace Narsil\Legals\Http\Controllers;

#region USE

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Legals\Models\Imprint;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ImprintController extends Controller
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $content = $this->getContent();

        return Inertia::render('narsil/legals::Imprint/Index', compact(
            'content',
        ));
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return string
     */
    private function getContent(): string
    {
        $imprint = Imprint::active()->first();

        return $imprint?->{Imprint::CONTENT} ?? "";
    }

    #endregion
}
