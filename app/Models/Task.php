<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use RecordsActivity;
    protected $guarded = [];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean',
    ];

    protected static $recordableEvents = ['created', 'deleted'];

    /**
    * The relationships that should be touched on save.
    *
    * @var array
    */
    protected $touches = ['project'];


    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');

    }

    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('incompleted_task');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

}
