<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Students extends Component
{
    // Define Variables
    public $name, $email, $phone, $course, $city, $student_id, $search = "";
    protected $paginationTheme = 'bootstrap';

    use WithPagination; // To show pagination

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'nullable|string|max:20',
        'course' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
    ];
    public function render()
    {
        $students = Student::all();
        $students = Student::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            // ->get()
            ->paginate(2);

        return view('livewire.students', compact('students')); // Render the view with students data
    }

    // Create DB
    public function store()
    {
        // Implementation for storing a new student
        $this->validate();

        Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'course' => $this->course,
            'city' => $this->city
        ]);

        session()->flash('message', 'Student created successfully.');
    }

    // For livwwire search pagination reset
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Update DB
    public function edit($student_id)
    {
        // Implementation for updating an existing student
        $student = Student::findOrFail($student_id); // Fetch student by ID

        $this->student_id = $student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->course = $student->course;
        $this->city = $student->city;

        session()->flash('message', 'Student Updated successfully.');
    }

    // Delete DB
    public function destroy($student_id)
    {
        // Implementation for deleting a student
        Student::findorFail($student_id)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }
}
