<div class = "container">
    <h2 class="mb-4 text-center">Student Management System</h2>

        <button wire:click="store" class="btn btn-primary btn-sm mb-4">Add Student</button>

    <div class="row">
            {{-- <h5>{{ 'Edit Student' : 'Add Student' }}</h5> --}}

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

        <input type="text" class="form-control mb-2" wire:model="name" placeholder="Name">         
        <input type="email" wire:model="email" class="form-control mb-2" placeholder="Email">
        <input type="text" wire:model="phone" class="form-control mb-2" placeholder="Phone">
        <input type="text" wire:model="course" class="form-control mb-2" placeholder="Course">
        <input type="text" wire:model="city" class="form-control mb-3" placeholder="City">

    </div>

      <h2 class="mb-4 text-center">Student List</h2>

        <input type="text" wire:model.live="search" class="form-control mb-2" placeholder="Search student...">

      <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)

            {{-- echo '<pre>';
                {{ print_r($student) }}
                die();
            echo '</pre>'; --}}

            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->city }}</td>
                <td>
                    <button wire:click="edit({{ $student->id }})" class="btn btn-warning btn-sm" href="{{ '/edit/' . $student->id }}">Edit</button>
                    <button wire:click="destroy({{ $student->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>

                @empty
                <td colspan="7" class="text-center text-danger fw-bold">
                    No students records found
                </td>

            </tr>
            @endforelse
        </tbody>
      </table>

      <!-- Pagination Links -->
      {{ $students->links() }}
</div>
