<?php

namespace App\Http\Resources\V1;

use App\Models\Etudiant;
use App\Http\Resources\ClasseResource;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 *
 *
 *  */


class EtudiantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     *
     *
     * @property
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'nom' => $this->resource->nom,
            'prenom' => $this->resource->prenom,
            'adresse' => $this->resource->adresse,
            'telephone' => $this->resource->telephone,
            'classe' => $this->resource->classe->libelle,
            'created_at' => $this->resource->created_at
        ];
    }
}
