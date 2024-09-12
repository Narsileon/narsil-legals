<?php

namespace Narsil\Legals\Http\Resources\Imprints;

#region USE

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Narsil\Legals\Models\Imprint;
use Narsil\Localization\Models\Language;
use Narsil\Tables\Constants\Types;
use Narsil\Tables\Http\Resources\ShowTableResource;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ImprintShowTableResource extends ShowTableResource
{
    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        $attributes = $this->resource->toArray();

        $attributes[Imprint::LANGUAGE_ID] = null;
        $attributes[Imprint::RELATIONSHIP_LANGUAGE] = [
            Language::LABEL => $this->resource->{Imprint::RELATIONSHIP_LANGUAGE}->{Language::LABEL},
        ];

        return array_filter($attributes);
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return Collection<ModelColumn>
     */
    protected function getColumns(): Collection
    {
        $columns = parent::getColumns();

        $languageId = $columns->get(Imprint::LANGUAGE_ID);

        $languageId->setAccessorKey(Imprint::RELATIONSHIP_LANGUAGE . '.' . Language::LABEL);
        $languageId->setType(Types::STRING);

        $columns->put(Imprint::LANGUAGE_ID, $languageId);

        return $columns;
    }

    #endregion
}
