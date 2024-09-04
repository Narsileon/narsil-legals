<?php

namespace Narsil\Legals\Http\Resources;

#region USE

use Illuminate\Http\Request;
use JsonSerializable;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Localization\Models\Language;
use Narsil\Tables\Http\Resources\DataTableCollection;
use Narsil\Tables\Structures\ModelColumn;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PrivacyNoticeDataTableCollection extends DataTableCollection
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

            $attributes[PrivacyNotice::LANGUAGE_ID] = null;
            $attributes[PrivacyNotice::RELATIONSHIP_LANGUAGE] = [
                Language::LANGUAGE => $item->{PrivacyNotice::RELATIONSHIP_LANGUAGE}->{Language::LANGUAGE},
            ];

            return array_filter($attributes);
        });
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return array
     */
    protected function getColumns(): array
    {
        $columns = parent::getColumns();

        $columns[PrivacyNotice::LANGUAGE_ID] = array_merge(($columns[PrivacyNotice::LANGUAGE_ID]), [
            ModelColumn::ACCESSOR_KEY => PrivacyNotice::RELATIONSHIP_LANGUAGE . '.' . Language::LANGUAGE,
        ]);

        return $columns;
    }

    #endregion
}
