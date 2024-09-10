<?php

namespace Narsil\Legals\Http\Forms;

#region USE

use Illuminate\Http\Request;
use Narsil\Forms\Builder\AbstractForm;
use Narsil\Forms\Builder\AbstractFormNode;
use Narsil\Forms\Builder\Elements\FormCard;
use Narsil\Forms\Builder\Inputs\FormOptions;
use Narsil\Forms\Builder\Inputs\FormSelect;
use Narsil\Forms\Builder\Inputs\FormString;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Localization\Models\Language;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PrivacyNoticeForm extends AbstractForm
{
    #region CONSTRUCTOR

    /**
     * @param mixed $resource
     *
     * @return void
     */
    public function __construct(mixed $resource)
    {
        parent::__construct($resource, 'Privacy notice', 'privacy-notice');
    }

    #endregion

    #region PUBLIC METHODS

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        $attributes = parent::toArray($request);

        $attributes[PrivacyNotice::RELATIONSHIP_LANGUAGE] = null;

        return $attributes;
    }

    #endregion

    #region PROTECTED METHODS

    /**
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            PrivacyNotice::LANGUAGE_ID => (new FormOptions())
                ->options(Language::options()->get()->toArray())
                ->get(),
        ];
    }

    /**
     * @return array<AbstractFormNode>
     */
    protected function getSchema(): array
    {
        return [
            (new FormCard('default'))
                ->children([
                    (new FormSelect(PrivacyNotice::LANGUAGE_ID))
                        ->valueKey(Language::ID)
                        ->required(),
                    (new FormString(PrivacyNotice::CONTENT))
                        ->nodeType('editor')
                        ->required(),
                ]),
        ];
    }

    #endregion
}
