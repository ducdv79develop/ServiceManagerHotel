<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Htmlable;
use App\Helpers\ColumnSortableException;

class SortableLink
{
    /**
     * @param array $parameters
     * @return string
     * @throws \Exception
     */
    public static function render(array $parameters)
    {
        list($sortColumn, $sortParameter, $title) = self::parseParameters($parameters);
        $title = self::applyFormatting($title, $sortColumn);
        list($icon, $direction) = self::determineDirection($sortColumn, $sortParameter);
        $trailingTag = self::formTrailingTag($icon);
        $queryString = self::buildQueryString($sortParameter, $direction);
        return '<a href="'.url(request()->path().'?'.$queryString).'">'.$title.$trailingTag;
    }

    /**
     * @param $sortParameter
     * @param $direction
     *
     * @return string
     */
    private static function buildQueryString($sortParameter, $direction)
    {
        $checkStrLenOrArray = function ($element) {
            return is_array($element) ? $element : strlen($element);
        };
        $persistParameters = array_filter(request()->except('sort', 'direction', 'page'), $checkStrLenOrArray);

        return http_build_query(array_merge($persistParameters, [
            'sort' => $sortParameter,
            'direction' => $direction,
        ]));
    }

    /**
     * @param array $parameters
     * @return array
     * @throws \Exception
     */
    public static function parseParameters(array $parameters)
    {
        $explodeResult = self::explodeSortParameter($parameters[0]);
        $sortColumn = (empty($explodeResult)) ? $parameters[0] : $explodeResult[1];
        $title = (count($parameters) === 1) ? null : $parameters[1];
        return [$sortColumn,$sortColumn, $title];
    }

    /**
     * Explodes parameter if possible and returns array [column, relation]
     * Empty array is returned if explode could not run eg: separator was not found.
     * @param $parameter
     * @return array
     * @throws \Exception
     */
    public static function explodeSortParameter($parameter)
    {
        $separator = '.';

        if (Str::contains($parameter, $separator)) {
            $oneToOneSort = explode($separator, $parameter);
            if (count($oneToOneSort) !== 2) {
                throw new ColumnSortableException();
            }

            return $oneToOneSort;
        }
        return [];
    }

    /**
     * @param string|\Illuminate\Contracts\Support\Htmlable|null $title
     * @param string $sortColumn
     *
     * @return string
     */
    private static function applyFormatting($title, $sortColumn)
    {
        if ($title instanceof Htmlable) {
            return $title;
        }

        if ($title === null) {
            $title = $sortColumn;
        } elseif ( ! true ){
            return $title;
        }
        return $title;
    }

    /**
     * @param $sortColumn
     * @param $sortParameter
     *
     * @return array
     */
    private static function determineDirection($sortColumn, $sortParameter)
    {
        $icon = self::selectIcon($sortColumn);
        if (request('sort') == $sortParameter && in_array(request('direction'), ['asc', 'desc'])) {
            $icon      .= (request('direction') === 'asc' ? '-asc' : '-desc');
            $direction = request('direction') === 'desc' ? 'asc' : 'desc';
            return [$icon, $direction];
        }  else {
            $icon      = 'fa fa-sort';
            $direction = 'asc';
            return [$icon, $direction];
        }
    }

    /**
     * @return string
     */
    private static function selectIcon()
    {
        return 'fa fa-sort';
    }

    /**
     * @param $icon
     *
     * @return string
     */
    private static function formTrailingTag($icon)
    {
        $iconAndTextSeparator = '';
        $clickableIcon = false;
        $trailingTag   = $iconAndTextSeparator.'<i class="'.$icon.'"></i>'.'</a>';

        if ($clickableIcon === false) {
            $trailingTag = '</a>'.$iconAndTextSeparator.'<i class="'.$icon.'"></i>';

            return $trailingTag;
        }

        return $trailingTag;
    }
}
