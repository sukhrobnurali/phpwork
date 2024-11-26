<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            'web_agency' => [
                'uz' => 'Veb-studiya va agentliklar',
                'ru' => 'Веб-студии и агентства',
            ],
            'e_commerce' => [
                'uz' => 'E-commerce kompaniyalar',
                'ru' => 'E-commerce компании',
            ],
            'it_outsourcing' => [
                'uz' => 'IT autsorsing kompaniyalari',
                'ru' => 'IT аутсорсинговые компании',
            ],
            'startups' => [
                'uz' => 'Startaplar',
                'ru' => 'Стартапы',
            ],
            'media_portals' => [
                'uz' => 'Yangiliklar va media portallar',
                'ru' => 'Новостные и медийные порталы',
            ],
            'social_networks' => [
                'uz' => 'Ijtimoiy tarmoqlar va platformalar',
                'ru' => 'Социальные сети и платформы',
            ],
            'corporate_sites' => [
                'uz' => 'Korporativ saytlar',
                'ru' => 'Корпоративные сайты',
            ],
            'educational_platforms' => [
                'uz' => 'Ta\'lim platformalari',
                'ru' => 'Образовательные платформы',
            ],
            'bank' => [
                'uz' => 'Bank',
                'ru' => 'Банк',
            ],
            'fin_tex' => [
                'uz' => 'Fin Tex',
                'ru' => 'Фин Тех',
            ],
        ];
        $insertCompanies = [];
        foreach ($companies as $type => $translate) {
            $category = new Category;
            $category->type = $type;
            $category->translates = json_encode($translate);
            $category->getQualifiedCreatedAtColumn();
            $category->getQualifiedUpdatedAtColumn();
            $insertCompanies[] = $category->toArray();
        }
        Category::query()->insert($insertCompanies);
    }
}
