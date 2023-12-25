<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyabsenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public $status;
    public $message;
    public $code;

    public function __construct($status, $message, $code, $resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
        $this->code = $code;
    }
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'code' => $this->code,
            'message'=>$this->message,
            'data' => $this->resource
        ];
    }
}
