<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Apoderado
 * 
 * @property int $idapoderado
 * @property string|null $nombre
 *
 * @package App\Models
 */
class Apoderado extends Model
{
	protected $table = 'apoderado';
	protected $primaryKey = 'idapoderado';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
