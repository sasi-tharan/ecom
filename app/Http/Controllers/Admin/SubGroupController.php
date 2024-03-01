<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\SubGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SubGroupController extends Controller
{
    public function index()
    {
        $subgroups = SubGroup::with('group')->get();
        return view('admin.subgroups.index', compact('subgroups'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('admin.subgroups.create', compact('groups'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'group_id' => 'required|exists:group,id',
                'sub_group_title' => 'required|string|max:255',
                'status' => 'boolean',
            ]);

            $data = [
                'group_id' => $request->input('group_id'),
                'sub_group_title' => $request->input('sub_group_title'),
                'status' => $request->has('status') ? 1 : 0,
            ];

            SubGroup::create($data);

            return redirect('admin/subgroups')->with('message', 'Sub Group Added Successfully');
        } catch (ValidationException $e) {
            return redirect()->route('admin.subgroups.create')
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.subgroups.create')->with('error', 'Error adding Sub Group');
        }
    }

    public function edit(SubGroup $subgroup)
    {
        $groups = Group::all(); // Fetch group from your database

        return view('admin.subgroups.edit', compact('subgroup', 'groups'));
    }

    public function update(Request $request, SubGroup $subgroup)
    {
        try {
            $request->validate([
                'group_id' => 'required|exists:group,id',
                'sub_group_title' => 'required|string|max:255',
                'status' => 'boolean',
            ]);

            $data = [
                'group_id' => $request->input('group_id'),
                'sub_group_title' => $request->input('sub_group_title'),
                'status' => $request->has('status') ? 1 : 0,
            ];

            $subgroup->update($data);

            return redirect('admin/subgroups')->with('message', 'Sub Group Updated Successfully');
        } catch (ValidationException $e) {
            return redirect()->route('admin.subgroups.edit', $subgroup->id)
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('admin.subgroups.edit', $subgroup->id)->with('error', 'Error updating Sub Group');
        }
    }

    public function destroy(SubGroup $subgroup)
    {
        if ($subgroup) {
            $subgroup->delete();
            return redirect('admin/subgroups')->with('message', 'Sub Group Deleted Successfully');
        }

        return redirect()->route('admin.subgroups.index')->with('message', 'Sub Group not found or something went wrong');
    }




}
