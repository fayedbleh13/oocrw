<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Condo;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use NumberFormatter;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;


final class CondoTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return Condo::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
        ->addColumn('name')
        ->addColumn('slug')
        ->addColumn('price_in_php', function (Condo $model) {
            $format = new NumberFormatter('pt_PT', NumberFormatter::CURRENCY);
            return $format->formatCurrency($model->price, "PHP");
        })
        ->addColumn('promo_price')
        ->addColumn('featured')
        ->addColumn('image')
        ->addColumn('image_gallery')
        ->addColumn('created_at')
        ->addColumn('created_at_formatted', function(Condo $model) {
            return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
        })
        ->addColumn('description_excerpt', function (Condo $model) {
            return Str::words($model->short_description, 1); //Gets the first 8 words
        })
        ->addColumn('description_excerpt', function (Condo $model) {
            return Str::words($model->description, 1); //Gets the first 8 words
        });

    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
            ->title('Name')
            ->field('name')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
        
        Column::add()
            ->title('Short Description')
            ->field('short_description')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
        
        Column::add()
            ->title('Description')
            ->field('description')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
            
        Column::add()
            ->title('Price')
            ->field('price')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
            
        Column::add()
            ->title('Promo Price')
            ->field('promo_price')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
            
        Column::add()
            ->title('Featured?')
            ->field('featured')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
            
        Column::add()
            ->title('Image')
            ->field('image')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),
            
        Column::add()
            ->title('Image Gallery')
            ->field('image_gallery')
            ->searchable()
            ->makeInputText('name')
            ->sortable(),

        Column::add()
            ->title('Created at')
            ->field('created_at')
            ->hidden(),

        Column::add()
            ->title('Created at')
            ->field('created_at_formatted')
            ->makeInputDatePicker('created_at')
            ->searchable()
    ];
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Condo Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('condo.edit', ['condo' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('condo.destroy', ['condo' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Condo Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\Rule>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($condo) => $condo->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Condo Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Condo::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}