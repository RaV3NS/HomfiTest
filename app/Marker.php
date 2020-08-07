<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    protected $fillable = ['name', 'coords', 'desc', 'status'];

    /**
     * @param $query
     * @return mixed
     * Scope для определения гостевого статуса
     */
    public function scopeGuest($query) {
        return $query->where('status', 'all');
    }

    /**
     * @return string
     * Преобразовываем статус в читабельный вариант
     */
    public function getStatus() {
        switch ($this->status) {
            case 'all':
                return 'Виден всем пользователям';
                break;

            case 'auth':
                return 'Виден авторизованным пользователям';
                break;
        }
    }
}
