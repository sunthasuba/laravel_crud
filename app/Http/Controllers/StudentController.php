<?php
namespace App\Http\Controllers;
use App\Services\StudentService;

use App\Facades\StudentFacade;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{   
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    public function index()
    {
        $students = StudentFacade::getAllStudents();
        return Inertia::render('Students/Index', ['students' => $students]);
    }

    public function create()
    {
        return Inertia::render('Students/Create');
    }

    public function store(StudentRequest $request)
    {
        StudentFacade::createStudent($request->validated());
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = StudentFacade::getStudentById($id);
        return Inertia::render('Students/Edit', ['student' => $student]);
    }

    public function update(StudentRequest $request, $id)
    {
        StudentFacade::updateStudent($id, $request->validated());
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        StudentFacade::deleteStudent($id);
        return redirect()->route('students.index');
    }
}
