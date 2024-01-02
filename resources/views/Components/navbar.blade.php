<div id="navbar">
    <div class="nav_head">
        <img src="/storage/photos/logo.png" alt="logox">
        <h2>CRM Panel</h2>
    </div>
    <div class="list">
        <a href="{{ route('xisobot') }}"
            style="background-color: {{ Route::currentRouteName() === 'xisobot' ? '#00255E' : 'default-color' }}">
            <i class="fa-solid fa-house"></i>Xisobot
        </a>
        <a href="{{ route('groups_index') }}"
            style="background-color: {{ Route::currentRouteName() === 'groups_index' ? '#00255E' : 'default-color' }}"><i
                class="fa-solid fa-users-line"></i>Guruhlar</a>
        <a href="{{ route('students_index') }}"
            style="background-color: {{ Route::currentRouteName() === 'students_index' ? '#00255E' : 'default-color' }}"><i
                class="fa-solid fa-graduation-cap"></i>O'quvchilar</a>
    </div>
</div>
