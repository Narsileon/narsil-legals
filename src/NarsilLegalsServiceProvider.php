<?php

namespace Narsil\Legals;

#region USE

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Narsil\Legals\Models\Imprint;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Legals\Policies\ImprintPolicy;
use Narsil\Legals\Policies\PrivacyNoticePolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class NarsilLegalsServiceProvider extends ServiceProvider
{
    #region PUBLIC METHODS

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->bootMigrations();
        $this->bootPolicies();
        $this->bootRoutes();
        $this->bootTranslations();
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return void
     */
    private function bootMigrations(): void
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);
    }

    /**
     * @return void
     */
    private function bootPolicies(): void
    {
        Gate::policy(Imprint::class, ImprintPolicy::class);
        Gate::policy(PrivacyNotice::class, PrivacyNoticePolicy::class);
    }

    /**
     * @return void
     */
    private function bootRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * @return void
     */
    private function bootTranslations(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang', 'legals');
    }

    #endregion
}
