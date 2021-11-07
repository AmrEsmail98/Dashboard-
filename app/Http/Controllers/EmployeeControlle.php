<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);

        $empData = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'title' => $request->post,
            'image' => $fileName
        ];
        Employee::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }
    //featch all employee ajax request
    public function fetchAll()
    {
        $emps = Employee::all();
        $output = '';
        if ($emps->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">

            <thead>
            <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Title</th>
            <th>Phones</th>
            <th>Action</th>

            </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
           <td>' . $emp->id . '</td>
           <td><img src="storage/images/' . $emp->image . '"width="50"
           class="img-thumbnail rounded-circle"></td>
            <td>' . $emp->first_name . ' ' . $emp->last_name . '</td>
            <td>' . $emp->email . '</td>
            <td>' . $emp->title . '</td>
            <td>' . $emp->phone . '</td>
            <td>

            <a href ="#" id="' . $emp->id . '" class="text-success mx-1 editIcon"
            data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
            <i class="bi-pencil-square h4"></i></a>

            <a href="#" id="' . $emp->id . '" class="text-danger ma-1 deleteIcon">
            <i class="bi-trash h4"></i>
            </a>
            </td>
           </tr>';
            }

            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1> No recorded in database</h1>';
        }
    }

    //handel edit
    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = Employee::find($id);
        return response()->json($emp);
    }

    //handel update

    public function update(Request $request)
    {
        $fileName = '';
        $emp = Employee::find($request->emp_id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($emp->image) {
                Storage::delete('public/images' . $emp->image);
            }
        } else {
            $fileName = $request->emp_image;
        }
        $empData = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'title' => $request->post,
            'image' => $fileName
        ];
        $emp->update($empData);
        return response()->json([
            'status' => 200
        ]);
    }

    //handel delete
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Employee::find($id);
        if (Storage::delete('public/images/' . $emp->image)) {
            Employee::destroy($id);
        }
    }
}
