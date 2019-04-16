<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
  protected $fillable = ['name', 'filename', 'type', 'url', 'meta'];

  protected $appends = ['small'];

  public function getSmallThumbAttribute(){
    return $this->meta['small'];
  }
}
