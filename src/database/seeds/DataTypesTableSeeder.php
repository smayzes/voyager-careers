<?php

namespace Codelabs\VoyagerCareers\Database\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use Codelabs\VoyagerCareers\Models\Career;
use Codelabs\VoyagerCareers\Policies\CareerPolicy;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = DataType::firstOrNew(['slug' => 'careers']);
        if (! $dataType->exists) {
            $dataType->fill([
                'name'                  => 'careers',
                'display_name_singular' => __('voyagercareers::seeders.data_types.career.singular'),
                'display_name_plural'   => __('voyagercareers::seeders.data_types.career.plural'),
                'icon'                  => 'voyager-dollar',
                'model_name'            => Career::class,
                'policy_name'           => CareerPolicy::class,
                'controller'            => null,
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => null,
            ])->save();
        }
    }
}
