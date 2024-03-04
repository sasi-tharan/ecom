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

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/sub_groups/', $filename);
                $data['image'] = "uploads/sub_groups/$filename";
            }

            SubGroup::create($data);

            session()->flash('success', 'Sub Group Added successfully');

            return redirect('admin/subgroups');
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

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/sub_groups/', $filename);
                $data['image'] = "uploads/sub_groups/$filename";
            }

            $subgroup->update($data);

            session()->flash('success', 'Sub Group Updated successfully');

            return redirect('admin/subgroups');
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

            // Store a success message in the session
          session()->flash('success', 'Sub Group Deleted Successfully');

          return redirect('admin/subgroups');
        }

        // Store an error message in the session if the group is not found or something goes wrong
        session()->flash('error', 'SubGroup not found or something went wrong');

        return redirect('admin/subgroups');
    }




}
