<?php
use Illuminate\Http\Request;
use App\Models\Staginfo;
use App\Http\Controllers\Controller;


class StaginfoController extends Controller
{
    public function index()
    {
        $staginfos = Staginfo::all();
        return view('staginfo.index', compact('staginfos'));
    }

    public function create()
    {
        return view('staginfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:staginfos',
            'address' => 'required',
            'phone' => 'required',
            'university' => 'required',
            'major' => 'required',
            'picture_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'report_path' => 'nullable|mimes:pdf',
        ]);

        $staginfo = new Staginfo([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'university' => $request->get('university'),
            'major' => $request->get('major'),
        ]);

        if ($request->hasFile('picture_path')) {
            $picturePath = $request->file('picture_path')->store('public/images');
            $staginfo->picture_path = $picturePath;
        }

        if ($request->hasFile('report_path')) {
            $reportPath = $request->file('report_path')->store('public/reports');
            $staginfo->report_path = $reportPath;
        }

        $staginfo->save();

        return redirect('/staginfo')->with('success', 'Staginfo saved!');
    }

    public function show($id)
    {
        $staginfo = Staginfo::find($id);
        return view('staginfo.show', compact('staginfo'));
    }

    public function edit($id)
    {
        $staginfo = Staginfo::find($id);
        return view('staginfo.edit', compact('staginfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:staginfos,email,' . $id,
            'address' => 'required',
            'phone' => 'required',
            'university' => 'required',
            'major' => 'required',
            'picture_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'report_path' => 'nullable|mimes:pdf',
        ]);

        $staginfo = Staginfo::find($id);
        $staginfo->full_name = $request->get('full_name');
        $staginfo->email = $request->get('email');
        $staginfo->address = $request->get('address');
        $staginfo->phone = $request->get('phone');
        $staginfo->university = $request->get('university');
        $staginfo->major = $request->get('major');

        if ($request->hasFile('picture_path')) {
            $picturePath = $request->file('picture_path')->store('public/images');
            $staginfo->picture_path = $picturePath;
        }

        if ($request->hasFile('report_path')) {
            $reportPath = $request->file('report_path')->store('public/reports');
            $staginfo->report_path = $reportPath;
        }

        $staginfo->save();

        return redirect('/staginfo')->with('success', 'Staginfo updated!');
    }

    public function destroy($id)
    {
        $staginfo = Staginfo::find($id);
        $staginfo->delete();

        return redirect('/staginfo')->with('success', 'Staginfo deleted!');
    }
}
