<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Search
{
    private $options = [
        'indexes'       => null,
        'string'        => null,
        'string_column' => null,
        'string_algo'   => null,
        'page'          => null,
        'sort_field'    => null,
        'sort_order'    => null,
        'limit'         => null,
        'columns'       => null,
        'bool'          => null,
        'filters'       => [],
    ];

    public function __construct()
    {
        $this->options = (Object)$this->options;
    }

    public function results()
    {
        $options = [
            RequestOptions::QUERY => []
        ];

        foreach ($this->options as $field => $value) {
            if (empty($value)) {
                continue;
            }

            $value = is_array($value) ? implode(',', $value) : $value;
            $options[RequestOptions::QUERY][$field] = $value;
        }

        return Guzzle::get('/search', $options);
    }

    public function indexes(array $indexes): Search
    {
        $this->options->indexes = implode(',', $indexes);
        return $this;
    }

    public function find(string $string): Search
    {
        $this->options->string = trim($string);
        return $this;
    }

    public function findColumn(string $column): Search
    {
        $this->options->string_column = trim($column);
        return $this;
    }

    public function findAlgorithm(string $searchStringAlgorithm): Search
    {
        $this->options->string_algo = trim($searchStringAlgorithm);
        return $this;
    }

    public function page(int $number): Search
    {
        $this->options->page = $number;
        return $this;
    }

    public function sort(string $field, string $order): Search
    {
        $this->options->sort_field = $field;
        $this->options->sort_order = $order;
        return $this;
    }

    public function limit(int $limit): Search
    {
        $this->options->limit = $limit;
        return $this;
    }

    public function columns(array $columns): Search
    {
        $this->options->columns = implode(',', $columns);
        return $this;
    }

    public function bool(string $bool): Search
    {
        $this->options->bool = $bool;
        return $this;
    }

    public function filter(string $field, $value, string $operand): Search
    {
        $this->options->filters[] = "{$field}{$operand}{$value}";
        return $this;
    }
}
