<?php

namespace Narsil\Legals\Http\Resources;

#region USE

use Illuminate\Http\Request;
use JsonSerializable;
use Narsil\Legals\Models\Imprint;
use Narsil\Localization\Models\Language;
use Narsil\Tables\Http\Resources\DataTableCollection;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ImprintDataTableCollection extends DataTableCollection
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return JsonSerializable
     */
    public function toArray(Request $request): JsonSerializable
    {
        return $this->collection->map(function ($item)
        {
            $attributes = $item->toArray();

            $attributes[Imprint::LANGUAGE_ID] = $item->{iMPRINT::RELATIONSHIP_LANGUAGE}->{Language::LANGUAGE};
            $attributes[Imprint::RELATIONSHIP_LANGUAGE] = null;

            return array_filter($attributes);
        });
    }

    #endregion
}
