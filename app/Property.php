<?php

namespace App;

use App\RenderType;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Property extends Model
{
    use Presentable;

    protected $fillable = ['label', 'render_type_id', 'options'];

    protected $casts = [
        'options' => 'array',
    ];

    protected $presenter = 'App\Presenters\PropertiesPresenter';

    /*****************
     * Relationships *
     *****************/

    public function renderType()
    {
        return $this->belongsTo(RenderType::class);
    }

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }

    /***************
     * Form Values *
     ***************/

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'options':
                $options = '';
                if (is_array($this->options)) {
                    $options = implode(',', $this->options);
                }
                return $options;
                break;
        }

        return $this->getAttribute($name);
    }
}
