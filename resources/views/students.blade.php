<x-layouts.index>
    <div class="flex">
        <x-navbar></x-navbar>

        <div id="students">
            <x-header :title="'Students'"></x-header>
            <main>
                <h2>Yangi o'quvchi qo'shish</h2>
                <form action="{{ route('students_create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <section>
                        <div>
                            <label htmlFor="student_name">O'quvchi ismi</label>
                            <input type="text" name="student_name" placeholder="Eshmat Toshmatov">
                            @error('student_name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label htmlFor="student_phone">Telefon raqam</label>
                            <input type="tel" name="student_phone" placeholder="+998*********">
                            @error('student_phone')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label htmlFor="stack">Yo'nalishi</label>
                            <select name="stack" id="stack" required>
                                <option selected disabled>Yonalish</option>
                                @foreach ($stacks as $stack)
                                    <option value="{{ $stack }}">{{ $stack }}</option>
                                @endforeach
                            </select>
                            @error('stack')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>
                    <section class="section2">
                        <div>
                            <label htmlFor="parent_name">Ota-onasi ismi</label>
                            <input type="text" name="parent_name" required placeholder="Ota-onansi ismini yozing" />
                        </div>
                        <div>
                            <label htmlFor="parent_phone">Ota-onasi tell nomeri</label>
                            <input type="text" name="parent_phone" required placeholder="+998 xx xxx xx xx" />
                            @error('parent_phone')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit">Qo'shish</button>
                        </div>
                    </section>
                </form>

                <h2>Bizning o'quvchilar</h2>
                <table>
                    <thead class="thead">
                        <tr>
                            <th>№</th>
                            <th>O'qvuchi ismi</th>
                            <th>Telefon nomer</th>
                            <th>Yo'nalish</th>
                            <th>Guruh</th>
                            <th>Qoshimcha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_phone }}</td>
                                <td>{{ $student->stack }}</td>
                                <td style="color: {{ $student->group == null ? 'red' : 'black' }}">
                                    @if ($student->group)
                                        {{ $student->group->group_day }} |
                                        {{ $student->group->group_time }}
                                    @else
                                        {{ 'Tanlanmagan' }}
                                    @endif
                                </td>
                                <td class="flex"><i class="fa-solid fa-square-pen openModal" id="{{ $student->id }}"
                                        style="color: #2866d2;"></i>
                                    <form action="{{ route('students_destroy', ['id' => $student->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit">
                                            <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @error('group_time')
                    <p class="error" style="color: red; font-size: 21px">{{ $message }}</p>
                @enderror
                <div id="myModal" style="display: none;">
                    <div id="modal-content">
                        <h3>Guruhni tanlang</h3>
                        <hr>
                        <form action="{{ route('students_edit') }}" method="GET" id="changeStudentTime">
                            <input type="hidden" hidden name="id" id="input" value="">
                            <label for="time">Guruh vaqtini to'girlang</label>
                            <select name="group_time" id="time" required>
                                <option selected disabled>Dars vaqtini tanlang</option>
                                <option value="10:00-12:00">10:00-12:00</option>
                                <option value="12:30-14:30">12:30-14:30</option>
                                <option value="15:00-17:00">15:00-17:00</option>
                                <option value="17:00-19:00">17:00-19:00</option>
                            </select>
                            <div id="btn">
                                <button id="btn">Saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.index>
