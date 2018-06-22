<?php

namespace Codelabs\VoyagerCareers\Database\Seeds;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyagercareers::seeders.menu_items.careers'),
            'url'     => '/admin/careers',
            'route'   => null,
        ]);
        if (! $menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => null,
                'order'      => MenuItem::count() + 1,
            ])->save();
        }
    }
}
