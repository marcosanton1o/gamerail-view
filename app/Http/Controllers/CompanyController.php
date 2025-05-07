<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
class companyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $totalCompanies = $companies->count();
        return view('companies.index', compact('companies', 'totalCompanies'));
    }

    public function create()
    {
        $companies = Company::all();
       return view('companies.create', compact('companies'));
    }

    public function store(CompanyRequest $request)
{
    $company = new Company;
    $company->name            = $request->name;
    $company->ceo            = $request->ceo;
    $company->description      = $request->description;
    $company->foundation_date     = $request->foundation_date;
    $company->save();

    session()->flash('message', 'O jogo: ' . $request->name . ' foi adicionado com sucesso!');
    return redirect('/companies');
}
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
            return view('companies.edit', compact('company'));
        }

        public function update(CompanyRequest $request, $id)
{
        $company = Company::findOrFail($id);
        $company->update($request->all());

    session()->flash('message', 'A empresa: ' . $request->name . ' foi atualizada com sucesso!');
    return redirect()->route('companies.index');
}

    public function destroy(string $id)
    {
        $companies = Company::findOrFail($id);
        $companies->delete();
        session()->flash('message', 'O jogo: ' . $companies->name . ' foi deletado com sucesso!');
        return redirect('/companies');
    }
}
