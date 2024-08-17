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
            MenuNode::LABEL => 'Imprints',
            MenuNode::URL => '/backend/imprints',
            MenuNode::VISIBILITY => VisibilityEnum::AUTH->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/fingerprint',
        ], [
            MenuNode::LABEL => 'Privacy notices',
            MenuNode::URL => '/backend/privacy-notices',
            MenuNode::VISIBILITY => VisibilityEnum::AUTH->value,
            MenuNode::RELATIONSHIP_ICON => 'lucide/shield',
        ]];
    }

    /**
     * @return array
     */
    public static function getFooterMenu(): array
    {
        return [[
            MenuNode::LABEL => 'Imprint',
            MenuNode::URL => '/imprint',
            MenuNode::VISIBILITY => VisibilityEnum::USER->value,
        ], [
            MenuNode::LABEL => 'Privacy notice',
            MenuNode::URL => '/privacy-notice',
            MenuNode::VISIBILITY => VisibilityEnum::USER->value,
        ]];
    }

    #endregion
}
