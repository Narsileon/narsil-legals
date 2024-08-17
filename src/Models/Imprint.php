<?php

namespace Narsil\Legals\Models;

#region USE

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;
use Narsil\Localization\Models\Language;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class Imprint extends Model
{
    #region CONSTRUCTOR

    /**
     * @param array $attributes
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->table = self::TABLE;

        $this->casts = [
            self::ACTIVE => true,
        ];

        $this->guarded = [
            self::ID,
        ];

        $this->with = [
            self::RELATIONSHIP_LANGUAGE
        ];

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ACTIVE = 'active';
    /**
     * @var string
     */
    final public const CONTENT = 'content';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const LANGUAGE_ID = 'language_id';

    /**
     * @var string
     */
    final public const RELATIONSHIP_LANGUAGE = 'language';

    /**
     * @var string
     */
    final public const TABLE = 'imprints';

    #endregion

    #region RELATIONSHIP

    /**
     * @return BelongsTo
     */
    final public function language(): BelongsTo
    {
        return $this->belongsTo(
            Language::class,
            self::LANGUAGE_ID,
            Language::ID
        );
    }

    #endregion

    #region SCOPES

    /**
     * @param Builder $query
     *
     * @return void
     */
    final public function scopeActive(Builder $query): void
    {
        $query
            ->where(self::ACTIVE, true)
            ->whereRelation(self::RELATIONSHIP_LANGUAGE, Language::LOCALE, App::getLocale())
            ->orWhereRelation(self::RELATIONSHIP_LANGUAGE, Language::LOCALE, App::getFallbackLocale());
    }

    #endregion
}
