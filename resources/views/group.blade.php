<x-layouts.index>
    <div class="flex">
        <x-navbar></x-navbar>
        <div id="groups">
            <x-header :title="'Group'"></x-header>
            <div id="group">
                <h1>Informatika guruhi ro'yhati</h1>

                <main>
                    <div class="card">
                        <div class="title">{{ $group->group_stack }}</div>
                        <div class="card-contact">
                            <img src="../storage/{{ $group->teacher->teacher_photo }}" alt="image" />
                            <div class="number">
                                <div>
                                    <strong>O'qituvchi:</strong>
                                    <p> {{ $group->teacher->teacher_name }} </p>
                                </div>
                                <div>
                                    <strong>Tel raqam:</strong>
                                    <p> {{ $group->teacher->teacher_phone }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="detail_info">
                                <strong>Dars kunlari:</strong>
                                <p> {{ $group->group_day }} </p>
                            </div>
                            <div class="detail_info">
                                <strong>Dars vaqti:</strong>
                                <p>{{ $group->group_time }}</p>
                            </div>
                            <div class="detail_info">
                                <strong>O'quvchilar soni:</strong>
                                <p>{{ count($group->student) }}ta</p>
                            </div>
                        </div>
                    </div>

                    <table>
                        <thead class="thead">
                            <tr>
                                <th>№</th>
                                <th>Oquvchi ismi</th>
                                <th>Oquvchi raqami</th>
                                <th>Ota onasi ismi</th>
                                <th>Ota onasi raqami</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($group->student as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->student_name }}</td>
                                    <td>{{ $student->student_phone }}</td>
                                    <td>{{ $student->parent_name }}</td>
                                    <td>{{ $student->parent_phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
</x-layouts.index>
