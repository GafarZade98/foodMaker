<?php

namespace Database\Seeders\Voyager;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();

        $dataRow = $this->dataRow($userDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.email'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'password');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'password',
                'display_name' => __('voyager::seeders.data_rows.password'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'remember_token');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.remember_token'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'avatar');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('voyager::seeders.data_rows.avatar'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongsto_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsTo',
                    'column'      => 'role_id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'roles',
                    'pivot'       => 0,
                ],
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'user_belongstomany_role_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('voyager::seeders.data_rows.roles'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => [
                    'model'       => 'TCG\\Voyager\\Models\\Role',
                    'table'       => 'roles',
                    'type'        => 'belongsToMany',
                    'column'      => 'id',
                    'key'         => 'id',
                    'label'       => 'display_name',
                    'pivot_table' => 'user_roles',
                    'pivot'       => '1',
                    'taggable'    => '0',
                ],
                'order'        => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'settings');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'hidden',
                'display_name' => 'Settings',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 12,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($menuDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($roleDataType, 'display_name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.display_name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($userDataType, 'role_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.role'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 9,
            ])->save();
        }

        //Customs
        $data_rows = array(
            array(
                "id" => 22,
                "data_type_id" => 4,
                "field" => "id",
                "type" => "number",
                "display_name" => "Id",
                "required" => 1,
                "browse" => 1,
                "read" => 0,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 1,
            ),
            array(
                "id" => 23,
                "data_type_id" => 4,
                "field" => "name",
                "type" => "text",
                "display_name" => "Name",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 2,
            ),

            array(
                "id" => 25,
                "data_type_id" => 4,
                "field" => "photo",
                "type" => "image",
                "display_name" => "Photo",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 4,
            ),
            array(
                "id" => 26,
                "data_type_id" => 4,
                "field" => "created_at",
                "type" => "timestamp",
                "display_name" => "Created At",
                "required" => 0,
                "browse" => 0,
                "read" => 1,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 5,
            ),
            array(
                "id" => 27,
                "data_type_id" => 4,
                "field" => "updated_at",
                "type" => "timestamp",
                "display_name" => "Updated At",
                "required" => 0,
                "browse" => 0,
                "read" => 1,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 6,
            ),
            array(
                "id" => 28,
                "data_type_id" => 5,
                "field" => "id",
                "type" => "number",
                "display_name" => "Id",
                "required" => 1,
                "browse" => 1,
                "read" => 0,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 1,
            ),
            array(
                "id" => 29,
                "data_type_id" => 5,
                "field" => "name",
                "type" => "text",
                "display_name" => "Name",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 2,
            ),
            array(
                "id" => 31,
                "data_type_id" => 5,
                "field" => "description",
                "type" => "rich_text_box",
                "display_name" => "Description",
                "required" => 0,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 3,
            ),
            array(
                "id" => 32,
                "data_type_id" => 5,
                "field" => "photo",
                "type" => "image",
                "display_name" => "Photo",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 4,
            ),
            array(
                "id" => 33,
                "data_type_id" => 5,
                "field" => "created_at",
                "type" => "timestamp",
                "display_name" => "Created At",
                "required" => 0,
                "browse" => 0,
                "read" => 1,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 5,
            ),
            array(
                "id" => 34,
                "data_type_id" => 5,
                "field" => "updated_at",
                "type" => "timestamp",
                "display_name" => "Updated At",
                "required" => 0,
                "browse" => 0,
                "read" => 1,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 6,
            ),
            array(
                "id" => 35,
                "data_type_id" => 5,
                "field" => "meal_belongstomany_ingredient_relationship",
                "type" => "relationship",
                "display_name" => "ingredients",
                "required" => 0,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{\"model\":\"App\\\\Models\\\\Ingredient\",\"table\":\"ingredients\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"ingredient_meal\",\"pivot\":\"1\",\"taggable\":\"0\"}",
                "order" => 7,
            ),
            array(
                "id" => 36,
                "data_type_id" => 5,
                "field" => "url",
                "type" => "text",
                "display_name" => "Url",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 3,
            ),
        );


        DataRow::insert($data_rows);

    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
