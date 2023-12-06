@include('components.message')
<div>
    <nav>
        <ul>
            <li>{{ $response['name'] }}</li>
            <li>{{ $response['email'] }}</li>
            <li>{{ $response['status'] }}</li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button>Đăng xuất</button>
                </form>
            </li>
        </ul>
    </nav>
</div>
