<?php

namespace MacsiDigital\Searchable;

trait Searchable
{
    public function scopeSearchable($query, $term = '')
    {
        if ($term != '' && isset($this->searchable) && $this->searchable != []) {
            $query->where(function ($query) use ($term) {
                $i = '1';
                foreach ($this->searchable as $field) {
                    if (array_key_exists($field, $this->macsi_joins)) {
                        $detail = $this->macsi_joins[$field];
                        $query->join($detail['foreign_table'], $detail['table_field'], $detail['foreign_table_field']);
                    }
                    if ($i == 1) {
                        $query->where($field, 'like', '%'.$term.'%');
                        $i++;
                    } else {
                        $query->orWhere($field, 'like', '%'.$term.'%');
                    }
                }
            });
        }

        return $query;
    }
}
