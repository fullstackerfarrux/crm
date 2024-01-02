<x-layouts.index>
    <div class="flex">
        <x-navbar></x-navbar>
        <div id="xisobot">
            <x-header :title="'Xisobot'"></x-header>
            <div class="statistics">
                <main>
                    <section>
                        <h2>Jami oquvchilar soni:</h2>
                        <h3>{{ $count_students }}</h4>
                            <div class="img">
                                <img src="/storage/photos/icon_xisobot.png" alt="hisobot">
                            </div>
                    </section>
                    <section>
                        <h2>O'qituvchilar soni:</h2>
                        <h3>{{ $count_teachers }}</h4>
                            <div class="img">
                                <img src="/storage/photos/icon_xisobot.png" alt="hisobot">
                            </div>
                    </section>
                </main>
                <main>
                    <section>
                        <h2>Shu oy qoshilganlar:</h2>
                        <h3>{{ $students_month }}</h4>
                            <div class="img">
                                <img src="/storage/photos/icon_xisobot.png" alt="hisobot">
                            </div>
                    </section>
                    <section>
                        <h2>Jami guruhlar soni:</h2>
                        <h3>{{ $count_groups }}</h4>
                            <div class="img">
                                <img src="/storage/photos/icon_xisobot.png" alt="hisobot">
                            </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-layouts.index>
