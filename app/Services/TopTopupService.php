<?php
namespace App\Services;

use App\Models\TopTopupUser;
use App\Services\Interface\TopTopupInterface;

class TopTopupService implements TopTopupInterface
{
    /**
     *
     * @param  array  $data
     * @return mixed
     */
    public function save(array $data = null)
    {
        return TopTopupUser::insert($data);
    }

    
    /**
     *
     * @param  array  $id
     * @return mixed
     */
    public function delete($id = null)
    {
        $query = TopTopupUser::query();
        if ($id) {
            $query->where('id', $id);
        }
        return $query->delete();
    }
}