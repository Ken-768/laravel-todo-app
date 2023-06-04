<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index() {
        $runningItems = ToDo::flg(1)->get();
        $doneItems = ToDo::flg(0)->get();
        return view('ToDo', [
            'runningItems' => $runningItems,
            'donItems' => $doneItems
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, ToDo::$rules);
        $toDo = new ToDO;
        $form = $request->all();
        unset($form['_token']);
        $form['flg'] = 1;
        $toDo->fill($form)->save();
        return redirect('/toDo');
    }

    public function update(Request $request) {
        $toDo = ToDo::find($request->id);
        $toDo->flg = 0;
        $toDo->save();
        return redirect(('/toDo'));
    }

    public function delete(Request $request) {
        $toDo = ToDo::find($request->id);
        $toDo->delete();
        return redirect('/toDo');
    }
}
