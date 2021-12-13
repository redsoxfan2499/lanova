<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Nova;
use Laravel\Nova\resourceForKey;

class Activestatus extends Filter
{
    public function name()
    {
        $resourceKey = explode('/', request()->path())[1];
        $resourceClass = Nova::resourceForKey($resourceKey);
        $resourceSingularLabel = $resourceClass::singularLabel();

        return $resourceSingularLabel . ' Status';
    }

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('is_active', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'by Active' => '1',
            'by Inactive'   => '0'
        ];
    }
}
