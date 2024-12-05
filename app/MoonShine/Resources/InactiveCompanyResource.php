<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Company;
use App\Models\Category;
use MoonShine\Fields\Url;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use Illuminate\Support\Facades\App;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Company>
 */
class InactiveCompanyResource extends ModelResource
{
    protected string $model = Company::class;

    protected string $title = 'Inactive Companies';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $locale = App::currentLocale();

        return [
            Text::make('Name', 'name')
                ->required(),

            Image::make('Logo', 'logo')->readonly(),

            Select::make('category_id')
                ->options(Category::query()
                    ->select(["translates->{$locale} as name", 'id'])
                    ->pluck('name', 'id')->toArray()),
            Url::make('Website URL', 'website_url')
                ->nullable(),

            Url::make('HH URL', 'hh_url')
                ->nullable(),

            Url::make('LinkedIn URL', 'linkedin_url')
                ->nullable(),

            Select::make('Status', 'status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ]),
        ];
    }

    /**
     * Override the query method to filter by inactive status.
     */
    public function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return parent::query()
            ->where('status', 'inactive');
    }

    /**
     * Disable the creation of new records.
     */
    public function canCreate(): bool
    {
        return false; // Disable the create option
    }

    /**
     * Disable the ability to add new records.
     */
    public function canStore(): bool
    {
        return false; // Disable storing new records
    }

    /**
     * @param  Company  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
