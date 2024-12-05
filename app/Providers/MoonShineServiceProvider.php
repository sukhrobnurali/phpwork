<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\Pages\Page;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use App\MoonShine\Resources\CompanyResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use App\MoonShine\Resources\InactiveCompanyResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
            new CompanyResource,
            new InactiveCompanyResource,
        ];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [

        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource
                ),
            ]),

            MenuItem::make(
                static fn () => __('Companies'),
                new CompanyResource
            )->icon('heroicons.academic-cap'),

            MenuItem::make(
                static fn () => __('Inactive Company'),
                new InactiveCompanyResource
            )->icon('heroicons.check-circle'),
        ];
    }

    protected function theme(): array
    {
        return [];
    }
}
