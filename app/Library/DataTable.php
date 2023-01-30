<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;

class DataTable
{

    static function makeQuery($config, $builder)
    {
        foreach ($config['joins'] ?? [] as $join) {
            if (isset($join['type'])) {
                if ($join['type'] == 'left')
                    $builder->leftJoin($join['table'], $join['t1_col'], $join['op'], $join['t2_col']);
                else
                    $builder->rightJoin($join['table'], $join['t1_col'], $join['op'], $join['t2_col']);
            } else
                $builder->join($join['table'], $join['t1_col'], $join['op'], $join['t2_col']);
        }

        foreach ($config['where'] ?? [] as $where) {
            $builder->where($where['col'], $where['op'], $where['val']);
        }



        if (isset($_GET['search']['value']) && strlen($_GET['search']['value']) > 0) {
            $builder->where(function ($query) use ($config) {
                $i = 0;
                foreach ($config['search_by'] as $col) {
                    if ($i++ == 0) {
                        $query->where($col, 'like', "%{$_GET['search']['value']}%");
                        continue;
                    }
                    $query->orWhere($col, 'like', "%{$_GET['search']['value']}%");
                }
            });
        }



        return $builder;
    }


    /**
     * 
     * @param string $connection
     */
    public static function getData($config, $connection = 'mysql')
    {
        $builder = DB::connection($connection)->table($config['table']);


        $total = $builder->count();
        $builder = DataTable::makeQuery($config, $builder);
        $filtered = $builder->count();

        $builder->select($config['columns']);
        foreach ($config['groupBy'] ?? [] as $group) {
            $builder->groupBy($group);
        }

        if (isset($_GET['order']) && count($config['order_by'])) {
            $builder->orderBy($config['order_by'][$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } else if (count($config['default_order'])) {
            foreach ($config['default_order'] as $key =>  $order) {
                $builder->orderBy($key, $order);
            }
        }

        if (!empty($_GET['length']) && $_GET['length'] != -1) {
            $builder->limit($_GET['length']);
            $builder->skip($_GET['start']);
        }

        return [
            'draw' => intval($_GET['draw']),
            'data' => $builder->get(),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered
        ];
    }
}
