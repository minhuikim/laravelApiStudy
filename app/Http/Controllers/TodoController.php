<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Todo;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 데이터 목록 가져오기
    public function index()
    {
        // Eloquent qeury로 Todo::all하면 전체 컬럼 추출
        $allTodos = Todo::all();

        // Todo::select 원하는 컬럼만 추출
        // $allTodos = Todo::select('id', 'title', 'content')->get();

        // return $allTodos;

        $filteredTodos = TodoResource::collection($allTodos);

        // json 데이터 한글 깨짐 해결
        return json_encode($filteredTodos, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for creating a new resource.
     */
    // 새 데이터를 만드는 화면을 반환 -> api에서는 필요 없음
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // 새 데이터 추가
    public function store(Request $request)
    {
        $userInputData = $request->all();

        $newTodo = Todo::create($userInputData);

        return new TodoResource($newTodo);
    }

    /**
     * Display the specified resource.
     */
    // 특정 데이터 가져오기
    // public function show(string $id)
    // {
    //     // select * from todos where id = 2
    //     $fetchedTodo = Todo::find($id);

    //     $filteredTodo = new TodoResource($fetchedTodo);

    //     return json_encode($filteredTodo, JSON_UNESCAPED_UNICODE);
    // }

    // 엘로퀀트 쿼리의 경우 string $id 대신 Todo $todo를 사용해 Todo를 직접 가져올 수 있다.
    public function show(Todo $todo)
    {
        // select * from todos where id = 2
        $filteredTodo = new TodoResource($todo);

        return json_encode($filteredTodo, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 기존 데이터를 수정하는 화면을 반환 -> api에서는 필요 없음
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // 기존 데이터를 수정하여 json형태로 반환 
    // public function update(Request $request, string $id)
    public function update(Request $request, Todo $todo)
    {
        //
        // $fetchedTodo = Todo::find($id);
        $todo->update($request->all());

        $updatedTodo = new TodoResource($todo);

        return $updatedTodo;
    }

    /**
     * Remove the specified resource from storage.
     */
    // 기존 데이터 삭제
    // public function destroy(string $id)
    public function destroy(Todo $todo)
    {
        //
        // $fetchedTodo = Todo::find($id);
        $todo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
