<?php

namespace Narsil\Legals\Http\Menus;

#region USE

use Narsil\Menus\Enums\VisibilityEnum;
use Narsil\Menus\Http\Menus\AbstractMenu;
use Narsil\Menus\Models\MenuNode;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class Menu extends AbstractMenu
{
    #region PUBLIC METHODS

    /**
     * @return array
     */
    public static function getBackendMenu(): array
    {
        return [[
            MenuNode::URL => route('backend.imprints.index', absolute: false),
            MenuNode::LABEL => 'Imprints',
            MenuNode::RELATIONSHIP_ICON => 'lucide/fingerprint',
        ], [
            MenuNode::URL => route('backend.privacy-notices.index', absolute: false),
            MenuNode::LABEL => 'Privacy notices',
            MenuNode::RELATIONSHIP_ICON => 'lucide/shield',
        ]];
    }

    /**
     * @return array
     */
    public static function getFooterMenu(): array
    {
        return [[
            MenuNode::URL => route('imprint', absolute: false),
            MenuNode::LABEL => 'Imprint',
            MenuNode::VISIBILITY => VisibilityEnum::USER->value,
        ], [
            MenuNode::URL => route('privacy-notice', absolute: false),
            MenuNode::LABEL => 'Privacy notice',
            MenuNode::VISIBILITY => VisibilityEnum::USER->value,
        ]];
    }

    #endregion
}
