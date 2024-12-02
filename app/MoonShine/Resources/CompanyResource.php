<?php

namespace App\MoonShine\Resources;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Image;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Company>
 */
class CompanyResource extends ModelResource
{
    protected string $model = Company::class;
    protected string $title = 'Companies';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Text::make('Name', 'name')
                ->required(),

            Image::make('Logo', 'logo')
                ->required(),

            Select::make('category_id')
                ->options(Category::pluck('name', 'id')->toArray()),
            Url::make('Website URL', 'website_url')
                ->nullable(),

            Url::make('HH URL', 'hh_url')
                ->nullable(),

            Url::make('LinkedIn URL', 'linkedin_url')
                ->nullable(),

            Select::make('Status', 'status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive'
                ]),
        ];
    }

    public function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        return parent::query()
            ->where('status', 'active');
    }

    /**
     * @param Model $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
