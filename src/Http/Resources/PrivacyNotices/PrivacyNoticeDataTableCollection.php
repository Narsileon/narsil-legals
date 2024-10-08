<?php

namespace Narsil\Legals\Http\Resources\PrivacyNotices;

#region USE

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use JsonSerializable;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Localization\Models\Language;
use Narsil\Tables\Constants\Types;
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
                Language::LABEL => $item->{PrivacyNotice::RELATIONSHIP_LANGUAGE}->{Language::LABEL},
            ];

            return array_filter($attributes);
        });
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return Collection<ModelColumn>
     */
    protected function getColumns(): Collection
    {
        $columns = parent::getColumns();

        $languageId = $columns->get(PrivacyNotice::LANGUAGE_ID);

        $languageId->setAccessorKey(PrivacyNotice::RELATIONSHIP_LANGUAGE . '.' . Language::LABEL);
        $languageId->setType(Types::STRING);

        $columns->put(PrivacyNotice::LANGUAGE_ID, $languageId);

        return $columns;
    }

    #endregion
}
