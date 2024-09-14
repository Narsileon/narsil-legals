<?php

namespace Narsil\Legals\Http\Controllers;

#region USE

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Menus\Models\MenuNode;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PrivacyNoticeController extends Controller
{
    #region PUBLIC METHODS

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $breadcrumb = [[
            MenuNode::LABEL => trans('Privacy notice'),
            MenuNode::URL => route('privacy-notice'),
        ]];

        $content = $this->getContent();

        return Inertia::render('narsil/legals::PrivacyNotice/Index', compact(
            'breadcrumb',
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
        $privacyNotice = PrivacyNotice::active()->first();

        return $privacyNotice?->{PrivacyNotice::CONTENT} ?? '';
    }

    #endregion
}
