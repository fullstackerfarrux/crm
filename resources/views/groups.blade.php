<x-layouts.index>
    <div class="flex">
        <x-navbar></x-navbar>
        <div id="groups">
            <x-header :title="'Groups'"></x-header>
            <main>
                <h2>Yangi guruh qo'shish</h2>
                <form action="{{ route('group_create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <section>
                        <div>
                            <label htmlFor="group_stack">Guruh yo'nalishi</label>
                            <select name="group_stack" id="stack" required>
                                <option selected disabled>Yonalish</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Ingliz tili">Ingliz tili</option>
                                <option value="Rus tili">Rus tili</option>
                                <option value="Xitoy tili">Xitoy tili</option>
                            </select>
                            @error('group_stack')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label htmlFor="group_day">Dars kunlari</label>
                            <select name="group_day" id="days" required>
                                <option selected disabled>Dars kunlarini tanlang</option>
                                <option value="DU-CHOR-JUMA">DU-CHOR-JUMA</option>
                                <option value="SE-PAY-SHAN">SE-PAY-SHAN</option>
                            </select>
                            @error('group_day')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label htmlFor="group_time">Dars vaqti</label>
                            <select name="group_time" id="time" required>
                                <option selected disabled>Dars vaqtini tanlang</option>
                                <option value="10:00-12:00">10:00-12:00</option>
                                <option value="12:30-14:30">12:30-14:30</option>
                                <option value="15:00-17:00">15:00-17:00</option>
                                <option value="17:00-19:00">17:00-19:00</option>
                            </select>
                            @error('group_time')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>
                    <section class="section2">
                        <div>
                            <label htmlFor="teacher_name">O'qituvchi</label>
                            <input type="text" name="teacher_name" value="{{ old('teacher_name') }}" required
                                placeholder="O'qituvchi ismini yozing" />
                        </div>
                        <div>
                            <label htmlFor="teacher_phone">O'qituvchi tell nomeri</label>
                            <input type="text" name="teacher_phone" required placeholder="+998 xx xxx xx xx" />
                            @error('teacher_phone')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label htmlFor="techer_photo">O'qituvchi rasmi (3x4)</label>
                            <input type="file" required name="teacher_photo" />
                        </div>
                    </section>
                    <button type="submit">Qo'shish</button>
                </form>
                <div class="home_group">
                    <h2>Mavjud guruhlar</h2>

                    <div class="cards">
                        @foreach ($groups as $group)
                            <a class="card" href="{{ route('group_show', ['id' => $group->id]) }}">
                                <div class="title">{{ $group->group_stack }}</div>
                                <div class="card-contact">
                                    <img src="storage/{{ $group->teacher->teacher_photo }}" alt="niggah" />
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
                            </a>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.index>
