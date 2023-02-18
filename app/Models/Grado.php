<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grado
 * 
 * @property int $idgrado
 * @property string|null $descripcion
 * 
 * @property Collection|Seccion[] $seccions
 *
 * @package App\Models
 */
class Grado extends Model
{
	protected $table = 'grado';
	protected $primaryKey = 'idgrado';
	public $timestamps = false;

	protected $fillable = [
		'descripcion'
	];

	public function seccions()
	{
		return $this->hasMany(Seccion::class, 'grado_idgrado');
	}
}
