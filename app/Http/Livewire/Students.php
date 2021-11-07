<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $location;

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
        $this->location = '';
    }

    public function store()
    {
        $validatedData = $this->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required'
        ]);

        Student::create($validatedData);
        session()->flash('message', 'Student Created Successfully');
        $this->resetInputFields();
        $this->emit('studentAdded');
    }
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->location = $student->location;
    }

    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required'
        ]);
        if ($this->ids) {
            $student = Student::find($this->ids);
            $student->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
                'location' => $this->location
            ]);
            session()->flash('message', 'Student updated Successfully');
            $this->resetInputFields();
            $this->emit('studentUpdated');
        }
    }

    public function delete($id){
        if($id){
            Student::where('id',$id)->delete();
            session()->flash('message','Student Deleted successfully');
        }
    }
    public function render()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('livewire.students', ['students' => $students]);
    }
}
