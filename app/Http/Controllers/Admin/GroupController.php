<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('department')->get();
        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.groups.create', compact('departments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'group_title' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $data = [
            'department_id' => $request->input('department_id'),
            'group_title' => $request->input('group_title'),
            'status' => $request->has('status') ? 1 : 0,
        ];

        Group::create($data);

        return redirect('admin/groups')->with('message', 'Group Added Successfully');
    }

    public function edit(Group $group)
    {
        $departments = Department::all(); // Fetch departments from your database

        return view('admin.groups.edit', compact('group', 'departments'));
    }

    public function update(Request $request, Group $group)
    {
        // Validate the incoming request using the form request validation rules

        $data = [
            'department_id' => $request->input('department_id'),
            'group_title' => $request->input('group_title'),
            'status' => $request->has('status') ? 1 : 0,
        ];

        $group->update($data);

        return redirect('admin/groups')->with('message', 'Group Updated Successfully');
    }

    public function destroy(Group $group)
    {
        if ($group) {
            $group->delete();
            return redirect()->route('admin.groups.index')->with('message', 'Group Deleted Successfully');
        }

        return redirect()->route('admin.groups.index')->with('message', 'Group not found or something went wrong');
    }




}
