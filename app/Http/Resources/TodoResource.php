<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return  [
            'title' => '제목 : ' . $this->title,
            'content' => '내용 : ' . $this->content,
            // 사람이 읽기 쉬운 시간 형태로 변환
            'create_at' => $this->created_at->diffForHumans() . ' 전에 작성되었다.'
        ];

        // return parent::toArray($request);
    }
}
